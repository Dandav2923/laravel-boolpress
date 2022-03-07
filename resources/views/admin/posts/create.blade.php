{{-- Stampiamo il form per inserire un nuvo elemento nel db --}}
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('adminboolpresses.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <select 
                            class="form-select" 
                            aria-label="Default select example"
                            name="category_id">
                            <option value="">Select a category</option>
                            @foreach ($categories as $item)
                                <option 
                                    @if (old('category_id') == $item->id) 
                                    selected 
                                    @endif 
                                    value="{{$item->id}}">
                                        {{$item->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">New Element</label>
                        <input type="text" class="form-control" id="title"         aria-describedby="emailHelp" name="title" placeholder="Inserisci il titolo">
                        @error('title')
                            <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label"></label>
                        <input type="text" class="form-control" id="content" name="content" placeholder="inserisci il contenuto del post">
                        @error('content')
                            <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="image" name="image">
                        <label class="input-group-text" for="image">Upload</label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Crea un nuovo elemento
                    </button>
                </form>                 
            </div>
        </div>
    </div>
@endsection