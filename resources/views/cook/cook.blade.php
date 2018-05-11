<!-- 

Route::get('/cooktest', function(){
	return view ('cook.cook');
})


basic infos, name, current rating etc.
List of products, their name, id and prices should be enough , and a button to edit product, a button to delete product, and the button at the end to add a new product.
give a checkbox if the cook want to assign themselve into the product so customer can choose which cook to do it as an option.

-->



@extends('layouts.app')

@section('content')
	<div class="container">
   	 	<div class="row justify-content-center">
       		<div class="col-md-12">
        		<div class="card">
        			<div class = "card-header">
        				Cook information
        			</div>
                    <h5>Your Name: {{$data['name']}}</h5>
                    <h5>You Belongs to store: {{$data['store']->name}}</h5>
        			<div class = "cook-product">
        				<p class="center"> Product Lists:  </p>
        				<div class="cook-table">
        					<table class="table1" align="center">
        						<tr>
        							<th>Product ID</th>
        							<th>Product Name</th>
                                    <th>Price for VIP</th>
                                    <th>Price for Member</th>
                                    <th>Price for Visitor</th>
        							<th>Current Cooks</th>
        							<th>Rating</th>
                                    <th>Action</th>
        						</tr>
                                @foreach($data['store']->products as $p)
        						<tr>
        							<td>{{$p->id}}</td>
        							<td>{{$p->name}}</td>
        							<td>{{$p->price_t3}}</td>
        							<td>{{$p->price_t2}}</td>
                                    <td>{{$p->price_t1}}</td>
                                    <td></td>
                                    <td>{{$p->rating}}</td>
                                    <td></td>
        						</tr>
                                @endforeach
        						<tfoot>
        							<tr class = "first last">
        								<td class = "a-right last" colspan="50">
        									<button class = "button add" style="float: right; border-radius: 12px;">Add</button>
        								</td>
        							</tr>
        						</tfoot>

        					</table>
        				</div>
        			</div>

</div></div></div></div>
@endsection