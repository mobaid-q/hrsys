<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emptype extends Model
{
    use HasFactory;
    protected $table = 'tblemptype';
    public $timestamps = false;
}
