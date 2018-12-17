@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')

<form method="post" action="./loan/del">
  {{csrf_field()}}
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">เลขที่</th>
      <th scope="col">จำนวนเงินกู้ยืม</th>
      <th scope="col">interest_rate</th>
      <th scope="col">time</th>
	  <th scope="col">payback</th>
	  <th scope="col">user_id</th>
	  <th scope="col">asset_id</th>
	  <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($loan as $l)
    <tr>
      <th scope="row">{{$l->id}}</th>
      <td>{{$l->amount}}</td>
      <td>{{$l->interest_rate}}</td>
	  <td>{{$l->time}}</td>
	  <td>{{$l->payback}}</td>
	  <td>{{$l->user_id}}</td>
	  <td>{{$l->asset_id}}</td>

      <td> <button type="submit" class="btn btn-danger" id="" name="id" onclick="delLoan({{$l->id}})">{{$l->id}}</button>
        </form>
      <input type="button" class="btn btn-warning" value="Edit" onClick="showEditLoan({{$l->id}},'{{$l->amount}}','{{$l->interest_rate}}','{{$l->time}}','{{$l->payback}}','{{$l->user_id}}','{{$l->asset_id}}')"></td>
    </tr>
    @endforeach
  </tbody>
</table>


<script src="/js/jquery-3.3.1.js"></script>
<script>



function delLoan(pid){
    console.log(pid)
    $.post("/admin/loan/del", {
        _token: $("input[name='_token']").val(),
        id: $("#id").val()
    }, function(result){
        document.location = document.location;
    });
}
$( document ).ready(function() {
    console.log( "ready!" );
</script>

@endsection
