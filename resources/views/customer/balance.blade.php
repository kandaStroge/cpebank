@extends('customer.layout')

@section('content')
{{ csrf_field() }}
<div class="row">
				<h1>Balance : {{$user->customers[0]->balance}}</h1>
			</div>

@endsection