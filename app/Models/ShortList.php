<?php

namespace URLService\Models;

use Illuminate\Database\Eloquent\Model;

class ShortList extends Model
{
    public function get(){
		$title = array("title" => "Wellcome to shortlink service");
		return $title;
		
	}
}
