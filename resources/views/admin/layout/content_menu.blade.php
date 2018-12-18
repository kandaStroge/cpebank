<div class="container">
    <div class="row">

        @foreach($content_menus as $cmenu)
            <button type="button" onclick="window.location.href='{{$cmenu['link']}}'"
                    class="btn  btn-lg  btn-block {{($cmenu['color'] === "")?" btn-primary":$cmenu['color'] }}">{{$cmenu['title']}}</button>
        @endforeach

    </div>

</div>
