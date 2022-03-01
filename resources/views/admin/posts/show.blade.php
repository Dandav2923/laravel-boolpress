@extends('layouts.admin')

@section('content')
    <div class="contaiener">
        <div class="row">
            <div class="col-6 card">
                <h1>{{$boolpress->title}}</h1>
                <h2>{{$boolpress->content}}</h2>
                <p>{{$boolpress->slug}}</p>
                <a href="{{route('adminboolpresses.index')}}">Torna alla home</a>
            </div>
        </div>
    </div>
@endsection