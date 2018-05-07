<!--Delivery index page-->

<!-- Route::get('/deliveryindextest', function(){
	return view ('delivery.delivery');
})

This should have some basic infos for delivery people: IE: names, email, current ratings/list of received comments, payment awaiting to receive from the store manager. etc. 
This should also have a list of orders that delivery people received from the store manager, and they can be clicked for details.
(go see checklist if this is not clear)
-->

@extends('layouts.app')

@section('content')
	<div class="delivery-container container">
   	 	<div class="row justify-content-center">
       		<div class="col-md-12">
        		<div class="card">
        			<div class="card-header">
                My Delivery page
                    </div> 

                    <div class="card-body row">
                    	<div class="account-container col-md-12">
                    		    <div class="row">
                                     <div class="col-md-4">
                                      
                                         <h3>More Information</h3>
                                         <ul class="" style="list-style-type:disc">
                                         <li class="active"><a href="#">Account</a></li>
                                         <li><a href="myaccount/orders">Order</a></li>
                                         <li><a href="#">Change Password</a></li>
                                         <li><a href="#">Order Position</a></li>
                                         </ul>



                                    </div>
                                    <div class="col-md-8">
                                    <h2><strong>Delivery History</strong></h2>
                                    <br>
                                    <br>
                                    <h4><b>The Order is delivered<b></h4>
                                    <div class="order-table">
                                    	<table class="table1">
                                    		<tr>
                                    			<th>Store</th>
                                    			<th>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</th>
                                    		</tr>
                                    		<tr>
                                    			<th>Coustomer Name</th>
                                    			<th></th>
                                    		</tr>
                                    		<tr>
                                    			<th>Coustomer Address</th>
                                    			<th></th>
                                    		</tr>
                                    		<tr>
                                    			<th>Status</th>
                                    			<th>Complete at 11:am at May 4,2018</th>
                                    		</tr>
                                    		<tr>
                                    			<th>Please give rating</th>
                                    			<th>

                                                    <div class="rating-container">
                                                        <fieldset class="rating">
                                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5">5 star</label>
                                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4">4 star</label>
                                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3">3 star</label>
                                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2">2 star</label>
                                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1">1 star</label>
                                                        </fieldset>
                                                        <button class="submit-rate-btn btn btn-md">Submit</button>
                                                    </div>

                                                    <script language = "javascript">
                                                        $(document).ready(function() {
                                                            $("form#ratingForm").submit(function(e)
                                                            {
                                                                e.preventDefault();
                                                                if ($("#ratingForm :radio:checked").length == 0) {
                                                                    $('#status').html("nothing checked");
                                                                    return false;
                                                                } else {
                                                                    $('#status').html( $('input:radio[name=rating]:checked').val() + 'stars');
                                                                }
                                                            });
                                                        });
                                                    </script>


                                                </th>
                                    		</tr>
                                   
                                        </table>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <h4><b>The Order is Not Delivery Yet</b></h4>
                                    <div class="order-table">
                                    	<table class="table2" >
                                    		<tr>
                                    			<th>Store</th>
                                    			<th>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</th>
                                    		</tr>  
                                    		<tr>
                                    			<th>Coustomer Name</th>
                                    			<th></th>
                                    		</tr>
                                    		<tr>
                                    			<th>Coustomer Address</th>
                                    			<th></th>
                                    		</tr>
                                    		<tr>
                                    			<th>Status</th>
                                    			<th>Waiting for Response</th>
                                    		</tr>
                                    		
                                        </table>
                                    </div>
                                    
                                    <br>
                                    <button type="button" onclick="alert('We will get into your order soon')">Start!</button>
                                </div>


                        
<!-- write your code here inside card class-->

</div></div></div></div>
@endsection