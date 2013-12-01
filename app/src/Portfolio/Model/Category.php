<?php

namespace Portfolio\Model;

class Category extends \Illuminate\Database\Eloquent\Model {
	
	public function projects() {
		return $this->hasMany('Portfolio\Model\Project');
	}

}