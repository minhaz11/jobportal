<?php

namespace App;

use App\Employer;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class,'employer_id');
    }
}
