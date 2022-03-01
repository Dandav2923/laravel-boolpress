@extends('layouts.admin')

@section('content')
    {{-- stampare la tabella di dati presi dalla funzione index nel controller --}}
    @if (session('status'))
        <div class="alert">
            {{session('status')}}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->content}}</td>
                            <td>{{$item->slug}}</td>
                            <td>
                                <a href="{{route('adminboolpresses.create')}}">Create new element</a>
                            </td>
                        <td>
                            <a href="{{route('adminboolpresses.edit', $item->id)}}">
                                Modifica elemento
                            </a>
                        </td>
                        <td>
                            <form 
                                action="{{route('adminboolpresses.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection