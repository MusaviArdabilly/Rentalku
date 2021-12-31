<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    
    protected $table = 'vehicle';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user', 
        'vehicle', 
        'license_plate', 
        'brand', 
        'type', 
        'color', 
        'transmision', 
        'chair_amount', 
        'fuel_type', 
        'price', 
        'tax_payment_date', 
        'license_plate_type', 
        'license_plate_expiration_date'
    ];

    public function user(){
    	return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
