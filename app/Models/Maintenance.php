<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Maintenance extends Model
{
    use HasFactory;
    
    protected $table = 'maintenance';

    protected $primaryKey = 'id';

    protected $fillable = ['id_user', 'id_vehicle', 'maintenance', 'cost'];

    public function user(){
    	return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function vehicle(){
    	return $this->belongsTo(Vehicle::class, 'id_vehicle', 'id');
    }
}
