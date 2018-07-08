<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function users()
    {
        return $this->belongsToMany('User' , 'task_user');
        //return $this->belongsToMany(User::class);
    }

}
