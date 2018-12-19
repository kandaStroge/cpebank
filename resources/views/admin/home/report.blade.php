@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')
{{ csrf_field() }}


<div id="addDiv">
<div class="form-group">
    <label >Title</label>
    <input type="text" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label >Description</label>
    <textarea class="form-control" rows="3" id="description"></textarea>
  </div>
  <center><input type="button" class="btn btn-primary btn-lg col-3" value="Summit" onClick="addReport()"></center>
 </div>





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

function addReport(){

    $.post("/admin/report/add", {
        _token: $("input[name='_token']").val(),
        title: $("#title").val(),
        description: $("#description").val()
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
