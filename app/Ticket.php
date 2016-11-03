<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{	
	protected $table = 'tickets';
	protected $fillable = ['id', 'slug', 'title', 'content', 'user_id'];
    
    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getTitle()
    {
      return $this->title;
    }

    public function getStatus()
    {
      return $this->status;
    }

  	protected $dateFormat = 'Y-m-d H:i:s';
    public $timestamps = true;
}
