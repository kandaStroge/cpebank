<div class="container">
    <div class="row">

        @foreach($content_menus as $cmenu)
            <button type="button" onclick="window.location.href='{{$cmenu['link']}}'"
                    class="btn btn-primary btn-lg  btn-block">{{$cmenu['title']}}</button>
        @endforeach

    </div>

</div>
