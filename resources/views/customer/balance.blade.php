@extends('customer.layout')

@section('content')
    {{ csrf_field() }}
    <br />
    <div class="row">
        <center>
        <div class="jumbotron ">
            <h1 class="display-4">เช็คยอดเงินในบัญชี</h1>
            <div class="card-body text-primary ">
                <h1 class="card-title">{{$user->customers[0]->balance}}</h1>
                <p class="card-text">บาท</p>
            </div>
            <p class="lead"></p>
            <p class="lead"></p>
            <hr class="my-4">

        </div>
        </center>

    </div>

@endsection