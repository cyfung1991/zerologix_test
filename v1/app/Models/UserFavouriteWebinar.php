<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFavouriteWebinar extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "user_favourited_webinar";
    protected $fillable = ['user_id', 'webinar_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function webinar()
    {
        return $this->belongsTo(Webinar::class, 'webinar_id');
    }

}
