<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompLoc extends Model
{
    use HasFactory;
    protected $table="company_locs";
    protected $fillable = ["code","name"];
}
