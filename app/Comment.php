<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    
    protected $fillable = ['content', 'post_id', 'status', 'user_id'];


    public function tickets()
    {
        return $this->belongsTo('App\Ticket');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }

    public function getDate()
    {
        return $this->updated_at->format('d-m-Y, H:i:s');
    }

    public function updated_ticket()
    {
        return $this->belongsTo('App\Ticket', 'updated_at');
    }
}
