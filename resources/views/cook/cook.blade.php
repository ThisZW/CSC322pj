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
        			<div class = "cook-product">
        				<p> Product Lists:  </p>
        				<div class="cook-table">
        					<table class="table1" align="center">
        						<tr>
        							<th></th>
        							<th></th>
        							<th>Product Name</th>
        							<th>Cook ID/Name</th>
        							<th>Rating</th>
        						</tr>

        						<tr>
        							<td><a href="" class="btn center">Remove</a></td>
        							<td><a href="" cladd="btn center">Edit</a></td>
        							<td></td>
        							<td></td>
        							<td></td>

        						</tr>

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