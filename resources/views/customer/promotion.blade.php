@extends('customer.layout')

@section('content')
{{ csrf_field() }}
<br>
<div class="row">

@foreach($promotion as $p)

<div class="card border-primary mb-3" style="max-width: 18rem;">

<div class="card-body text-primary">
    <h5 class="card-title">{{$p->promotion_name}}</h5>
    <p class="card-text">{{$p->description}}</p>
</div>

</div>
&nbsp;&nbsp;&nbsp;&nbsp;		
@endforeach





</div>




@endsection