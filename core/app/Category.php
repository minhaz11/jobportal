<?php

namespace App;

use App\Job;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
