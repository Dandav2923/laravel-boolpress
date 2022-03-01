@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('adminboolpresses.update', $boolpress->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="title" class="form-label">New Element</label>
                        <input type="text" class="form-control" id="title"           aria-describedby="emailHelp" name="title" placeholder="Inserisci l'autore" value="{{$boolpress->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label"></label>
                        <input type="text" class="form-control" id="content" name="content" placeholder="inserisci il contenuto" value="{{$boolpress->content}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Modifica un elemento</button>
                </form>                 
            </div>
        </div>
    </div>
@endsection