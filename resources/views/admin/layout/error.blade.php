
@if(session()->has('report-message'))
    @if(session()->get('report-message')['code'] == 1)
        <div class="alert alert-success">
            {{ session()->get('report-message')['message'] }}
        </div>
    @elseif(session()->get('report-message-code')['code'] == 0)
        <div class="alert alert-danger">
            {{ session()->get('report-message')['message'] }}
        </div>

    @endif
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif