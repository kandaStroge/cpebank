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
    @foreach($tracker as $t)
        <option value="{{$t->id}}">{{$t->id}} -- {{$t->time}} </option>
    @endforeach
  
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
        @foreach($tracker as $t)
            <tr>
                <th scope="row">{{$t->id}}</th>
                <td>{{$t->amount}}</td>
                <td>{{$t->interest_rate}}</td>
                <td>{{$t->time}}</td>
                <td>{{$t->payback}}</td>
                <td>{{$t->user_id}}</td>
                <td>{{$t->asset_id}}</td>
                <td><input type="button" class="btn btn-danger" value="Delete" onClick="delTracker({{$t->id}})">
                    <input type="button" class="btn btn-warning" value="Edit"
                           onClick="showEditTracker({{$t->id}},'{{$t->amount}}','{{$t->interest_rate}}','{{$t->time}}','{{$t->payback}}','{{$t->user_id}}','{{$t->asset_id}}')">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



    <script>


        function add() {

            $.post("/admin/tracker/add", {
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
            $.post("/admin/track/del", {
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