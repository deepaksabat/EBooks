<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
	protected $table = 'books';
	protected $fillable = array('name','description','image','pdf','publisher','category_id','author','edition','isbn','pages','published','posted','language','book_format','book_size');
}
