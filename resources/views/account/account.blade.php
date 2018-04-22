@extends('layouts.app')


@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"><div class="card">
            <div class="card-header">
                My Account page
            </div> 
            <div class="card-body row">
                    <div class="account-container col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <h2><strong>About Me</strong></h2>
                                <h5>Photo of me:</h5>
                                <div class="jumbotron text-center" style="margin-bottom:0">
                                    <p>fake image</p>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <h3>More Information</h3>
                                <ul class="" style="list-style-type:disc">
                                <li class="active"><a href="#">Account</a></li>
                                <li><a href="#">Order</a></li>
                                <li><a href="#">Change Password</a></li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <h2><strong>Personal Information</strong></h2>
                                <div class="col-50">
                                    <label for="name"><i class="fa fa-user"></i> Full Name</label><br>
                                    <input type="text" id="name" name="name" value="{{$data->name}}"><br>
                                    <label for="email"><i class="fa fa-envelope"></i> Email</label><br>
                                    <input type="text" id="email" name="email" value="{{$data->email}}"><br>
                                    <label for="adress"><i class="fa fa-address-card-o"></i> Address</label><br>
                                    <input type="text" id="adrress" name="address" value="{{$data->address}}"><br>
                                    <label for="phone"><i class="fa fa-institution"></i> Phone number</label><br>
                                    <input type="text" id="phone" name="phone" value="{{$data->phone_number}}"><br>
                                    <label for="rating"><i class="fa fa-envelope"></i>Rating</label><br>
                                    <input type="text" id="rating" name="rating" value="{{$data->rating}}" readonly><br>
                                    <label for="vip"><i class="fa fa-address-card-o"></i> VIP</label><br>
                                    <input type="text" id="vip" name="vip" value="{{$data->vip}}" readonly><br>
                                    <label for="role"><i class="fa fa-institution"></i>Role</label><br>
                                    <input type="text" id="role" name="role" value="{{$data->role}}" readonly><br>
                                    &#160;&#160;&#160;
                                    &#160;&#160;&#160;<div class="row">
                                        &#160;&#160;&#160;<input type="submit" value="Save">
                                    &#160;&#160;&#160;</div>

                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection

