<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class Location extends Model
{
    use HasFactory;
    protected $table = 'location';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user', 
        'id_province', 
        'id_regency', 
        'id_district', 
        'id_village', 
        'street'
    ];

    public function user(){
    	return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function province(){
    	return $this->belongsTo(Province::class, 'id_province', 'id');
    }

    public function regency(){
    	return $this->belongsTo(Regency::class, 'id_regency', 'id');
    }

    public function district(){
    	return $this->belongsTo(District::class, 'id_district', 'id');
    }

    public function village(){
    	return $this->belongsTo(Village::class, 'id_village', 'id');
    }
}
