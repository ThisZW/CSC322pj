@extends('layouts.app')


@section('content')

	<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12"><div class="card">
			<div class="card-header">
				My Account page
			</div> 
            
			<div class="card-body">
                    <div class="account-container col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>More Information</h3>
                                <ul class="" style="list-style-type:disc">
                                <li class="active"><a href="#">Account</a></li>
                                <li><a href="#">Order</a></li>
                                <li><a href="#">Change Password</a></li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <h2>Your Orders</h2>  
                                @foreach($data->orders as $order)
                                <div class="order-block row">          
                                        <div class="col-6">Order ID: {{$order->id}}
                                            <br>Store Name: ???
                                            <br> Delivery Person: ???
                                            <br>Status: Completed
                                            <br>Time ??? </div>
                                    <div class="col-4"><button type="button" class="btn btn-sm order-detail-button" onclick="window.open('/myaccount/orders/'+ {{$order->id}})")>Order Detail</button></div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
