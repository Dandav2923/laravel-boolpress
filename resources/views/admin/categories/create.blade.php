@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form 
                    action="{{route('admincategories.store')}}" 
                    method="POST">
                    @csrf
                    @method('POST')
                        <div class="mb-3">
                            <label for="name" class="form-label">New Category Element</label>
                            <input type="text" 
                                class="form-control" 
                                id="name" 
                                aria-describedby="emailHelp" 
                                name="name"      
                                placeholder="Inserisci il nome della categoria">
                                @error('name')
                                    <div class="alert alert-danger mt-3">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection