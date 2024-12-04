<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'Piva',
        'address',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

/*
    public function plate()
    {
        return $this->belongsTo(Plate::class);
    } */

   public function types(){
       return $this->belongsToMany(Type::class);
   }
}
