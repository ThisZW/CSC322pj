@extends('layouts.app')


@section('content')


	<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12"><div class="card">
			<div class="card-header">
				Order detail
			</div> 
			<div class="card-body">
                    
                    <div class = "order-id">
                    	<p>Order ID :</p>
                    	<div></div>
                    </div>

                    <div class = "order-store">
                    	<p> Ordered Store Name:</p>
                    	
                    	<x-star-rating>
                    		<p> It has current rate of: </p>

                    		<div class="star full"></div>
                    		<div class="star full"></div>
                    		<div class="star full"></div>
                    		<div class="star"></div>
                    		<div class="star"></div>
                    		
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
                        			<th>Price</th>
                        			<th>Quantity</th>
                        			<th>Subtotal</th>
                        		</tr>

                        		<tr>
                        			<td>Green Bubble Milk Tea</td>
                        			<td>5.50</td>
                        			<td>2</td>
                        			<td>11</td>
                        		</tr>

                        		<tr>
                        			<td>Green Bubble Milk Tea</td>
                        			<td>5.50</td>
                        			<td>2</td>
                        			<td>11</td>
                        		</tr>

                        	</table>
                        </div>

                    </div>

                    <div class = "order-summary">

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
@endsection
