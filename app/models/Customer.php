<?php

class Customer extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'customers';

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');

	}

	public function accounts()
	{
		return$this->hasMany('Account', 'customer_id', 'id');

	}

}