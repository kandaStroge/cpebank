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
    <label >Description</label>
    <textarea class="form-control" rows="6" id="description"></textarea>
  </div>
  <input type="button" class="btn btn-success" value="Add" onClick="addTodolist()">
 </div> 

 <div id="editDiv">
<div class="form-group">
<label >ID</label>
    <input type="text" class="form-control" id="eid" readonly>
  </div>
  <div class="form-group">
    <label >Description</label>
    <textarea class="form-control" rows="6" id="edescription"></textarea>
  </div>
  <input type="button" class="btn btn-success" value="Edit" onClick="editTodolist()">
 </div> 

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($todolist as $t)
    <tr>
      <th scope="row">{{$t->id}}</th>
      <td>{{$t->description}}</td>
      <td><input type="button" class="btn btn-danger" value="Delete" onClick="delTodolist({{$t->id}})">
      <input type="button" class="btn btn-warning" value="Edit" onClick="showEditTodolist({{$t->id}},'{{$t->description}}')"></td>
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

function showEditTodolist(id,des){
    $("#eid").val(id)
    $("#edescription").val(des)
    showEdit()
}

function editTodolist(){
    $.post("/admin/todolist/edit", {
        _token: $("input[name='_token']").val(),
        id: $("#eid").val(),
        description: $("#edescription").val()
    }, function(result){
        document.location = document.location;
    });
}

function addTodolist(){
    
    $.post("/admin/todolist/add", {
        _token: $("input[name='_token']").val(),
        description: $("#description").val()
    }, function(result){
        document.location = document.location;
    });
}

function delTodolist(pid){
    console.log(pid)
    $.post("/admin/todolist/del", {
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