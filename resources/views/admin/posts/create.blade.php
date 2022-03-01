{{-- Stampiamo il form per inserire un nuvo elemento nel db --}}
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('adminboolpresses.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="title" class="form-label">New Element</label>
                        <input type="text" class="form-control" id="title"         aria-describedby="emailHelp" name="title" placeholder="Inserisci il titolo">
                        @error('title')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label"></label>
                        <input type="text" class="form-control" id="content" name="content" placeholder="inserisci il contenuto del post">
                        @error('content')
                            {{$message}}
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Crea un nuovo elemento
                    </button>
                </form>                 
            </div>
        </div>
    </div>
@endsection