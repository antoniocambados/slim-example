<?php

class Project extends \Illuminate\Database\Eloquent\Model {
	
	public function category() {
		return $this->belongsTo('Category');
	}

}