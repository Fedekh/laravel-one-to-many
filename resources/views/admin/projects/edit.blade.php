@extends('layouts.admin')

@section('content')
    <div class="container text-center">


        <h1 class="my-3">Crea il tuo projects : </h1>
        <div class="">

            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- serve per sovrascrivere il metodo post dato che il form supporta solo get e post -->
                <!-- il value è per far si che quando si modifica un dato, questo rimanga salvato -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $project->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

               
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <input type="submit" value="Salva" class="btn btn-primary">
                <a class="btn btn-success" href="{{ route('admin.projects.index') }}">Annulla</a>
            </form>
            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger deletBtn" type="button">Elimina</button>
            </form>

        </div>

    </div>
@endsection
