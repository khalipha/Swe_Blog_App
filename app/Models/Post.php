<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
   protected $table = 'posts'; 
   protected $primaryKey = 'postID';   
   protected $fillable = array('title','content','author_id');
}
