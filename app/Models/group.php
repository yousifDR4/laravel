<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;
    protected $fillable=[
    "last_messagae",
    "name",
    "description",
    "owner_id",
    ];
    public function messages(){
        return $this->hasMany(group::class);
    }
    public function last_message(){
        return $this->belongsTo(message::class,'last_message');
    }
    public function owner(){
        return $this->belongsTo(User::class,'owner_id');
    }
    public function users(){
        return $this->belongsToMany(User::class,'group_users');
    }
}
