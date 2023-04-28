<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function projects(){
        
        return $this->hasMany(Project::class); //non serve importare il model poichè si trova nella stessa cartella.
    }
}
