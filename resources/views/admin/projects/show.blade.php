@extends('layouts.admin')

@section('content')
    <h1 class="text-center my-4"><span class="tiping"> Progetto : </span>{{ $project->title }}</h1>
    <h4 class="text-start my-3"> <span class="tiping"> Lo slug è:</span>  {{ $project->slug }} </h4>

    <h4 class="my-4"><span class="tiping">La descrizione è :</span>  {{ $project->content }}</h4>
    
    @if ($project->type)
        <h3><span class="tiping my-4">Tipologia:</span> {{ $project->type->name }}</h3>
    @else
        <h3><span class="tiping my-4">Nessuna Tipologia </span></h3>
    @endif

    <div class="cta d-flex gap-3 my-4">

        <a href="{{ route('admin.projects.index') }}" class="btn btn-success">
            Torna dietro</i>
        </a>
        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger deletBtn">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>

    </div>
    @include('admin.projects.delete')
@endsection
