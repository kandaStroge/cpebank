@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')
    <div class="container-fluid">
        <table class="table">
            <thead>
            <tr>
                <th class="col-1">Code</th>
                <th class="col-6">Name</th>
                <th class="col-3">Prov</th>
                <th class="col-1">EDT</th>
                <th class="col-1">DEL</th>

            </tr>
            </thead>
            <tbody>

            @foreach($hqs as $hq)
                <tr>
                    <td>{{$hq->hqId}}</td>
                    <td>{{$hq->hqName}}</td>
                    <td>{{$hq->name_en}}</td>
                    <td><form action="./edit" method="POST" >{{csrf_field()}}
                            <input  class="btn btn-primary" type="submit" value="edit">
                            <input type="hidden" name="prov" value="{{$hq->id}}">
                            <input type="hidden" name="hqId" value="{{$hq->hqId}}">
                        </form></td>
                    <td><form action="./delete" method="POST" >{{csrf_field()}}
                            <input  class="btn btn-danger" type="submit" value="Delete">
                            <input type="hidden" name="hqId" value="{{$hq->hqId}}">
                        </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection