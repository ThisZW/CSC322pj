@extends('layouts.app')

@section('content')
	<div class="container">
   	 	<div class="row justify-content-center">
       		<div class="col-md-12">
        		<div class="card">
        			<div class = "card-header">
        				Add new product
        			</div>
        			<div class="container">
        				<form  method="POST" action="/cook/addproduct" enctype="multipart/form-data">
        					@csrf
				            <div class="form-group row">
				              <div class="col-md-4">
				              <label for="id">Product ID</label>
				              <input type="text" id="id" name="id" value="It will have a id after you add the product" readonly="readonly">
				            	</div>
				            	<div class="col-md-8">
				              <label for="name">Name</label>
				              <input type="text" id="name" name="name" value="">
				            </div>
				        	</div>
				            <div class="form-group row">
					            <div class="col-md-4">
					              <label for="name">Price for Vips</label>
					              <input type="text" id="price_t3" name="price_t3" value="">
					            </div>
					            <div class="col-md-4">
					              <label for="name">Price for Members</label>
					              <input type="text" id="price_t2" name="price_t2" value="">
					            </div>
					            <div class="col-md-4">
					              <label for="name">Price for Visitors</label>
					              <input type="text" id="price_t1" name="price_t1" value="">
					            </div>
				        	</div>
							<div class="form-group row">
				        		<div class="col-md-4">
				        			<label for="size">Size Options</label><br>
								    <select multiple name="size[]" style="height:auto">
										<option value="Large">Large</option>
										<option value="Medium">Medium</option>
										<option value="Normal">Normal</option>
										<option value="Small">Small</option>
									</select>
								</div>
				        		<div class="col-md-4">
				        			<label for="option">Other Options</label><br>
								    <select multiple name="option[]" style="height:auto">
										<option value="Large">Large</option>
										<option value="Medium">Medium</option>
										<option value="Normal">Normal</option>
										<option value="Small">Small</option>
									</select>
								</div>
				        		<div class="col-md-4">
				        			<label for="option">Extras</label><br>
								    <select multiple name="extra[]" style="height:auto">
										<option value="Large">Large</option>
										<option value="Medium">Medium</option>
										<option value="Normal">Normal</option>
										<option value="Small">Small</option>
									</select>
								</div>
				        	</div>				        	
				        	<div class="form-group row">
				        		<div class="col-md-4">
				        			<label for="category">Select Categories</label><br>
				        			<select id="category" name="category">
				        				@foreach($store->categories as $c)
				        					<option value="{{$c->id}}">{{$c->name}}</option>
				        					@endforeach
				        			</select>
				        		</div>
				        		<div class="col-md-4">
				        			<label for="image">Upload a image</label><br>
				        			<input type="file" id="image" name="image" required="required">
				        		</div>
				        	</div>
				        	 <input type="submit" class="btn-md btn" value="Confirm">
				        </form>
				        	<!--<div class="form-group row">
				        		<div class="col-md-4">
				        			<label for="size">Size Options</label>
								    <select multiple name="size[]" style="height:auto">
										<option value="">Large</option>
										<option value="">Medium</option>
										<option value="">Normal</option>
										<option value="">Small</option>
									</select>
								</div>
				        		<div class="col-md-4">
				        			<label for="option">Options</label>
								    <select multiple name="option[]" style="height:auto">
										<option value="">Large</option>
										<option value="">Medium</option>
										<option value="">Normal</option>
										<option value="">Small</option>
									</select>
								</div>
				        		<div class="col-md-4">
				        			<label for="option">Options</label>
								    <select multiple name="extra[]" style="height:auto">
										<option value="">Large</option>
										<option value="">Medium</option>
										<option value="">Normal</option>
										<option value="">Small</option>
									</select>
								</div>
				        	</div>-->
        				</form>
        			</div>

</div>
</div>
</div>
</div>
@endsection