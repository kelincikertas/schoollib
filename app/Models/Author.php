<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'author';

    public function getAllAuthor(){
        return $this
            ->orderBy('id', 'asc')
            ->get();
    }

}
