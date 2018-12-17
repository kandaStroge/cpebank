@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')

<form method="post" action="./loan/add">
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
  <script src="/js/jquery-3.3.1.js"></script>
  <script>





function showAdd(){

    $("#addDiv").show();
    $("#editDiv").hide();
}

function showEdit(){
    $("#editDiv").show();
    $("#addDiv").hide();
}

function showEditReport(id,title,des){
    $("#eid").val(id)
    $("#etitle").val(title)
    $("#edescription").val(des)
    showEdit()
}

function editReport(){
    $.post("/admin/report/edit", {
        _token: $("input[name='_token']").val(),
        id: $("#eid").val(),
        title: $("#etitle").val(),
        description: $("#edescription").val()
    }, function(result){
        document.location = document.location;
    });
}

function addLoan(){

    $.post("/admin/loan/add", {
        _token: $("input[name='_token']").val(),
        amount: $("#amount").val(),
        interest_rate: $("#interest_rate").val(),
    		time: $("#time").val(),
    		payback: $("#payback").val(),
    		user_id: $("#user_id").val(),
    		asset_id: $("#asset_id").val()
    }, function(result){
        document.location = document.location;
    });
}

function delReport(pid){
    console.log(pid)
    $.post("/admin/report/del", {
        _token: $("input[name='_token']").val(),
        id: pid
    }, function(result){
        document.location = document.location;
    });
}
$( document ).ready(function() {
    console.log( "ready!" );

    $("#addDiv").show();
    $("#editDiv").hide();
});
</script>



@endsection
