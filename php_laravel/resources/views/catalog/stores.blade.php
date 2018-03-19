<!-- stores.blade.php -->

@include('layouts.header')

<div class="main">
<h2>Select your Stores:</h2>
@foreach($data as $store)
	<a href="/stores/{{$store->id}}/menu"><h2>{{$store->name}}</h2></a>
	@endforeach
</div>


@include('layouts.footer')