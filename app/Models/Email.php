<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $fillable = [
        'email'
      ];

      public function categories(){
        return $this->belongsTo(Category::class,'category_id');
      }

      public function users(){
        return $this->belongsTo(User::class,'user_id');
      }
}
