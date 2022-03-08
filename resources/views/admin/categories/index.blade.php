@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <h1>
                    Categories
                </h1>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th colspan="3" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{ route('admincategories.show', $category) }}">View</a>
                            </td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{ route('admincategories.create')}}">Create</a>
                            </td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{ route('admincategories.edit', $category)}}">Modify</a>
                            </td>
                            <td>
                                <form 
                                action="{{route('admincategories.destroy', $category)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">{{ $categories->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection