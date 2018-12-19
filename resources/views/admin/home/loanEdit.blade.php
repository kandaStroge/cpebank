@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')
{{ csrf_field() }}


<form method="post" action="/admin/loan/edit_send">
        {{csrf_field()}}

<div id="addDiv">
<div class="form-group">
      <label >จำนวนเงินกู้ยืม</label>
      <input type="number" class="form-control" name="amount" id="amount">
    </div>
    <div class="form-group">
      <label >Interest_rate</label>
      <input type="number" class="form-control"  name="interest_rate" id="interest_rate">
    </div>
    <div class="form-group">
      <label >time</label>
      <input type="date" class="form-control" name="time" id="time">
    </div>
    <div class="form-group">
      <label >Payback</label>
      <input type="number" class="form-control" name="payback" id="payback">
    </div>
    <div class="form-group">
      <label >user_id</label>
      <input type="number" class="form-control" name="user_id" id="user_id">
    </div>
    <div class="form-group">
      <label >asset_id</label>
      <input type="number" class="form-control" name="asset_id" id="asset_id">
    </div>

  </div>
<button type="submit" class="btn btn-success"  >ADD</button>
</form>


@endsection
