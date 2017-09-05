<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{

    public function questions()
    {
        return $this->hasMany('App\Models\ContestQuestion', 'contest_id');
    }

    public function getIsClosedAttribute()
    {
        $this->attributes['is_closed'] = (is_null($this->attributes['closed_at']) ? false : true);
    }
}
