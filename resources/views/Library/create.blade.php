@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" class="container" action="{{ route('book.store') }}" enctype="multipart/form-data">
        @csrf

        {{-- TITLE section --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}" placeholder="Inserire titolo libro">
            @error('title')
                <div class="invalid-feedback">
                    <ul>
                        @foreach ($errors->get('title') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @enderror
        </div>

        {{-- SLUG section TODO: VEDERE SE RIMUOVENDO LO SLUG DAL CREATE CI SONO PROBLEMI --}}
        {{-- <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                value="{{ old('slug') }}" placeholder="Create a custom slug for your Books">
            @error('slug')
                <div class="invalid-feedback">
                    <ul>
                        @foreach ($errors->get('slug') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @enderror
        </div> --}}

        {{-- AUTHOR section --}}
        <div class="mb-3">
            <label for="author" class="form-label">Autore</label>
            <input class="form-control @error('author') is-invalid @enderror" type="text" id="author"
                name="author" placeholder="Inserire autore libro">
            <div class="invalid-feedback">
                @error('author')
                    <ul>
                        @foreach ($errors->get('author') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- ISBN section --}}
        <div class="mb-3">
            <label for="isbn" class="form-label">Codice ISBN</label>
            <input type="number" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn"
                value="{{ old('isbn') }}">
            @error('isbn')
                <div class="invalid-feedback">
                    <ul>
                        @foreach ($errors->get('isbn') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @enderror
        </div>


        {{-- SUMMARY section --}}
        <div class="mb-3">
            <label for="summary" class="form-label">Trama</label>
            <input type="text" class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary"
                value="{{ old('summary') }}" min="1" max="100" placeholder="Inserire trama del libro (max:1300 Parole)">
            @error('summary')
                <div class="invalid-feedback">
                    <ul>
                        @foreach ($errors->get('summary') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
