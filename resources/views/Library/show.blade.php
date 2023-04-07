@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if ($book)
                    <div class="card mb-3">
                        {{-- @if ($book->uploaded_image)
                            <img src="{{ asset('storage/' . $book->uploaded_image) }}" alt="{{ $book->title }}"
                                class="card-img-top">
                        @else
                            <img src="{{ $book->picture }}" class="card-img-top" alt="{{ $book->title }}">
                        @endif --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                            <p class="card-text">{{ $book->summary }}</p>
                        </div>
                    </div>
                @else
                    <div>
                        <img class="d-flex m-auto" src="https://media.tenor.com/OyUVgQi-l-QAAAAC/404.gif" alt="gif">
                    </div>
                @endif

                <div class="d-flex justify-content-around">
                    <a href="{{ route('book.index', ['book' => $book]) }}" class="btn btn-info">Back to home</a>
                    <a href="{{ route('book.edit', ['book' => $book]) }}" class="btn btn-warning">Edit</a>
                    <form method="post" action="{{ route('book.destroy', ['book' => $book->id]) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn_delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>

        @include('partials.delete_confirmation', [
            'delete_name' => 'book',
        ])
    </div>
@endsection
