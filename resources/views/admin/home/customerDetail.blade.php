@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')
{{ csrf_field() }}

<label>ค้นหา</label>
<select class="ui fluid search selection dropdown customerSelect" id='customerSelect'>
<option value="">Select</option>
    @foreach($customer as $c)
        <option value="{{$c->user->id}}">{{$c->id}} -- {{$c->user->fname}} {{$c->user->lname}}</option>
    @endforeach

</select>
<br>
<div class="form-row">
    <div class="col-5">
    <label>ชื่อ</label>
      <input type="text" class="form-control" id='fname' readonly>
    </div>
    <div class="col-5">
    <label>นามสกุล</label>
      <input type="text" class="form-control" id='lname'  readonly>
    </div>
    <div class="col">
    <label>เพศ</label>
      <input type="text" class="form-control" id='gender'  readonly>  
    </div>
  </div>
<br>
  <div class="form-row">
    <div class="col-5">
    <label>อีเมล</label>
      <input type="text" class="form-control" id='email' readonly>
    </div>
    <div class="col-5">
    <label>โทรศัพท์</label>
      <input type="text" class="form-control" id='phone'  readonly>
    </div>
    <div class="col">
    <label>วันเกิด</label>
      <input type="text" class="form-control" id='birthDate'  readonly>  
    </div>
  </div>
  <br>
  <div class="form-row">
    <div class="col-6">
    <label>ที่อยู่</label>
      <textarea class="form-control" id='homeAddr' rows='5' readonly></textarea>
    </div>
    <div class="col-6">
    <label>ที่อยู่ที่ทำงาน</label>
      <textarea class="form-control" id='workAddr' rows='5' readonly></textarea>
    </div>

  </div>


<link rel="stylesheet" type="text/css" href="/semantic/semantic.min.css">
<script
  src="/js/jquery-3.1.1.min.js"></script>
<script src="/semantic/semantic.min.js"></script>

<script>

$( document ).ready(function() {
    $('.ui.dropdown').dropdown({fullTextSearch:true});

    $('.customerSelect').change(function(){
        $.post("/admin/customer/request", {
            _token: $("input[name='_token']").val(),
            id: $("#customerSelect").val(),

        }, function(result){
            $('#fname').val(result.user.fname)
            $('#lname').val(result.user.lname)
            $('#gender').val(result.user.gender)
            $('#email').val(result.user.email)
            $('#phone').val(result.user.phone)
            $('#birthDate').val(result.user.dob)
            $('#homeAddr').val(result.user.home_addr)
            $('#workAddr').val(result.user.work_addr)
        });
    });
});
</script>
@endsection