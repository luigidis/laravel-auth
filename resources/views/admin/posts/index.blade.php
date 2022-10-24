@extends('layouts.app')

@section('content')
    {{-- @dump($posts) --}}
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Elenco di posts:</h1>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.posts.create') }}" type="button" class="btn btn-primary btn-sm">Nuovo Post</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Created at</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category ? $post->category->name : 'Nessuna Categoria'}}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.posts.show', $post) }}" type="button"
                                        class="btn btn-primary btn-sm">Vedi Post</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <input type="submit" value="Elimina" class="btn btn-danger btn-sm ml-2">
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('admin.posts.edit', $post) }}" type="button"
                                        class="btn btn-warning btn-sm">Modifica Post</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
