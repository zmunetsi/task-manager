<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Rutorika\Sortable\SortableTrait;

class Task extends Model
{
    
      protected $fillable = [
        'name', 'priority)',
    ];

    protected static $sortableField = 'priority';


       public function user()
    {
        return $this->belongsTo('App\User');
    }

       public function project()
    {
        return $this->belongsTo('App\Project');
    }


}
