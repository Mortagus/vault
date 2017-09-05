<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContestQuestion extends Model
{

    public function contest()
    {
        return $this->belongsTo('App\Model\Contest', 'foreign_key');
    }
}
