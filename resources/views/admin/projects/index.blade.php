@extends('layouts.admin')

@section('content')
    <h1>La lista dei progetti</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning">
                            <i class="fa-solid fa-gear"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger deletBtn" type="button">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
