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
    <form method="post" class="container" action="{{ route('book.update', ['id' => $book->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- TITLE section --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $book->title) }}" placeholder="Inserire titolo libro">
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

        {{-- AUTHOR section --}}
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input class="form-control @error('author') is-invalid @enderror" type="text" id="author" name="author"
                placeholder="Inserire autore libro" value="{{ old('author', $book->author) }}">
            <div class="invalid-feedback">
                @error('author')
                    <ul>
                        @foreach ($errors->get('author', $book->author) as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- ISBN section --}}
        <div class="mb-3">
            <label for="isbn" class="form-label">Code ISBN</label>
            <input type="number" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn"
                value="{{ old('isbn', $book->isbn) }}">
            @error('isbn')
                <div class="invalid-feedback">
                    <ul>
                        @foreach ($errors->get('isbn', $book->isbn) as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @enderror
        </div>

        {{-- SUMMARY section --}}
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <input type="text" class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary"
                value="{{ old('summary', $book->summary) }}" max="123456789" placeholder="Inserire trama del libro">
            @error('summary')
                <div class="invalid-feedback">
                    <ul>
                        @foreach ($errors->get('summary', $book->summary) as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Book</button>
        <a href="{{ route('book.index', ['book' => $book]) }}" class="btn btn-info">Back to home</a>
    </form>
@endsection
