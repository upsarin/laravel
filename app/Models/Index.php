<?php

namespace URLService\Models;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    public function get(){
		$title = array("title" => "Wellcome to shortlink service");
		return $title;
		
	}
}
