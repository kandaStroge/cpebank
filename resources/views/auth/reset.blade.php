@extends('auth.layouts')

<form action="/reset" method="post">
    {{csrf_field()}}
    <input type="email" name="email" id="">
    <input type="submit" value="send">
</form>