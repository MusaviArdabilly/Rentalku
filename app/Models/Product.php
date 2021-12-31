<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'Product';

    protected $primaryKey = 'id';

    protected $fillable = ['id_user', 'id_vehicle', 'id_corporation', 'id_location', 'picture', 'title', 'description', 'price'];

    public function user(){
    	return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function vehicle(){
    	return $this->belongsTo(Vehicle::class, 'id_vehicle', 'id');
    }

    public function corporation(){
    	return $this->belongsTo(corporation::class, 'id_corporation', 'id');
    }

    public function location(){
    	return $this->belongsTo(Location::class, 'id_location', 'id');
    }
}
