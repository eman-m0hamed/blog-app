<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Post extends Model
{
    //

    use HasFactory;
protected $table = 'posts';
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'attachment',
    ];


    function user(){
        // return $this->hasOne(User::class);
        return $this->belongsTo(User::class);
    }

}
