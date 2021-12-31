<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Location;

class Corporation extends Model
{
    use HasFactory;

    protected $table = 'corporation';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user', 
        'name', 
        'cover', 
        'description', 
        'whatsapp', 
        'verify', 
        'province', 
        'city', 
        'address', 
        'location'
    ];

    public function user(){
    	return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
