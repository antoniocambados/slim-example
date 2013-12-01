<?php

namespace Portfolio\Model;

class Project extends \Illuminate\Database\Eloquent\Model {
	
	public function category() {
		return $this->belongsTo('Portfolio\Model\Category');
	}

}