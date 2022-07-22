<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    //Asignacion Masiva
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categorias(){
        return $this->belongsTo(Categorias::class);
    }

    //Relacion uno a uno Polimorfica

    public function image(){
        return $this->morphOne(Imagenes::class, 'imageable');
    }
}
