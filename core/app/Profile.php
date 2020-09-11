<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarder = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
