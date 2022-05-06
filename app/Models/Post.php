<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    //Un post pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Modificamos como se mostrará un valor al consultarlo
    public function getTitleAttribute($title){
        return ucfirst($title);
    }

    //Modificamos como se guardara en la base de datos
    public function setTitleAttribute($title){
        $this->attributes['title'] = strtolower($title);
    }
}
