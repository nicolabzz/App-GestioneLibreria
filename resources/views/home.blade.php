@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Welcome {{ Auth::user()->name }}.</h1>

        @if ($books->isEmpty())
            <p>Your Library is empty, let's make some gorgeous Books! <a href="{{ route('book.create') }}">click here to
                    create a book 😁</a></p>
            {{-- <div>
                <a href="{{ route('/') }}" class="btn btn-info">Change Account</a>
            </div> --}}
        @else
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        {{-- <th scope="col">ID</th> --}}
                        <th scope="col">Title:</th>
                        <th scope="col">Author:</th>
                        <th scope="col">Summary:</th>
                        <th scope="col">Added on:</th>
                        <th scope="col">Last page:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            {{-- <th scope="row">{{ $book->id }}</th> --}}
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td class="text-wrap">{{ $book->summary }}</td>
                            <td>{{ $book->added_date }}</td>
                            <td>{{ $book->read_count }}</td>
                            <td>
                                <a href="{{ route('book.show', ['book' => $book]) }}" class="btn btn-primary"><i
                                        class="bi bi-eye"></i>Show</a>
                                <a href="{{ route('book.edit', ['book' => $book]) }}" class="btn btn-warning"><i
                                        class="bi bi-pencil"></i>Edit</a>
                                <form method="post" action="{{ route('book.destroy', ['book' => $book->id]) }}"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn_delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        {{ $books->links() }}
    </div>


    @include('partials.delete_confirmation', [
        'delete_name' => 'book',
    ])
@endsection
