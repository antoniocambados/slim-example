<?php

class Category extends \Illuminate\Database\Eloquent\Model {
	
	public function projects() {
		return $this->hasMany('Project');
	}

}