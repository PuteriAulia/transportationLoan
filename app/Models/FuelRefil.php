<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelRefil extends Model
{
    use HasFactory;

    protected $table="fuel_refils";
    protected $fillable = ["code","km_before","km_after","liter","cost","date","employee_id","created_at","updated_at","transportation_id", "company_loc_id"];

    public function transportation(){
        return $this->belongsTo(Transportation::class,'transportation_id','id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
