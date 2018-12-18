@extends('admin.layout.layout')
@section('title')

@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')

    <form method="post" action="./add">
        {{csrf_field()}}
        <div class="form-group">
            <label for="customerSelect">ค้นหารายชื่อจากสมาชิก</label>
            <select class="ui fluid search selection dropdown customerSelect" id='customerSelect' name="uid">
                <option value="">Select</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->id}}
                        -- {{$user->fname}} {{$user->lname}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">

            <button type="submit" class="btn btn-primary col-3">เพิ่มลูกค้า</button>


        </div>


    </form>
    <table class="table">
        <thead>
        <tr>
            <th>fid</th>
            <th>Name</th>
            <th>LastName</th>
            <th>email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->user->fname}}</td>
                <td>{{$customer->user->lname}}</td>
                <td>{{$customer->user->email}}</td>
                <td>
                    <form action="./delete" method="post">
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-danger" value="ลบ">
                        <input type="hidden" name="cid" value="{{$customer->id}}">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <link rel="stylesheet" type="text/css" href="/semantic/semantic.min.css">
    <script
            src="/js/jquery-3.1.1.min.js"></script>
    <script src="/semantic/semantic.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.ui.dropdown').dropdown({fullTextSearch: true});
        });
    </script>



@endsection