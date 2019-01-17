<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function incrementVisitors(){
        $this->number_of_visitors = $this->number_of_visitors +1 ;
        $this->save();
    }
}
