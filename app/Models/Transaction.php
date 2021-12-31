<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\User;
use App\Models\Schedule;

class Transaction extends Model
{
    use HasFactory;
    
    protected $table = 'transaction';

    protected $primaryKey = 'id';

    protected $fillable = ['id_user', 'id_schedule', 'income'];

    public function user(){
    	return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function schedule(){
    	return $this->belongsTo(Schedule::class, 'id_schedule', 'id');
    }
}
