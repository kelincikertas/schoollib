<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use App\Models\Author;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function homePage()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }

        $user = new User;
        $book = new Book;

        return view('admin_home', [
            'pageTitle' => "Admin page",
            'users' => $user->getAllUser(),
            'books' => $book->getAllBook(),
            'totalUser' => $user->getCount(),
            'totalBook' => $book->getCount(),
        ]);
    }

    public function userPage()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }

        return view('admin_user', [
            'pageTitle' => "Admin page",
        ]);
    }

    public function bookPage()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }
        
        return view('admin_book', [
            'pageTitle' => "Admin page",
        ]);
    }

    public function addUserPage()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }
        
        return view('admin_add_user', [
            'pageTitle' => "Admin page",
        ]);
    }

    public function addBookPage()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }
        
        $author = new Author;

        return view('admin_add_book', [
            'pageTitle' => "Admin page",
            'authors' => $author->getAllAuthor(),
        ]);
    }    

    public function updateUserPage($userid)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }
        
        $user = new User;

        return view('admin_update_user', [
            'pageTitle' => "Update User Page",
            'user' => $user->getUser($userid)
        ]);
    }

    public function updateBookPage($bookid)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }
        
        $author = new Author;
        $book = new Book;

        return view('admin_update_book', [
            'pageTitle' => "Admin page",
            'authors' => $author->getAllAuthor(),
            'book' => $book->getBook($bookid),
        ]);
    }   

    public function addUser(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }
        
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
  
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        $user->save();

        return redirect('admin/add-user')
            ->with('status','success')
            ->with('message','new user data has been added'); 
    }

    public function addBook(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }
        
        $validatedData = $request->validate([
            'authorid' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'tag' => ['required', 'string', 'max:255'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
   
        $destinationPath = 'book-image/';
        $image->move($destinationPath, $imageName);

        $book = new Book;
        $book->author_id = $request->authorid;
        $book->title = $request->title;
        $book->tag = $request->tag;
        $book->image = $imageName;
        $book->content = $request->content;
        $book->save();

        return redirect('admin/add-book')
            ->with('status','success')
            ->with('message','new book has been added');
    }

    public function updateUser(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }
        
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = new User;

        $selectedUser = $user->getUser($request->userid);
        $selectedUser->name = $request->name;
        $selectedUser->email = $request->email;
        $selectedUser->save();

        return redirect('admin/update-user/'.$request->userid)
            ->with('status','success')
            ->with('message','new user data has been updated'); 
    }

    public function updateBook(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }
        
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'authorid' => ['required', 'string', 'max:255'],
            'tag' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $book = new Book;

        $selectedBook = $book->getBook($request->bookid);
        $selectedBook->title = $request->title;
        $selectedBook->authorid = $request->authorid;
        $selectedBook->tag = $request->tag;
        $selectedBook->content = $request->content;

        if($request->file('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
    
            $destinationPath = 'book-image/';
            $image->move($destinationPath, $imageName);
            
            $selectedBook->image = $imageName;
        }

        $selectedBook->save();

        return redirect('admin/update-book/'.$request->bookid)
            ->with('status','success')
            ->with('message','new book data has been updated'); 
    }

    public function deleteUser($userid)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }
        
        $user = new User;

        $selectedUser = $user->getUser($userid);
        $selectedUser->delete();

        return redirect('admin/home/')
            ->with('status','user success')
            ->with('message','selected user has been deleted'); 
    }

    public function deleteBook($bookid)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if($user->role != "admin")
            return redirect('/home');
        }
        
        $book = new Book;

        $selectedBook = $book->getBook($bookid);
        $selectedBook->delete();

        return redirect('admin/home/')
            ->with('status','book success')
            ->with('message','selected book has been deleted'); 
    }
}
