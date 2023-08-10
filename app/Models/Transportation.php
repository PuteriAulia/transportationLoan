<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;

    protected $table="transportations";
    protected $fillable = ["plate","ownership","merk","colour","type","status","type_payload","company_loc_id","created_at","updated_at"];

    public function companyloc(){
        return $this->belongsTo(CompLoc::class,'company_loc_id','id');
    }
}
