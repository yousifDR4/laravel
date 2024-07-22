<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class conversations extends Model
{
    use HasFactory;
    public function user1(){
        return $this->belongsTo(User::class,'user_1');
    }
    public function user2(){
        return $this->belongsTo(User::class,'user_2');
    }
    public function last_message(){
        return $this->hasMany(message::class,"last_message");
    }
}
