<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function titleCapital(){
        return strtoupper($this->title);
    }

}
