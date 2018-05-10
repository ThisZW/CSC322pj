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
                    	<p>Order ID : {{$data->id}}</p>
                    	<div></div>
                    </div>

                    <div class = "order-store">
                    	<p> Ordered Store Name: {{$data->store->name}}</p> 
                        <p> It has current rate of: <b>{{$data->store->rating}}</b> Stars</p>
                    </div>
                    <p> Rate this store: </p>
                    @php 
                        $yourRating = $data->store->ratings->where('rater_id', $data->user_id)->first();
                    @endphp
                    @if ($yourRating)
                        <p> You have given this store the rating of {{$yourRating['score']}} stars </p>
                        <p> Your Comment was: {{$yourRating['comment']}} </p>
                    @else
                        <div class="rating-container">
                            <fieldset class="rating" id="rating-store">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5">5 star</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4">4 star</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3">3 star</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2">2 star</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1">1 star</label>
                            </fieldset>
                            <button id="submit-store-rate-btn" class=" btn btn-md">Submit</button><p class="store-rating-success-msg"></p>
                            <br>
                            <div id="rating-store-comment-block">
                                <label for="rating-store-comment">If you rating is below 3 Please give a reason:</label><br>
                                <textarea type="textarea" id="rating-store-comment" name="rating-store" value="default" placeholder="Comments here"></textarea>
                            </div>
                        </div>
                    
                    <script>
                        $(document).ready(function() {
                            $("#rating-store").click(function(){
                                if ($('input:radio[name=rating]:checked').val() == "2" || $('input:radio[name=rating]:checked').val() == "1") {
                                    $('#rating-store-comment-block').slideDown();
                                } else {
                                    $('#rating-store-comment-block').slideUp();
                                }
                            });
                            $("#submit-store-rate-btn").click(function(event){
                                if ($("#rating-store :radio:checked").length == 0){
                                    alert('Please choose rating before submit');
                                }
                                else {
                                    $.ajax({
                                        type: "POST",
                                        url: '/myaccount/ratestore',
                                        data: { storeId : "{{$data->store->id}}",
                                                score : $('input:radio[name=rating]:checked').val(),
                                                comment : $('#rating-store-comment').val(),
                                                _token: "{{ csrf_token() }}"},
                                        success: function(data) {
                                            $('.store-rating-success-msg').text(data.data);
                                            $('#submit-store-rate-btn').attr("disabled","disabled");
                                        }
                                });}
                            });
                        });
                    </script>
                    @endif
                    <br>
                        @if ($data->orderToDelivery->status != 1)
                            <div class = "order-deliver">
                            	<p> Delivery Person Name: {{$data->deliveryName}}</p>
                            <br>
                            <div class="order-status">
                                <p> Status: 
                                    @if($data->orderToDelivery->status == 2)
                                        {{"Not yet Delivered"}}
                                    @elseif($data->orderToDelivery->status == 0)
                                        {{"Declined, will not deliver"}}
                                    @else
                                        {{"Delivered"}}
                                    @endif

                                </p>
                            </div>
                            @if($data->orderToDelivery->status == 3)
                                <div class="rating-container">
                                <fieldset class="rating" id="rating-delivery">
                                    <input type="radio" id="star5" name="rating-delivery" value="5" /><label for="star5">5 star</label>
                                    <input type="radio" id="star4" name="rating-delivery" value="4" /><label for="star4">4 star</label>
                                    <input type="radio" id="star3" name="rating-delivery" value="3" /><label for="star3">3 star</label>
                                    <input type="radio" id="star2" name="rating-delivery" value="2" /><label for="star2">2 star</label>
                                    <input type="radio" id="star1" name="rating-delivery" value="1" /><label for="star1">1 star</label>
                                </fieldset>
                                <button id="submit-delivery-rate-btn" class=" btn btn-md">Submit</button><p class="delivery-rating-success-msg"></p>
                                <br>
                                <div id="rating-delivery-comment-block">
                                    <label for="rating-delivery-comment">If you rating is below 3 Please give a reason:</label><br>
                                    <textarea type="textarea" id="rating-delivery-comment" name="rating-delivery" value="default" placeholder="Comments here"></textarea>
                                </div>
                            </div>
                                <script>
                                $(document).ready(function() {
                                    $("#rating-delivery").click(function(){
                                        if ($('input:radio[name=rating-delivery]:checked').val() == "2" || $('input:radio[name=rating-delivery]:checked').val() == "1") {
                                            $('#rating-delivery-comment-block').slideDown();
                                        } else {
                                            $('#rating-delivery-comment-block').slideUp();
                                        }
                                    });
                                    $("#submit-delivery-rate-btn").click(function(event){
                                        if ($("#rating-delivery :radio:checked").length == 0){
                                            alert('Please choose rating before submit');
                                        }
                                        else {
                                            $.ajax({
                                                type: "POST",
                                                url: '/myaccount/ratedelivery',
                                                data: { deliveryId : "{{$data->orderToDelivery->delivery_id}}",
                                                        score : $('input:radio[name=rating-delivery]:checked').val(),
                                                        comment : $('#rating-delivery-comment').val(),
                                                        _token: "{{ csrf_token() }}"},
                                                success: function(data) {
                                                    $('.delivery-rating-success-msg').text(data.data);
                                                    $('#submit-delivery-rate-btn').attr("disabled","disabled");
                                                }
                                        });}
                                    });
                                });
                                </script>
                            @endif
                        @else
                            <p> This has not been delivered yet, you will see the information of delivery person after the delivery starts.</p>
                        @endif
                   



                    <div class="order-pay">
                    	<p> Payment Type: Paypal</p>
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
                                        <td>{{$op->rating}} Stars
                                            </td>
                            			<td>{{$op->quantity * $op->price}}</td>
                                        @php
                                            $yourProductRating = $op->ratings;
                                        @endphp
                                        @if (!$yourProductRating)
                                        <td><button id="rate-product-btn-{{$op->id}}" class="btn btn-sm">Rate Now</button></td>
                                		</tr>
                                        <tr class="rating-product-container p-tr-{{$op->id}}">
                                            <td colspan="2">
                                                <fieldset class="rating" id="rating-product-{{$op->id}}">
                                                    <input type="radio" id="star5" name="rating-{{$op->id}}" value="5" /><label for="star5">5 star</label>
                                                    <input type="radio" id="star4" name="rating-{{$op->id}}" value="4" /><label for="star4">4 star</label>
                                                    <input type="radio" id="star3" name="rating-{{$op->id}}" value="3" /><label for="star3">3 star</label>
                                                    <input type="radio" id="star2" name="rating-{{$op->id}}" value="2" /><label for="star2">2 star</label>
                                                    <input type="radio" id="star1" name="rating-{{$op->id}}" value="1" /><label for="star1">1 star</label>
                                                </fieldset>
                                            </td>
                                            <td colspan="2">
                                                <button id="submit-product-rate-btn-{{$op->id}}" class="btn btn-md">Submit</button><p class="product-rating-success-msg-{{$op->id}}"></p>
                                            </td>
                                            <td colspan="3">
                                                <div id="rating-product-comment-block-{{$op->id}}">
                                                    <label for="rating-product-comment">If you rating is below 3 Please give a reason:</label><br>
                                                    <textarea type="textarea" id="rating-product-comment-{{$op->id}}" name="rating-product-{{$op->id}}" value="default" placeholder="Comments here" disabled="disabled"></textarea>
                                                </div>          
                                            </td>
                                        </tr>
                                        <script>
                                            $(document).ready(function() {
                                                $("#rate-product-btn-{{$op->id}}").click(function(){
                                                    $(".p-tr-{{$op->id}}").slideDown();
                                                });
                                                $("#rating-product-{{$op->id}}").click(function(){
                                                    if ($('input:radio[name=rating-{{$op->id}}]:checked').val() == "2" || $('input:radio[name=rating-{{$op->id}}]:checked').val() == "1") {
                                                        $('#rating-product-comment-{{$op->id}}').prop('disabled', false);
                                                    } else {
                                                        $('#rating-product-comment-{{$op->id}}').prop('disabled', true);
                                                    }
                                                });
                                                $("#submit-product-rate-btn-{{$op->id}}").click(function(event){
                                                    if ($("#rating-product-{{$op->id}} :radio:checked").length == 0){
                                                        alert('Please choose rating before submit');
                                                    }
                                                    else {
                                                        $.ajax({
                                                            type: "POST",
                                                            url: '/myaccount/rateproduct',
                                                            data: { orderProductId : "{{$op->id}}",
                                                                    score : $('input:radio[name=rating-{{$op->id}}]:checked').val(),
                                                                    productId : "{{$op->product_id}}",
                                                                    comment : $('#rating-product-comment-{{$op->id}}').val(),
                                                                    _token: "{{ csrf_token() }}"},
                                                            success: function(data) {
                                                                $('.product-rating-success-msg-{{$op->id}}').text(data.data);
                                                                $('#submit-product-rate-btn-{{$op->id}}').attr("disabled","disabled");
                                                            }
                                                    });}
                                                });
                                            });
                                        </script>       
                                        @else
                                        <td>{{$yourProductRating->score . ": " . $yourProductRating->comment}}</td></tr>
                                        @endif
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
