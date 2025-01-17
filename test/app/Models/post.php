<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
       
    use HasFactory;
    protected $fillable =[
        "title" ,
        "body" ,
        'user_id',
    ];
    public $timestamps = true;


    /**
     * Quan hệ mỗi bài đăng thuộc về một người dùng.
     */
    public function user()
    {
        return $this->belongsTo(User::class);  // Quan hệ bài đăng thuộc về một người dùng
    }
}