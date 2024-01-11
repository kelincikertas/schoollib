<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'book';

    public function getLatestBook(){
        return $this
            ->orderBy('id', 'desc')
            ->first();
    }

    public function getRecentBooks(){
        return $this
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();
    }

    public function getAllBook(){
        return $this
            ->join('author', 'author.id', '=', 'book.author_id')
            ->orderBy('id', 'asc')
            ->select('book.*', 'author.name as author')
            ->get();
    }

    public function getBook($id){
        return $this
            ->join('author', 'author.id', '=', 'book.author_id')
            ->where('book.id', $id)
            ->select('book.*', 'author.id as authorid', 'author.name as author')
            ->first();
    }

    public function getCount(){
        return $this
            ->count();
    }
}
