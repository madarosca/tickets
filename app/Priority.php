<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = 'priorities';
    
    protected $fillable = ['color', 'name'];
    
    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'id');
    }

    public function getName()
    {
      return $this->name;
    }

	protected $dateFormat = 'Y-m-d H:i:s';

    public $timestamps = true;
}
