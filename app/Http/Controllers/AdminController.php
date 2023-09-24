<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;
use PDF;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();

        return view('admin.category',compact('data'));
    }


    public function add_category(Request $request){
        $data = new Category();
        $data ->category_name = strip_tags($request->Input('category_name'));
        $data->save();
        return redirect()->back()->with('msg','Caregory add successfuly');
    }



    public function delete_category($id){
        $data = Category::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('msg','Caregory delete successfuly');
    }


    public function view_product(){
        $category = Category::all();

        return view('admin.product',compact('category'));

    }

 



    public function add_product(Request $request){
        $product = new Product();
        $product ->title = strip_tags($request->Input('title'));
        $product ->description = strip_tags($request->Input('description'));


        $image =$request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension() ;
        $request->file('image')->move('product',$imagename);
        $product ->image=$imagename;
        $product ->category = strip_tags($request->Input('category'));
        $product ->quantity = strip_tags($request->Input('quantity'));
        $product ->price = strip_tags($request->Input('price'));
        $product ->discount_price = strip_tags($request->Input('discount_price'));
        $product->save();
        return redirect()->back()->with('msg','Product add successfuly');
    }

    public function show_product(){
        $product = Product::all();

        return view('admin.show_product',compact('product'));

    }
    public function delete_product($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('msg','Product Delete successfuly');

    }
    public function edit_product($id){
        $product = Product::find($id);
        $category = Category::all();

        return view('admin.edit_product',compact('product','category'));

    }

    public function update_product(Request $request , $id){
        $product =  Product::findOrFail($id);
        $product ->title = strip_tags($request->Input('title'));
        $product ->description = strip_tags($request->Input('description'));
        $product ->quantity = strip_tags($request->Input('quantity'));
        $image =$request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension() ;
        $request->file('image')->move('product',$imagename);
        $product ->image=$imagename;

        $product ->category = strip_tags($request->Input('category'));
        $product ->price = strip_tags($request->Input('price'));
        $product ->discount_price = strip_tags($request->Input('discount_price'));
        $product->save();
        return redirect()->back()->with('msg','Product update successfuly');
    }

    public function order(){
    $order = Order::all();
    return view('admin.order',compact('order'));
    }

    public function delete_order($id){
       $order = Order::findOrFail($id);
$order->delete();
return redirect()->back()->with('msg','order delete successfuly');

    }
    public function order_delivery($id){
       $order = Order::findOrFail($id);
Notification::send($order, new SendEmailNotification($id));

$order->delivery_status="delivered";
$order->payment_status="paid";
$order->save();

return redirect()->back()->with('msg','order delivred successfuly  And email send automaticly');

    }
    public function print_pdf($id){
        $order = Order::findOrFail($id);

       $pdf = PDF::loadView('admin.pdf',compact('order'));
       return $pdf->download('order_details.pdf');



    } 
       public function search(Request $request){
       $delivery = $request->input('delivery');
       $search = $request->input('name');

       
       if($search!=""){
        $order = Order::where('name','LIKE',"%$search%")->get();
       }
       elseif($delivery !="" ){
        $order = Order::where('delivery_status',$delivery)->get();
       }elseif($delivery!=""  ||  $search!=""){
        $order = Order::where('name','LIKE',"%$search%")->where('delivery_status',$delivery)->get();
         }
       else{
        $order = Order::all();

       }
        return view('admin.order',compact('order'));

    }
}
