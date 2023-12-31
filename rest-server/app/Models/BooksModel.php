<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table            = 'books';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['title', 'category_id', 'author_id', 'description'];

    // Dates
    protected $useTimestamps = TRUE;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
