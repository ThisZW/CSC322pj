@extends('layouts.app')

@section('content')
	<div class="container">
   	 	<div class="row justify-content-center">
       		<div class="col-md-12">
        		<div class="card">
        			<div class = "card-header">
        				Edit product: id {{$data->id}}
        			</div>
        			<div class="container">
        				<form  method="POST" action="/cook/modifyproduct/{{$data->id}}" enctype="multipart/form-data">
        					@csrf
				            <div class="form-group row">
				              <div class="col-md-3">
				              <label for="id">Product ID</label>
				              <input type="text" id="id" name="id" value="{{$data->id}}" readonly="readonly">
				            	</div>
				            	<div class="col-md-9">
				              <label for="name">Name</label>
				              <input type="text" id="name" name="name" value="{{$data->name}}">
				            </div>
				        	</div>
				            <div class="form-group row">
					            <div class="col-md-4">
					              <label for="name">Price for Vips</label>
					              <input type="text" id="price_t3" name="price_t3" value="{{$data->price_t3}}">
					            </div>
					            <div class="col-md-4">
					              <label for="name">Price for Members</label>
					              <input type="text" id="price_t2" name="price_t2" value="{{$data->price_t2}}">
					            </div>
					            <div class="col-md-4">
					              <label for="name">Price for Visitors</label>
					              <input type="text" id="price_t1" name="price_t1" value="{{$data->price_t1}}">
					            </div>
				        	</div>
				        	<div class="form-group row">
				        		<div class="col-md-4">
				        			<label for="size">Size Options</label><br>
								    <select multiple name="size[]" style="height:auto">
										@foreach($data->productOptions as $o)
											@if ($o->option_type == 'size')
												<option value="{{$o->id}}">{{$o->option_name}}</option>
											@endif
										@endforeach
									</select>
								</div>
				        		<div class="col-md-4">
				        			<label for="option">Other options</label><br>
								    <select multiple name="option[]" style="height:auto">
										@foreach($data->productOptions as $o)
											@if ($o->option_type == 'option')
												<option value="{{$o->id}}">{{$o->option_name}}</option>
											@endif
										@endforeach
									</select>
								</div>
				        		<div class="col-md-4">
				        			<label for="option">Extras</label><br>
								    <select multiple name="extra[]" style="height:auto">
										@foreach($data->productOptions as $o)
											@if ($o->option_type == 'extras')
												<option value="{{$o->id}}">{{$o->option_name}}</option>
											@endif
										@endforeach
									</select>
								</div>
				        	</div>
				        	<div class="form-group row">
				        		<div class="col-md-4">
				        			<label for="category">Select Categories</label><br>
				        			<p>Current: {{$data->category->name}}</p>
				        			<select id="category" name="category">
				        				@foreach($store->categories as $c)
				        					<option value="{{$c->id}}">{{$c->name}}</option>
				        					@endforeach
				        			</select>
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