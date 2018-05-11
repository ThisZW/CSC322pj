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
        			<div class="card-header">
        				Manage Page
        			</div>

                    <h5>Your Store {{$data['store']->name}} has a current rating of {{$data['store']->rating}}</h5>

                    <script>
                        $(document).ready(function(){
                            $(".submit-salary").click(function(event){
                                var id = $(this).data('id');
                                var obj = $(this);
                                $.ajax({
                                    type: "POST",
                                    url: '/manager/sendsalary',
                                    data: { userId : id,
                                            salary : $('#salary-input-' + id).val(),
                                            _token: "{{ csrf_token() }}"},
                                    success: function(data) {
                                        $(obj).prop("disabled",true);
                                        $('#salary-success-msg-' + id).text(data.data);
                                    }
                                });
                            });
                        });
                    </script>

        			<div class="manage-cooks">
        				<h3> Cooks  </h3>
        				<div class="cook-salary">
        					<table class="table1" align="center">
        						<tr>
        							<th></th>
        							<th>ID</th>
        							<th>Name</th>
                                    <th>Total Salary Given</th>
        							<th>Send Salary Now</th>
                                    <th>Status</th>
        						</tr>
                                @foreach($data['cooks'] as $c)
        						<tr>
        							<td>@if($c->status == 1)
                                        <button class="btn btn-md btn-layoff" data-id="{{$c->id}}">Layoff</button>
                                        <span id="layoff-success-msg-{{$c->id}}"></span>
                                        @endif</td>
        							<td>{{$c->id}}</td>
        							<td>{{$c->name}}</td>
                                    <td>{{$c->salaries}}</td>
        							<td><input type="number" id="salary-input-{{$c->id}}"/>
        								<button class="btn-md btn submit-salary" data-id="{{$c->id}}">Submit</button>
                                        <span id="salary-success-msg-{{$c->id}}"></span>
        							</td>
                                    <td>
                                        @if($c->status == 1)
                                        {{'Active'}}
                                        @else
                                        {{'Laid off'}}
                                        @endif
                                    </td>
        						</tr>
                                @endforeach

        					</table>
        				</div>
        			</div>

        			<div class = "manage-delivery">
        				<h3> Delivery People  </h3>
        				<div class="delivery-salary">
        					<table class="table1" align="center">
        						<tr>
        							<th></th>
        							<th>ID</th>
        							<th>Name</th>
                                    <th>Warning?</th>
                                    <th>Total Salary Given</th>
        							<th>Send Salary Now</th>
                                    <th>Status</th>
        						</tr>
                                @foreach($data['deliverys'] as $d)
        						<tr>
        							<td>@if($d->status == 1)
                                        <button class="btn btn-md btn-layoff" data-id="{{$d->id}}">Layoff</button>
                                        <span id="layoff-success-msg-{{$d->id}}"></span>
                                        @endif
                                    </td>
        							<td>{{$d->id}}</td>
        							<td>{{$d->name}}</td>
                                    <td>{{$d->warning}}</td>
                                    <td>{{$d->salaries}}</td>
        							<td><input type="number" id="salary-input-{{$d->id}}"/>
                                        <button class="btn-md btn submit-salary" data-id="{{$d->id}}">Submit</button>
                                        <span id="salary-success-msg-{{$d->id}}"></span>
        							</td>
                                    <td>
                                        @if($d->status == 1)
                                        {{'Active'}}
                                        @else
                                        {{'Laid off'}}
                                        @endif
                                    </td>
        						</tr>
                                @endforeach
        					</table>
        				</div>
        			</div>

                   <script>
                        $(document).ready(function(){
                            $(".btn-layoff").click(function(event){
                                var id = $(this).data('id');
                                var obj = $(this);
                                $.ajax({
                                    type: "POST",
                                    url: '/manager/layoff',
                                    data: { userId : id,
                                            _token: "{{ csrf_token() }}"},
                                    success: function(data) {
                                        $(obj).prop("disabled",true);
                                        $('#layoff-success-msg-' + id).text(data.data);
                                    }
                                });
                            });

                            $(".verify-visitor").click(function(event){
                                var id = $(this).data('id');
                                var obj = $(this);
                                var deliveryId = $('#select-delivery-' + id + ' :selected').val();
                                $.ajax({
                                    type: "POST",
                                    url: '/manager/verifyvisitor',
                                    data: { orderId : id,
                                            deliveryId: deliveryId,
                                            _token: "{{ csrf_token() }}"},
                                    success: function(data) {
                                        $(obj).prop("disabled",true);
                                        $(obj).next().next().prop("disabled",true);
                                        $('#verify-success-msg-' + id).text(data.data);
                                    }
                                });
                            });

                            $(".decline-order").click(function(event){
                                var id = $(this).data('id');
                                var obj = $(this);
                                $.ajax({
                                    type: "POST",
                                    url: '/manager/declinevisitor',
                                    data: { orderId : id,
                                            _token: "{{ csrf_token() }}"},
                                    success: function(data) {
                                        $(obj).prop("disabled",true);
                                        $(obj).prev().prev().prop("disabled",true);
                                        $('#decline-success-msg-' + id).text(data.data);
                                    }
                                });
                            });

                            $(".assign-delivery-job").click(function(event){
                                var id = $(this).data('id');
                                var obj = $(this);
                                var deliveryId = $('#select-delivery-' + id + ' :selected').val();
                                $.ajax({
                                    type: "POST",
                                    url: '/manager/assigntodelivery',
                                    data: { orderId : id,
                                            deliveryId: deliveryId,
                                            _token: "{{ csrf_token() }}"},
                                    success: function(data) {
                                        $(obj).prop("disabled",true);
                                        $('#assign-success-msg-' + id).text(data.data);
                                    }
                                });
                            });
                        });
                    </script>

        			<div class ="manage-orders">
        				<h3>Orders</h3>
        				<div class="visitor-confirm">
        					<table class="table1" align="center">
        						<tr>
        							<th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Status</th>
                                    <th>Delivery Person</th>
                                    <th>Created At</th>
                                    <th>Visitor's File(if applicable)</th>
                                    <th>Actions</th>
        						</tr>
                                @foreach($data['orders'] as $o)
        						<tr>
        							<td>{{$o->id}}</td>
        							<td>{{$o->order_name}}</td>
        							<td>@if($o->orderToDelivery['status'] == 0)
                                            {{'Declined'}}
                                        @elseif($o->orderToDelivery['status'] == 1)
                                            {{'Waiting for Approval'}}
                                        @elseif($o->orderToDelivery['status'] == 2)
                                            {{'Waiting for delivery'}}
                                        @elseif($o->orderToDelivery['status'] == 3)
                                            {{'Delivered'}}
                                        @endif
                                    </td>
        							<td>@if($o->orderToDelivery['status'] > 1)
                                        {{$o->delivery_name}}
                                        @elseif($o->orderToDelivery['status'] == 0)
                                        {{"Not Delivering"}}
                                        @else
                                        <select id="select-delivery-{{$o->id}}">
                                            @foreach($data['deliverys'] as $d)
                                                <option value="{{$d->id}}">{{$d->name}}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                    </td>
                                    <td>{{$o->created_at}}</td>
                                    <td>@if($o->file)
                                        <a href="/storage/uploads/{{$o->file}}">Click to view file</a></td>
                                        @endif
                                    <td>@if($o->file && $o->orderToDelivery['status'] == 1)
                                            <button class="btn btn-md verify-visitor" data-id="{{$o->id}}" style="margin-bottom:5px">Confirm and Assign to Delivery</button><span id="verify-success-msg-{{$o->id}}"></span>
                                            <button class="btn btn-md decline-order" data-id="{{$o->id}}">Decline this order</button><span id="decline-success-msg-{{$o->id}}"></span>
                                        @elseif($o->orderToDelivery['status'] == 1)
                                            <button class="btn btn-md assign-delivery-job" data-id="{{$o->id}}">Assign to this delivery person</button><span id="assign-success-msg-{{$o->id}}"></span>
                                        @endif
                                    </td>
        						</tr>
                                @endforeach
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
                    <div class="blacklist" style="text-align:center; margin:30px">
                    <h5>List of names in blacklist</h5>
                    @foreach($data['blacklist'] as $b)
                    <span>{{$b->name}}, </span>
                    @endforeach
                </div>
                    <h5 style="text-align:center">Complains</h5>
                    <table class="table1" align="center">
                        <tr>
                            <th>rater id</th>
                            <th>score</th>
                            <th>comment</th>
                        </tr>
                        @foreach($data['store']->ratings as $r)
                            <tr>
                                <td>{{$r->rater_id}}</td>
                                <td>{{$r->score}}</td>
                                <td>{{$r->comment}}</td>
                            </tr>
                        @endforeach
                    </table>
</div></div></div></div>
@endsection