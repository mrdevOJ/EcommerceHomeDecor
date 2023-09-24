<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>pdf</title>
</head>
<body>
           <div class="card" >
            <h1>Order Details</h1>
        <div class="card-body">
            <img src="product/{{$order->image}}" width="70%" height="50%">
          <h3 class="card-text">Product Name : {{$order->product_title}}</h3>
          <ul class="list-group list-group-flush fs-3">
            <h4 class="list-group-item">Order ID : {{$order->id}}</h4>

            <h4 >Name : {{$order->name}}</h4>
            <h4 >Phone: {{$order->phone}}</h4>
            <h4 >Address: {{$order->address}}</h4>
            <h4 >Qauntity: {{$order->quantity}}</h4>
            <h4 >Payment status: {{$order->payment_status}}</h4>
            <h4 >Price: {{$order->price}} <strong>DH</strong></h4>
          </ul>
      </div>  
    </div>
   
</body>
</html>