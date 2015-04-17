<?php namespace App\Extension\Validation;
use Illuminate\Validation\Validator as IlluminateValidator;
class CustomValidator extends IlluminateValidator {
	public function accounts($attribute, $value, $parameters){
		// Get table name from first parameter
		$table = array_shift($parameters);


		// Build the query
		$query = DB::table($table);

		// Add the field conditions
		foreach ($parameters as $i => $field)
			$query->where($field, $value[$i]);

		// Validation result will be false if any rows match the combination
		return ($query->count() == 0);
	}

}