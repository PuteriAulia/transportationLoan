<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = ['type', 'cost', 'km_in', 'km_out', 'date_in', 'date_out', 'desc', 'employee_id', 'transportation_id','company_loc_id', 'created_at', 'updated_at'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function transportation(){
        return $this->belongsTo(Transportation::class,'transportation_id','id');
    }
}
