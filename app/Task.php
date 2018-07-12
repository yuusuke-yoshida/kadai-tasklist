<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['content', 'user_id','status'];

    public function users()
    {
        return $this->belongsTo('App\Users');
       
    }

}
