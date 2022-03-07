@extends('layouts.admin')

@section('content')
    <div class="contaiener">
        <div class="row">
            <div class="col-6 card">
                <h1>{{$boolpress->title}}</h1>
                <h2>{{$boolpress->content}}</h2>
                <p>{{$boolpress->category_name}}</p>
                <p>{{$boolpress->created_at}}</p>
                <p>{{$boolpress->updated_at}}</p>
                <img src="{{asset('storage/' . $boolpress->image)}}" alt="{{$boolpress->title}}">
                <a href="{{route('adminhome')}}">Torna alla home</a>
            </div>
        </div>
    </div>
@endsection