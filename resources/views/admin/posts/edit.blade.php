@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('adminboolpresses.update', $boolpress)}}" method="post">
                @csrf
                @method('PATCH')
                <label for="title" class="form-label">New Element</label>
                <div class="mb-3">
                    <select class="form-select" name="category_id">
                        <option value="">Select a category</option>
                        @foreach ($categories as $item)
                            <option @if (old('item_id', $boolpress->item_id) == $item->id) selected @endif value="{{ $item->id }}">
                                {{ $item->name }} - {{ $item->id }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="title"           aria-describedby="emailHelp" name="title" placeholder="Inserisci l'autore" value="{{$boolpress->title}}">
                        @error('title')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="content" name="content" placeholder="inserisci il contenuto" value="{{$boolpress->content}}">
                        @error('content')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <fieldset class="mb-3">
                        <legend>
                            <h2>Tags</h2>
                        </legend>
                        @foreach ($tags as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="tags[]"
                                {{in_array($item->id, old('tags', []))? 'checked': ''}}>
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$item->name}}
                                </label>
                            </div>
                        @endforeach
                    </fieldset>
                    @error('tags.*')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">
                        Modifica un elemento
                    </button>
                </form>                 
            </div>
        </div>
    </div>
@endsection