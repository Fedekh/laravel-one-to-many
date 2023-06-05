@extends('layouts.admin')

@section('content')
    <div class="container text-center">


        <h1 class="my-3">Crea il tuo comics : </h1>
        <div class="">

            <form action="{{ route('comic.update', $comic->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- serve per sovrascrivere il metodo post dato che il form supporta solo get e post -->
                <!-- il value è per far si che quando si modifica un dato, questo rimanga salvato -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $comic->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control">{{ old('description', $comic->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="thumb">Thumb</label>
                    <input type="text" name="thumb" id="thumb" class="form-control @error('thumb') is-invalid @enderror"
                        value="{{ old('thumb', $comic->thumb) }}">
                    @error('thumb')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price', $comic->price) }}">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="series">Series</label>
                    <input type="text" name="series" id="series" class="form-control @error('series') is-invalid @enderror"
                        value="{{ old('series', $comic->series) }}">
                    @error('series')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sale_date">Sale Date</label>
                    <input type="text" name="sale_date" id="sale_date" class="form-control @error('sale_date') is-invalid @enderror"
                        value="{{ old('sale_date', $comic->sale_date) }}">
                    @error('sale_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type" class="d-block my-2">Tipologia</label>
                    <select name="type" id="type" class="rounded mb-4 @error('type') is-invalid @enderror">
                        <option @selected(old('type', $comic->type === 'comic')) value="comic">comic</option>
                        <option @selected(old('type', $comic->type === 'grapich novel')) value="graphic novel">graphic novel</option>
                        @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </select>
                </div>

                <input type="submit" value="Salva" class="btn btn-primary">
                <a class="btn btn-success" href="{{ route('comic.index') }}">Annulla</a>
                <form action="{{ route('comic.destroy', $comic->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger deletBtn" type="button">Elimina</button>
                </form>
            </form>

        </div>
        @include('layouts.delete')

    </div>
@endsection
