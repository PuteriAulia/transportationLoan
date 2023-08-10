<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondConfirmer extends Model
{
    use HasFactory;

    protected $table = 'second_confirmers';
    protected $fillable = ["employee_id", "loan_id", "status", "created_at", "updated_at", "status_loan"];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function loan(){
        return $this->belongsTo(Loan::class,'loan_id','id');
    }
}
