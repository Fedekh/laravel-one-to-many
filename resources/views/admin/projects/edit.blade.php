@extends('layouts.admin')

@section('content')
    <div class="container text-center">


        <h1 class="my-3">Modifica il tuo progetto {{ $project->title }}: </h1>
        <div class="">

            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- serve per sovrascrivere il metodo post dato che il form supporta solo get e post -->
                <!-- il value è per far si che quando si tenta di modificare un dato, questo rimanga salvato -->
                <div class="form-group w-50 mx-auto mt-5">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $project->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group w-50 mx-auto mt-5">
                    <label for="type">Tipologia</label>
                    <select class="form-select mx-auto w-25" id="type" name="type_id">
                        <option value=""></option>
                        @foreach ($types as $type)
                            <option @selected($type->id == old('type_id', $project->type?->id)) value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group w-50 mx-auto my-5">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description', $project->description) }}</textarea>

                </div>
                <div class="cta d-flex-gap-3">
                    <input type="submit" value="Salva" class="btn btn-primary">
                    <a class="btn btn-success" href="{{ route('admin.projects.index') }}">Annulla</a>
                </div>
            </form>
            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger deletBtn">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>


        </div>

    </div>

    @include('admin.projects.delete')
@endsection
