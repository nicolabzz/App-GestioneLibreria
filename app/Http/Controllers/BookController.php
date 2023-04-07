<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    // ====================================
    // ====================================
    private $validation = [
        'title'      => 'required|max:255',
        'author'     => 'required|max:255',
        'isbn'       => 'nullable|digits:13',
        'summary'    => 'nullable',
        'added_date' => 'date',
        'read_count' => 'integer',
    ];

    // ====================================
    // ====================================
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ====================================
    // ====================================
    public function index()
    {
        $books = Book::where('user_id', Auth::id())->paginate();

        return view('/home', compact('books'));
    }

    // ====================================
    // ====================================
    public function create()
    {
        return view('Library.create');
    }

    // ====================================
    // ====================================
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->validation);

        $book = Book::create([
            'title'      => $validatedData['title'],
            'author'     => $validatedData['author'],
            'summary'    => $validatedData['summary'],
            'isbn'       => $validatedData['isbn'],
            'added_date' => now(),
            'read_count' => 0,
            'user_id'    => auth()->id()
        ]);

        $book->save();

        return redirect()->route('Library.show', ['book' => $book]);
    }

    // ====================================
    // ====================================
    public function show($book)
    {
        $book = Book::find($book);
        return view('Library.show', compact('book'));
    }

    // ====================================
    // ====================================
    public function edit(Book $book)
    {
        if (Auth::id() !== $book->user_id) {
            abort(401);
        }


        return view('Library.edit', compact('book'));
    }

    // ====================================
    // ====================================
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate($this->validation);

        $book = Book::find($book);

        $book->update($validatedData);

        return redirect()->route('Library.show', ['book' => $book->id])->with('success', 'Modifica libro avvenuta  con successo!');
    }

    // ====================================
    // ====================================
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index');
    }
}
