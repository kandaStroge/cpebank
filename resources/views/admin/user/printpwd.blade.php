@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">สร้างสมาชิกเรียบร้อยแล้ว</h1>
        <p class="lead">นี่คือหน้าเรียนแบบสิ่งที่อยู่ในอีเมลของคุณ รหัสผ่านของคุณคือ</p>
        <hr class="my-4">
        <p>
            @if(session()->has('pwd'))
                {{ session()->get('pwd')}}
            @endif
        </p>
        <hr class="my-4">
        <p>แนะนำให้เปลี่ยนรหัสผ่านทันทีหลังได้รับข้อความนี้</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="/admin/user" role="button">กลับไปหน้าหลัก</a>
        </p>
    </div>

@endsection