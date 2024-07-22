<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class conversations extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_1','user_2','last_message',
    ];
    public function user1(){
        return $this->belongsTo(User::class,'user_1');
    }
    public function user2(){
        return $this->belongsTo(User::class,'user_2');
    }
    public function last_message(){
        return $this->belongsTo(message::class,"last_message");
    }
}
