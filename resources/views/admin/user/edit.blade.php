@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection

@section('content-header')
    {{$content_header}}
@endsection

@section('content')

    <form method="post" action="/admin/hq/edit/send">

        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleFormControlInput1">Headquarter Name</label>
            <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                   placeholder="Headquarter Name" value="{{$hqName[0]->hqName}}">
            <input type="hidden" name="hqId" value="{{$hqId}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Provinces</label>
            <select class="form-control" name="prov" id="exampleFormControlSelect1">
                <option></option>

                @php
                    $selected = '';

                foreach ($provs as $pv){

                        if ($pv->id == $vid){
                        $selected = 'selected="selected"';
                        }
                        echo '<option value="'.$pv->id.'" '.$selected.'>'.$pv->name_en.'</option>';
                    }

                @endphp
            </select>
        </div>

        <div class="form-group">
            <input type="submit" value="SAVE">
        </div>
    </form>

@endsection