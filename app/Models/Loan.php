<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';
    protected $fillable = ["code", "detail", "date_loan", "date_return", "status", "destination","transportation_id", "company_loc_id", "created_at", "updated_at", "active"];

    public function transportation(){
        return $this->belongsTo(Transportation::class,'transportation_id','id');
    }
}
