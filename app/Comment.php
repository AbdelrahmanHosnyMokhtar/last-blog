<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{   public $table="comment" ;
    public function article(){
        return $this->belongsTo('App\Article') ; }
}
