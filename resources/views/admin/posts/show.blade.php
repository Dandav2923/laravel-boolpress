@extends('layouts.admin')

@section('content')
    <div class="contaiener">
        <div class="row">
            <div class="col-6 card">
                <h1>{{$boolpress->author}}</h1>
                <h2>{{$boolpress->illustrator}}</h2>
                <p>{{$boolpress->description}}</p>
                <span>{{$boolpress->price}}</span>
                <a href="{{route('adminboolpresses.index')}}">Torna alla home</a>
            </div>
        </div>
    </div>
@endsection