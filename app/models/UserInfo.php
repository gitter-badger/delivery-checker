<?php

class UserInfo extends \Eloquent {
	protected $table = 'user_stat';
	protected $guarded = ['id'];

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

}