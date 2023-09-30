<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adver extends Model
{
    use HasFactory;
    public $table = "advertaisment";
    protected $guarded = [];
}
