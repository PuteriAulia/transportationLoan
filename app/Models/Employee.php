<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = ["code","name","phone","email","gender","position_id","departement_id","company_loc_id","created_at","updated_at"];

    public function position(){
        return $this->belongsTo(Position::class,'position_id','id');
    }

    public function departement(){
        return $this->belongsTo(Departement::class,'departement_id','id');
    }

    public function companyloc(){
        return $this->belongsTo(CompLoc::class,'company_loc_id','id');
    }
}
