@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')
{{ csrf_field() }}




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
  <input type="button" class="btn btn-success" value="Edit" onClick="editReport()">
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
  @foreach($report as $p)
    <tr>
      <th scope="row">{{$p->id}}</th>
      <td>{{$p->report_name}}</td>
      <td>{{$p->description}}</td>
      <td><input type="button" class="btn btn-danger" value="Delete" onClick="delReport({{$p->id}})">
      <input type="button" class="btn btn-warning" value="Edit" onClick="showEditReport({{$p->id}},'{{$p->report_name}}','{{$p->description}}')"></td>
    </tr>
    @endforeach
  </tbody>
</table>



<script src="/js/jquery-3.3.1.js"></script>
<script>


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
