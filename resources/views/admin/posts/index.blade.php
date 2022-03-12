@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

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
                    <th scope="col">Category</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th colspan="3" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->content}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>
                                @foreach ($item->tags()->get() as $itemTag)
                                    {{$itemTag->name}}
                                @endforeach
                            </td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td>
                                <a class="btn btn-light" href="{{route('adminboolpresses.show', $item)}}">View</a>
                            </td>
                        <td>
                            <a href="{{route('adminboolpresses.edit', $item)}}">
                                <input type="submit" value="Edit" class="btn btn-light">
                            </a>
                        </td>
                        <td>
                            <form 
                                action="{{route('adminboolpresses.destroy', $item)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="9">{{ $posts->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection