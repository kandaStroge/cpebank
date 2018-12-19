@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')


<form method="post" action="/admin/asset/add">
        {{csrf_field()}}
<div id="addDiv">
<div class="form-group">
    <label >Title</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="User">
  </div>
  <div class="form-group">
    <label >Value</label>
    <input type="number" class="form-control"  id="value" name="value">
  </div>
  </div>
  <button type="submit" class="btn btn-success"  >ADD</button>
  </form>


  <form method="post" action="/admin/asset/del">

    {{csrf_field()}}
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Asset_ID</th>
        <th scope="col">Title</th>
        <th scope="col">Value</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    @foreach($asset as $a)
      <tr>
        <th scope="row">{{$a->id}}</th>
        <td>{{$a->name}}</td>
        <td>{{$a->value}}</td>
        <td><button type="submit" class="btn btn-danger" id="" name="id" >Delete</button>
          <input type="hidden" name="id" value="{{$a->id}}"></td>
      
        </form>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection
