@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')

    <form method="post" action="/admin/hq/add">

        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleFormControlInput1">Headquarter Name</label>
            <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                   placeholder="Headquarter Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Provinces</label>
            <select class="form-control" name="prov" id="exampleFormControlSelect1">
                <option></option>
                @foreach($provs as $pv)
                    <option value="{{$pv->id}}">{{$pv->name_en}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="submit" value="SAVE">
        </div>
    </form>

@endsection