@extends('layouts.app')


@section('content')
    <script>
        $(document).ready(function(){
            $('#rate-product').click(function(){
                $("#dialog").dialog();
            });
        });
    </script>
	<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12"><div class="card">
			<div class="card-header">
				Order detail
			</div> 
			<div class="card-body">
                    
                    <div class = "order-id">
                    	<p>Order ID : {{$data->id}}</p>
                    	<div></div>
                    </div>

                    <div class = "order-store">
                    	<p> Ordered Store Name: {{$data->store->name}}</p>
                    	
                    	<x-star-rating>
                    		<p> It has current rate of: {{$data->store->rating}}</p>

                    		<div class="star full"></div>
                    		
                    	</x-star-rating>
                    </div>

                    <div class = "order-deliver">
                    	<p> Delivery Person Name:</p>
                    	
                    	<x-star-rating>
                    		<p> He/She has current rate of: </p>

                    		<div class="star full"></div>
                    		<div class="star full"></div>
                    		<div class="star full"></div>
                    		<div class="star"></div>
                    		<div class="star"></div>
                    		
                    	</x-star-rating>
                    </div>

                    <div class = "order-status">
                    	<p> Status:</p>
                    </div>

                    <div class = "order-at">
                    	<p> Order at:</p>
                    </div>

                    <div class = "order-pay">
                    	<p> Payment Type:</p>
                    </div>

                    
                    <div class = "ordrer-product">
                    	<p> Products:</p>
                        <div class="order-table">
                        	<table class="table1" align="center">
                        		<tr>
                        			<th>Product Name</th>
                        			<th>Options</th>
                        			<th>Quantity</th>
                                    <th>Price</th>
                                    <th>Average Rating</th>
                        			<th>Subtotal</th>
                                    <th>Your Rating</th>
                        		</tr>
                                @foreach($data->orderProducts as $op)
                            		<tr>
                            			<td>{{$op->name}}</td>
                            			<td>{{$op->options}}</td>
                            			<td>{{$op->quantity}}</td>
                                        <td>{{$op->price}}</td>
                                        <td>{{$op->rating}}
                                            </td>
                            			<td>{{$op->quantity * $op->price}}</td>
                                        <td><button id="rate-product" class="btn btn-sm">Rate Now</button></td>
                                        <div id="dialog" title="Dialog Title">I'm in a dialog</div>
                            		</tr>
                                @endforeach
                        	</table>
                        </div>
                        <br><br>
                    </div>

                    <div class="order-summary">

                    	<table class="table2" align="right">
                    		<tr>
                    			<th> Summary </th>
                    			<td></td>
                    		</tr>
                    		<tr>
                    			<th> Total: </th>
                    			<td> 22 </td>
                    		</tr>

                    		<tr>
                    			<th> Totalotal/Tax: </th>
                    			<td> 22 </td>
                    		</tr>

                    		<tr>
                    			<th> Subtotal: </th>
                    			<td> 22 </td>
                    		</tr>
                    	</table>
                    </div>


                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

{{$data}}
@endsection
