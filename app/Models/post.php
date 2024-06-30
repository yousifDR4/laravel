<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $casts=[
        "body"=>"array"
    ];
    public function getTitleUpperCaseAttribute()
    {
        return strtoupper($this->title);
    }
public function comment(){
    return $this->hasMany(comment::class,"post_id");
}
public function user(){
    return $this->belongsToMany(User::class,"post_user","post_id","user_id");
}
}