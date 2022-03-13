<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    //referenciar nuestro modelo con la tabla de la base de datos y la llave primaria
    protected $table = 'companies';
    protected $primaryKey = 'company_id';
}
