@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')


    <form method="post" action="/admin/user/edit/send">

        {{csrf_field()}}
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" id=""
                   placeholder="First Name" value="{{$user->fname}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Last Name</label>
            <input type="text" class="form-control" name="lname" id=""
                   placeholder="Last Name" value="{{$user->lname}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Date of birth</label>
            <input type="date" class="form-control" name="dob" id=""
                   placeholder="01-01-2019" value="{{$user->dob}}">
        </div>
        <div class="form-group">

            <label for="gender">Gender</label>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male"
                       value="male" {{($user->gender === "male")?"checked":"" }}>
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female"
                       value="female" {{($user->gender === "female")?"checked":"" }}>
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" maxlength="10" class="form-control" name="phone" id=""
                   placeholder="0812345678" value="{{$user->phone}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id=""
                   placeholder="abc@gmail.com" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="home_addr">Home Address</label>
            <textarea rows="4" cols="50" class="form-control" name="home_addr">{{$user->home_addr}}</textarea>

        </div>
        <div class="form-group">
            <label for="work_addr">Work Address</label>
            <textarea rows="4" cols="50" class="form-control" name="work_addr">{{$user->work_addr}}</textarea>
        </div>
        <div class="form-group">
            <label for="type">Type</label>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="customer"
                       value="customer" {{($user->type === "customer")?"checked":""}}>
                <label class="form-check-label" for="customer">
                    customer
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="officer"
                       value="officer" {{($user->type === "officer")?"checked":""}}>
                <label class="form-check-label" for="officer">
                    officer
                </label>
            </div>
        </div>


        <div class="form-group">
            <input type="hidden" name="id" value="{{$user->id}}">
            <button type="submit" class="btn btn-primary btn-lg col-3">Submit</button>
            <button type="reset" class="btn btn-secondary btn-sm">clear</button>
        </div>

    </form>

@endsection