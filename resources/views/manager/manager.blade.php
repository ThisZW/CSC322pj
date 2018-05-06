<!-- Route::get('/managertest', function(){
	return view ('manager.manager');
})


List of cooks/ delivery people by table, their id and names, an input to type the amount of money that will send to delivery/cooks.

List of visitors waiting to be verified with their uploaded image, two buttons (yes and no)
 -->


 @extends('layouts.app')

@section('content')
	<div class="container">
   	 	<div class="row justify-content-center">
       		<div class="col-md-12">
        		<div class="card">
        			<div class = "card-header">
        				Manage Page
        			</div>
        			<div class = "manage-cooks">
        				<p> Cooks  </p>
        				<div class="cook-salary">
        					<table class="table1" align="center">
        						<tr>
        							<th></th>
        							<th>ID</th>
        							<th>Name</th>
        							<th>salary</th>
        						</tr>

        						<tr>
        							<td><a href="" class="btn center">Remove</a></td>
        							<td></td>
        							<td></td>
        							<td><input type="number"/><br>
        								<input type="submit" style="background-color: lightgray; font-size:12px; padding: 5px 12px;" value="Submit"/>
        							</td>
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

        			<div class = "manage-delivery">
        				<p> Delivery People  </p>
        				<div class="delivery-salary">
        					<table class="table1" align="center">
        						<tr>
        							<th></th>
        							<th>ID</th>
        							<th>Name</th>
        							<th>salary</th>
        						</tr>

        						<tr>
        							<td><a href="" class="btn center">Remove</a></td>
        							<td></td>
        							<td></td>
        							<td><input type="number"/><br>
        								<input type="submit" style="background-color: lightgray; font-size:12px; padding: 5px 12px;" value="Submit"/>
        							</td>
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

        			<div class = "manage-visitor">
        				<p> Visitors  </p>
        				<div class="visitor-confirm">
        					<table class="table1" align="center">
        						<tr>
        							<th>Image</th>
        							<th>Name</th>
        							<th>File URL</th>
        							<th>verification</th>
        						</tr>

        						<tr>
        							<td>
        								<img src="" border ="1" style="border-style: inset"
        								style = "border-color: coral" width="80" height="60" alt="Image of visitor"
        								title="picture of visitor"/>
        							</td>
        							<td></td>
        							<td></td>
        							<td>
        								<form action="">
        									<input type="radio" name="verify" value="yes"> Yes<br>
        									<input type="radio" name="verify" value="no"> No<br>
        								</form>
        							</td>
        						</tr>
        						<tfoot>
        							<tr class = "first last">
        								<td class = "a-right last" colspan="50">
        									<button class = "button confirmation" style="float: right; border-radius: 12px;">Confirm</button>
        								</td>
        							</tr>
        						</tfoot>

        					</table>
        				</div>
        			</div>

</div></div></div></div>
@endsection