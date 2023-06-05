@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h1 class="my-3">Crea il tuo comics : </h1>
     
        <div class="">

            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="formGroupExampleInput">Inserisci titolo</label>
                    <input type="text" name="title" class="form-control my-3 w-50 @error('title') is-invalid @enderror"
                        id="formGroupExampleInput" placeholder="Inserisci titolo" >
                   
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Inserisci slug</label>
                    <input type="text" name="slug" class="form-control my-3 w-50 @error('title') is-invalid @enderror"
                        id="formGroupExampleInput" placeholder="Inserisci titolo" >
                   
                </div>
                
                <div class="form-group">
                    <label for="formGroupExampleInput">Inserisci descrizione</label>
                    <input type="text" name="content"
                        class="form-control my-3 w-50 @error('description') is-invalid @enderror" id="formGroupExampleInput"
                        placeholder="Inserisci descrizione">
                   
                </div>
                
               
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success" href="{{ route('admin.projects.index') }}">Ritorna nella lista</a>

            </form>
        </div>

    </div>
@endsection
