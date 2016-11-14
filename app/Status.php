<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    
    protected $fillable = ['closes', 'name'];
    
    public function hasTickets()
    {
        return $this->hasMany(Ticket::class);
    }

	protected $dateFormat = 'Y-m-d H:i:s';

    public $timestamps = true;
}
