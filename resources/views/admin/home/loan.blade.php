@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')

    {{ csrf_field() }}

    <div id="addDiv">
        <div class="form-group">
            <label>จำนวนเงินกู้ยืม</label>
            <input type="text" class="form-control" id="amount">
        </div>
        <div class="form-group">
            <label>Interest_rate</label>
            <input type="text" class="form-control" id="interest_rate">
        </div>
        <div class="form-group">
            <label>time</label>
            <input type="date" class="form-control" id="time">
        </div>
        <div class="form-group">
            <label>Payback</label>
            <input type="text" class="form-control" id="payback">
        </div>
        <div class="form-group">
            <label>user_id</label>
            <input type="text" class="form-control" id="user_id">
        </div>
        <div class="form-group">
            <label>asset_id</label>
            <input type="text" class="form-control" id="asset">
        </div>
        <input type="button" class="btn btn-success" value="Add" onClick="add()">
    </div>




    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">เลขที่</th>
            <th scope="col">จำนวนเงินกู้ยืม</th>
            <th scope="col">interest_rate</th>
            <th scope="col">time</th>
            <th scope="col">payback</th>
            <th scope="col">user_id</th>
            <th scope="col">asset_id</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($loan as $l)
            <tr>
                <th scope="row">{{$l->id}}</th>
                <td>{{$l->amount}}</td>
                <td>{{$l->interest_rate}}</td>
                <td>{{$l->time}}</td>
                <td>{{$l->payback}}</td>
                <td>{{$l->user_id}}</td>
                <td>{{$l->asset_id}}</td>
                <td><input type="button" class="btn btn-danger" value="Delete" onClick="delLoan({{$l->id}})">
                    <input type="button" class="btn btn-warning" value="Edit"
                           onClick="showEditLoan({{$l->id}},'{{$l->amount}}','{{$l->interest_rate}}','{{$l->time}}','{{$l->payback}}','{{$l->user_id}}','{{$l->asset_id}}')">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



    <script>


        function add() {

            $.post("/admin/loan/add", {
                _token: $("input[name='_token']").val(),
                amount: $("#amount").val(),
                interest_rate: $("#interest_rate").val()
                time: $("#time").val(),
                payback: $("#payback").val(),
                user_id: $("#user_id").val(),
                asset_id: $("#asset_id").val(),
            }, function (result) {
                document.location = document.location;
            });
        }

        function del(pid) {
            console.log(pid)
            $.post("/admin/loan/del", {
                _token: $("input[name='_token']").val(),
                id: pid
            }, function (result) {
                document.location = document.location;
            });
        }

        $(document).ready(function () {
            console.log("ready!");

            $("#addDiv").show();
            $("#editDiv").hide();
        });
    </script>


@endsection