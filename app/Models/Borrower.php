<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    protected $table = "borrowers";
    protected $fillable = ["employee_id","loan_id","created_at", "updated_at"];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function loan(){
        return $this->belongsTo(Loan::class,'loan_id','id');
    }
}
