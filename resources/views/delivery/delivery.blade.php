<!--customer index page-->

<!-- Route::get('/customerindextest', function(){
	return view ('customer.customer');
})

This should have some basic infos for customer people: IE: names, email, current ratings/list of received comments, payment awaiting to receive from the customer manager. etc. 
This should also have a list of orders that customer people received from the customer manager, and they can be clicked for details.
(go see checklist if this is not clear)
-->

@extends('layouts.app')

@section('content')
	<div class="customer-container container">
   	 	<div class="row justify-content-center">
       		<div class="col-md-12">
        		<div class="card">
        			<div class="card-header">
                My customer page
                    </div> 

                    <div class="card-body row">
                    	<div class="account-container col-md-12">
                    		    <div class="row">
                                     <div class="col-md-2">                                   
                                         <h3>More Information</h3>
                                         <ul class="" style="list-style-type:disc">
                                         <li class="active"><a href="#">Account</a></li>
                                         <li><a href="myaccount/orders">Order</a></li>
                                         </ul>
                                    </div>
                                    <div class="col-md-10">
                                        <h4><b>The Order is delivered<b></h4>
                                        <div class="order-table">
                                            <table class="table1" align="center">
                                                <tr>
                                                    <th>Order Id</th>
                                                    <th>Store Id</th>
                                                    <th>Customer Name</th>
                                                    <th>Time Created</th>
                                                    <th>Rating</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach($data['delivered'] as $d)
                                                <tr>
                                                    <td>{{$d->order->id}}</td>
                                                    <td>{{$d->order->store_id}}</td>
                                                    <td>{{$d->order->order_name}}</td>
                                                    <td>{{$d->order->created_at}}</td>
                                                    @if($d->order->user_id > 0)
                                                        @if(!$d->has_rating)
                                                        <td><button id="rate-customer-btn-{{$d->order->user_id}}" class="btn btn-sm">Rate Now</button></td>
                                                            </tr>
                                                            <tr class="rating-customer-container p-tr-{{$d->order->user_id}}">
                                                                <td colspan="3">
                                                                    <fieldset class="rating" id="rating-customer-{{$d->order->user_id}}">
                                                                        <input type="radio" id="star5" name="rating-{{$d->order->user_id}}" value="5" /><label for="star5">5 star</label>
                                                                        <input type="radio" id="star4" name="rating-{{$d->order->user_id}}" value="4" /><label for="star4">4 star</label>
                                                                        <input type="radio" id="star3" name="rating-{{$d->order->user_id}}" value="3" /><label for="star3">3 star</label>
                                                                        <input type="radio" id="star2" name="rating-{{$d->order->user_id}}" value="2" /><label for="star2">2 star</label>
                                                                        <input type="radio" id="star1" name="rating-{{$d->order->user_id}}" value="1" /><label for="star1">1 star</label>
                                                                    </fieldset>
                                                                </td>
                                                                <td colspan="1">
                                                                    <button id="submit-customer-rate-btn-{{$d->order->user_id}}" class="btn btn-md">Submit</button><p class="customer-rating-success-msg-{{$d->order->user_id}}"></p>
                                                                </td>
                                                                <td colspan="3">
                                                                    <div id="rating-customer-comment-block-{{$d->order->user_id}}">
                                                                        <label for="rating-customer-comment">If you rating is below 3 Please give a reason:</label><br>
                                                                        <textarea type="textarea" id="rating-customer-comment-{{$d->order->user_id}}" name="rating-customer-{{$d->order->user_id}}" value="default" placeholder="Comments here" disabled="disabled"></textarea>
                                                                    </div>          
                                                                </td>
                                                            <script>
                                                                $(document).ready(function() {
                                                                    $("#rate-customer-btn-{{$d->order->user_id}}").click(function(){
                                                                        $(".p-tr-{{$d->order->user_id}}").slideDown();
                                                                    });
                                                                    $("#rating-customer-{{$d->order->user_id}}").click(function(){
                                                                        if ($('input:radio[name=rating-{{$d->order->user_id}}]:checked').val() == "2" || $('input:radio[name=rating-{{$d->order->user_id}}]:checked').val() == "1") {
                                                                            $('#rating-customer-comment-{{$d->order->user_id}}').prop('disabled', false);
                                                                        } else {
                                                                            $('#rating-customer-comment-{{$d->order->user_id}}').prop('disabled', true);
                                                                        }
                                                                    });
                                                                    $("#submit-customer-rate-btn-{{$d->order->user_id}}").click(function(event){
                                                                        if ($("#rating-customer-{{$d->order->user_id}} :radio:checked").length == 0){
                                                                            alert('Please choose rating before submit');
                                                                        }
                                                                        else {
                                                                            $.ajax({
                                                                                type: "POST",
                                                                                url: '/delivery/ratecustomer',
                                                                                data: { score : $('input:radio[name=rating-{{$d->order->user_id}}]:checked').val(),
                                                                                        customerId : "{{$d->order->user_id}}",
                                                                                        comment : $('#rating-customer-comment-{{$d->order->user_id}}').val(),
                                                                                        orderId : {{$d->order_id}},
                                                                                        _token: "{{ csrf_token() }}"},
                                                                                success: function(data) {
                                                                                    $('.customer-rating-success-msg-{{$d->order->user_id}}').text(data.data);
                                                                                    $('#submit-customer-rate-btn-{{$d->order->user_id}}').attr("disabled","disabled");
                                                                                }
                                                                        });}
                                                                    });
                                                                });
                                                            </script>
                                                            @else
                                                            <td>{{$d->rating}} stars</td>
                                                            @endif
                                                    @else
                                                    <td>Visitor's order</td>
                                                    @endif
                                                    <td><a href="/delivery/{{$d->order->id}}"><button class="btn btn-md">Route history</button></a></td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                        <br><br>
                                        <h5>Orders waiting for delivery</h5>
                                        <div class="order-table">
                                            <table class="table1" align="center">
                                                <tr><th>Order Id</th>
                                                    <th>Store Id</th>
                                                    <th>Customer Name</th>
                                                    <th>Time Created</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach($data['waiting'] as $d)
                                                <tr>
                                                    <td>{{$d->order->id}}</td>
                                                    <td>{{$d->order->store_id}}</td>
                                                    <td>{{$d->order->order_name}}</td>
                                                    <td>{{$d->order->created_at}}</td>
                                                    <td><a href="/delivery/{{$d->order->id}}"><button class="btn btn-md">Deliver Now!</button></a></td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>


                                   <!-- <h2><strong>customer History</strong></h2>
                                    <br>
                                    <br>
                                    <h4><b>The Order is delivered<b></h4>
                                    <div class="order-table">
                                    	<table class="table1">
                                    		<tr>
                                    			<th>customer</th>
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
                                                        <fieldset class="rating" id="rating-customer">
                                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5">5 star</label>
                                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4">4 star</label>
                                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3">3 star</label>
                                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2">2 star</label>
                                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1">1 star</label>
                                                        </fieldset>
                                                        <button class="submit-rate-btn btn btn-md">Submit</button>
                                                    </div>

                                                    <script>
                                                         $(document).ready(function() {
                                                            $("#rating-customer").click(function(){
                                                                if ($('input:radio[name=rating]:checked').val() == "2" || $('input:radio[name=rating]:checked').val() == "1") {
                                                                    $('#rating-customer-comment-block').slideDown();
                                                                } else {
                                                                    $('#rating-customer-comment-block').slideUp();
                                                                }
                                                            });
                                                            $("#submit-customer-rate-btn").click(function(event){
                                                                if ($("#rating-customer :radio:checked").length == 0){
                                                                    alert('Please choose rating before submit');
                                                                }
                                                                else {
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: '/myaccount/ratecustomer',
                                                                        data: { customerId : "",
                                                                                score : $('input:radio[name=rating]:checked').val(),
                                                                                comment : $('#rating-customer-comment').val(),
                                                                                _token: "{{ csrf_token() }}"},
                                                                        success: function(data) {
                                                                            $('.customer-rating-success-msg').text(data.data);
                                                                            $('#submit-customer-rate-btn').attr("disabled","disabled");
                                                                        }
                                                                });}
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
                                    <h4><b>The Order is Not customer Yet</b></h4>
                                    <div class="order-table">
                                    	<table class="table2" >
                                    		<tr>
                                    			<th>customer</th>
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
                                </div> -->


                        
<!-- write your code here inside card class-->

</div></div></div></div>
@endsection