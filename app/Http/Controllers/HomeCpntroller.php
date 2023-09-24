<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use App\Models\User;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
class HomeCpntroller extends Controller
{
    public function index(){
        $product = Product::paginate(3);
        $feature = Product::all()->random(4);
        $comment = Comment::orderBy('id', 'desc')->get();
        $reply = Reply::all();
        return view('home.userpage',compact('product','feature','comment','reply'));
    }
   
   
public function redirect(){
    
    $usertype=Auth::user()->usertype;
    if($usertype=='1'){

        $totalProduct=Product::all()->count();
        $totlaOrder=Order::all()->count();
        $totalClient=User::all()->count();
        $order=Order::all();
        $totalRevenue=0;
        foreach($order as $order){
            $totalRevenue = $totalRevenue + $order->price;
        }
        $orderDelivre=Order::where('delivery_status','=','delivered')->get()->count();
        $orderProcessing=Order::where('delivery_status','=','processing')->get()->count();

        return view('admin.home',compact('totalProduct','totlaOrder','totalClient','totalRevenue','orderDelivre','orderProcessing'));
    }else{
        $product = Product::paginate(3);
        $feature = Product::all()->random(4);
        $comment = Comment::orderBy('id', 'desc')->get();
        $reply = Reply::all();
        return view('home.userpage',compact('product','feature','comment','reply'));
    }
}


public function product_details(String $id){
        $product = Product::findOrFail($id);
        if(Auth::user()){    
                return view('home.product_details',compact('product'));
        }else {
            return redirect('login');
        }
    }
public function add_cart(Request $request, $id){
    if(Auth::id()){

        $user=Auth::user();
        $product=Product::findOrFail($id);

        $userid = $user->id;
        $product_exist =Cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();
if($product_exist){

$cart=Cart::find($product_exist)->first();
$quantity = $cart->quantity;
$cart->quantity=$quantity + $request->input('quantity');
if($product->discount_price!= null){
    $cart->price=$product->discount_price * ($quantity + $request->input('quantity'));
    
}else {
    $cart->price=$product->price * ($quantity + $request->input('quantity'));
    $cart->price=$product->discount_price * ($quantity + $request->input('quantity'));
   
}
$product->quantity = $product->quantity - ($quantity + $request->input('quantity')) ;
$product->save();
if( $product->quantity > 0 ){

$cart->save();
Alert::success('Product added successfuly','We have added product to the cart');

}else{
    return   redirect()->back()->with('msg','The Product quantity not enough');

}
return   redirect()->back()->with('msg','The Product quantity has been changed in your cart');
}else{
    $cart=new Cart();
    $request->validate([
        'quantity'=>['required', 'max:3']
    ]);
    $cart->name=$user->name;
    $cart->email=$user->email;
    $cart->phone=$user->phone;
    $cart->address=$user->address;
    $cart->user_id=$user->id;

    $cart->product_title=$product->title;
    $quantity = strip_tags($request->input('quantity'));

    if($product->discount_price!= null){
        $cart->price=$product->discount_price * $quantity;

    }else {
        $cart->price=$product->price * $quantity;

    }
    $product->quantity = $product->quantity - ($quantity + $request->input('quantity')) ;
    $product->save();
    $cart->product_id=$product->id;
    $cart->image=$product->image;
    $cart->quantity = $quantity;
    if( $product->quantity > 0 ){

        $cart->save();
        Alert::success('Product added successfuly','We have added product to the cart');

        }else{
            return   redirect()->back()->with('msg','The Product quantity not enough');
        
        }        
    return   redirect()->back()->with('msg','The order has been placed in your cart');
    
}


}else{
                    return redirect('login');

    }

    }
    
    public function show_cart(){
        if(Auth::id()){
            $id =Auth::user()->id;
            $carts=Cart::where('user_id',$id)->get();
        return view('home.showcart',compact('carts'));  
        }else{
            return redirect('login');
        }  
}
  public function show_order(){
        if(Auth::id()){
            $id =Auth::user()->id;
            $order=Order::where('user_id',$id)->where('delivery_status','processing')->get();
        return view('home.show_order',compact('order'));  
        }else{
            return redirect('login');
        }  
}
    public function delete_order($id){

        $data = Order::findOrFail($id);
        $data->delete();
        Alert::info('Product deleted successfuly','We have deleted product from the order');

        return redirect()->back()->with('msg','order has been deleted ');
}
    public function delete_cart($id){

        $data = Cart::findOrFail($id);
        $data->delete();
        Alert::info('Product deleted successfuly','We have deleted product from the cart');

        return redirect()->back();
}
    public function cash_order(){

        $user =Auth::user();
        $userid=$user->id;

        $data=Cart::where('user_id',$userid)->get();
        foreach($data as $data){
            $order = new Order();
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;


            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';
            $order->save();

            $product=Product::find($data->product_id);
            $product->quantity = $product->quantity - $data->quantity ;
            $product->save();


            $cart_id=$data->id;
            $cart=Cart::findOrFail($cart_id);

            $cart->delete();
        }        Alert::success('Congrats','your order will be processed ');

        return redirect()->back()->with('msg','All your orders has been accepted');

}

public function stripe($totalprice){
    return view('home.stripe',compact('totalprice')) ;

}

public function stripePost(Request $request,$totalprice)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([
            "amount" => $totalprice ,
            "currency" => "mad",
            "source" => $request->stripeToken,
            "description" => "Thanks For your payment" 
    ]);
    $user =Auth::user();
        $userid=$user->id;

        $data=Cart::where('user_id',$userid)->get();
        foreach($data as $data){
            $order = new Order();
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;


            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Pay Using Card';
            $order->delivery_status = 'processing';
            $order->save();
            $product=Product::find($data->product_id);
            $product->quantity = $product->quantity - $data->quantity ;
            $product->save();
            $cart_id=$data->id;
            $cart=Cart::findOrFail($cart_id);
            $cart->delete();
        }
        
           Alert::success('Congrats','your order will be processed ');

    return redirect()->back()->with('success', 'Payment successful!');
          
}

public function add_comment(Request $request){
    if(Auth::id()){
        $comment = new Comment();
        $comment->name = Auth::user()->name;
        $comment->user_id = Auth::user()->id;
        $comment->comment = strip_tags($request->input('comment'));
        $comment->save();
        return redirect()->back();

    }else{
        return redirect('login');
    }


}

public function add_reply(Request $request){
    if(Auth::id()){
        $reply = new Reply();
        $reply->name = Auth::user()->name;
        $reply->user_id = Auth::user()->id;
        $reply->comment = strip_tags($request->input('commentId'));
        $reply->reply = strip_tags($request->input('reply'));
        $reply->save();
        return redirect()->back();

    }else{
        return redirect('login');
    }


}
public function searchProduct(Request $request){
  
       $serach =strip_tags($request->input('searchProduct'));
       $product = Product::where('title','LIKE',"%$serach%")->paginate(4);

 $feature = Product::all()->random(4);
        $comment = Comment::orderBy('id', 'desc')->get();
        $reply = Reply::all();
        return view('home.userpage',compact('product','feature','comment','reply'));
   


}

}
