<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use SoftDeletes;
    protected $table = 'contactos';
    protected $primarykey = 'id';
    protected $fillable = ['name','email','phone','message'];
}
