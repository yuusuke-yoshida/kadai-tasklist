<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function users()
    {
        return $this->belongsTo('User' , 'task_user');
       
    }

}
// ('User' , 'task_user'); => return $this->belongsTo(User::class);
