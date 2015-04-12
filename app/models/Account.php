<?php

class Account extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'accounts';

	public function customer()
	{
		return $this->belongsTo('Customer', 'customer_id', 'id');

	}
}