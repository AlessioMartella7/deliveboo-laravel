<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    //! Relation "one to Many" with Plate
    public function plate()
    {
        return $this->belongsTo(Plate::class);
    }

    //! Relation "Many to Many" with Type
   public function types()
   {
       return $this->belongsToMany(Type::class);
   }
}


}