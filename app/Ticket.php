<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{	
	protected $table = 'tickets';

	protected $fillable = ['slug', 'title', 'content', 'user_id', 'priority_id', 'status_id'];

    
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

    public function status()
    {
      return $this->belongsTo(Status::class);
    }

    public function priority()
    {
      return $this->belongsTo(Priority::class);
    }

    public function getDate()
    {
      return $this->created_at->format('d-m-Y, H:i:s');
    }

    public function isClosed($id){

      return Status::find($id)->where('closes', '=', 'D');
    }

  	protected $dateFormat = 'Y-m-d H:i:s';

    public $timestamps = true;
}
