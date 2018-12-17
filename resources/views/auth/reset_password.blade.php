@if(session()->has('auth-reset'))
    <form action="/reset/auth" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{session()->get('auth-reset')['user']}}">
        <input type="hidden" name="reset-token" value="{{session()->get('auth-reset')['token']}}">
        <input type="text" name="password" id="">
        <input type="submit" value="รีเซตรหัสผ่าน">
    </form>
@endif