@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')

    <form method="post" action="/admin/branch/add">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleFormControlInput1">Bank Name</label>
            <input type="text" class="form-control" name="bbName" id=""
                   placeholder="Branch Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Branch Name</label>
            <input type="text" class="form-control" name="bbBranchName" id=""
                   placeholder="Branch Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Street Name</label>
            <input type="text" class="form-control" name="bbStreet" id=""
                   placeholder="Branch Name">
        </div>
        <div class="input_fields_wrap">
            <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block add_field_button">Add More Phone</button>
                <div class="">
                    <input type="text" name="bbPhones[]" class=" form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Headquarter</label>
            <select class="form-control" name="hq" id="">
                <option></option>
                @foreach($hqs as $hq)
                <option value="{{$hq->hqId}}">{{$hq->hqName}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="submit" value="SAVE">
        </div>


    </form>

    <script>
        $(document).ready(function () {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div><input type="text" name="bbPhones[]" class="form-control col-9"/><a href="#" aria-label="Close" class="close remove_field">&times;</a></div>'); //add input box
                }
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>

@endsection