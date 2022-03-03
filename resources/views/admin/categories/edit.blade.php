@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form 
                    action="{{route('admincategories.update', $category)}}" 
                    method="POST">
                    @csrf
                    @method('PATCH')
                        <div class="mb-3">
                            <label for="name" class="form-label">Modify Category Element</label>
                            <input type="text" 
                                class="form-control" 
                                id="name" 
                                aria-describedby="emailHelp" 
                                name="name"      
                                placeholder="Inserisci il nome della categoria"
                                value="{{$category->name}}">
                                @error('name')
                                    <div class="alert alert-danger mt-3">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Modifica Elemento
                        </button>
                </form>
            </div>
        </div>
    </div>
@endsection