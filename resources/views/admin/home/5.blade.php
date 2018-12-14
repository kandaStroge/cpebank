@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')
{{ csrf_field() }}

<input type="button" class="btn btn-success" value="Show Add Panel" onClick="showAdd()">
<div id="addDiv">
<div class="form-group">
    <label >Title</label>
    <input type="text" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label >Description</label>
    <textarea class="form-control" rows="3" id="description"></textarea>
  </div>
  <input type="button" class="btn btn-success" value="Add" onClick="addPromotion()">
 </div> 

 <div id="editDiv">
<div class="form-group">
<label >ID</label>
    <input type="text" class="form-control" id="eid" readonly>
    <label >Title</label>
    <input type="text" class="form-control" id="etitle">
  </div>
  <div class="form-group">
    <label >Description</label>
    <textarea class="form-control" rows="3" id="edescription"></textarea>
  </div>
  <input type="button" class="btn btn-success" value="Edit" onClick="editPromotion()">
 </div> 



  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($promotion as $p)
    <tr>
      <th scope="row">{{$p->id}}</th>
      <td>{{$p->promotion_name}}</td>
      <td>{{$p->description}}</td>
      <td><input type="button" class="btn btn-danger" value="Delete" onClick="delPromotion({{$p->id}})">
      <input type="button" class="btn btn-warning" value="Edit" onClick="showEditPromotion({{$p->id}},'{{$p->promotion_name}}','{{$p->description}}')"></td>
    </tr>
    @endforeach
  </tbody>
</table>



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

function showEditPromotion(id,title,des){
    $("#eid").val(id)
    $("#etitle").val(title)
    $("#edescription").val(des)
    showEdit()
}

function editPromotion(){
    $.post("/admin/promotion/edit", {
        _token: $("input[name='_token']").val(),
        id: $("#eid").val(),
        title: $("#etitle").val(),
        description: $("#edescription").val()
    }, function(result){
        document.location = document.location;
    });
}

function addPromotion(){
    
    $.post("/admin/promotion/add", {
        _token: $("input[name='_token']").val(),
        title: $("#title").val(),
        description: $("#description").val()
    }, function(result){
        document.location = document.location;
    });
}

function delPromotion(pid){
    console.log(pid)
    $.post("/admin/promotion/del", {
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