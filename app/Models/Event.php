<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
         'name',
         'date',
         'start_time',
         'finish_time',
         'address',
         'description',
         'client_id',
         'user_id',
         'category_id'
      ];

      public function client(){
        return $this->belongsTo(Client::class,'client_id');
      }

      public function users(){
        return $this->belongsTo(User::class,'user_id');
      }

      public function categories(){
        return $this->belongsTo(Category::class,'category_id');
      }
}
