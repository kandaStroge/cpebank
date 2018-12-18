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
                <th class="col-3">Lastname</th>
                <th class="col-3">email</th>
                <th class="col-1">EDT</th>
                <th class="col-1">DEL</th>

            </tr>
            </thead>
            <tbody>


            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->fname}}</td>
                    <td>{{$user->lname}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="./edit" method="post">
                            {{csrf_field()}}
                            <input class="btn btn-primary" type="submit" value="edit">
                            <input type="hidden" name="id" value="{{$user->id}}">
                        </form>
                    </td>
                    <td>
                        <form action="./delete" method="post" onsubmit="return confirm('คุณแน่ใจแล้วที่จะลบผู้ใช้คนนี้');">
                            {{csrf_field()}}
                            <input class="btn btn-danger " type="submit" value="Delete">
                            <input type="hidden" name="id" value="{{$user->id}}">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection