<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'created_at',
    ];

    public $timestamps = false;


    public function favouriteUsers()
    {
        return $this->belongsToMany(User::class, 'user_favourited_webinar', 'webinar_id', 'user_id');
    }
}
