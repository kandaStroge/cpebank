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
                <th class="col-3">Branch Name</th>
                <th class="col-3">Headquarter</th>
                <th class="col-1">EDT</th>
                <th class="col-1">DEL</th>

            </tr>
            </thead>
            <tbody>


            @foreach($branchs as $b)
                <tr>
                    <td>{{$b->bbId}}</td>
                    <td>{{$b->bbName}}</td>
                    <td>{{$b->bbBranchName}}</td>
                    <td>{{$b->bbBranchName}}</td>
                    <td>
                        <form action="./edit" method="post">
                            {{csrf_field()}}
                            <input class="btn btn-primary" type="submit" value="edit">
                            <input type="hidden" name="bbId" value="{{$b->bbId}}">
                        </form>
                    </td>
                    <td>
                        <form action="./delete" method="post">
                            {{csrf_field()}}
                            <input class="btn btn-danger" type="submit" value="Delete">
                            <input type="hidden" name="bbId" value="{{$b->bbId}}">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection