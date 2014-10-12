<?php

class State extends Eloquent{

	public function users(){
		return $this->hasMany('User');
	}
}