<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainAddress extends Model
{
    use HasFactory;

    protected $table='main_address';
    protected $primaryKey='id';
}
