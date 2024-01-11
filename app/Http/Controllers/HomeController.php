<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function homePage()
    {
        $book = new Book;
        if (Auth::check())
        {
            $user = Auth::user();
        }

        return view('home', [
            'pageTitle' => "home page",
            'latestBook' => $book->getLatestBook(),
            'recentBooks' =>  $book->getRecentBooks(),
        ]);
    }

    public function bookPage($bookid)
    {
        $book = new Book;

        return view('book', [
            'pageTitle' => "Book page",
            'book' => $book->getBook($bookid),
        ]);
    }
}
