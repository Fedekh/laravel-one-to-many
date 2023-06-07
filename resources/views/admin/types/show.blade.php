@extends('layouts.admin')

@section('content')
    <h3><span class="tiping my-4">Tipologia:</span> {{ $type->name }}</h3>

    <div class="cta d-flex gap-3 my-4">

        <a href="{{ route('admin.types.index') }}" class="btn btn-success">
            Torna dietro</i>
        </a>
        <form action="{{ route('admin.types.destroy', $project->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger deletBtn">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>

    </div>
    @include('admin.types.delete')
@endsection
