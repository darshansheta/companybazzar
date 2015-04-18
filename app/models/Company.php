<?php

class Company extends \Eloquent {
	protected $fillable = [];

	public static $rules = array(
			"roc_office_id"				=> "required|integer",
			"company_type_id"			=> "required|integer",
			"incorporation_date"		=> 'required|date_format:"d/m/Y"',
			"last_balance_sheet_date"	=> 'required|date_format:"d/m/Y"',
			"authorized_capital"		=> 'required|integer|min:0',
			"paidup_capital"			=> 'required|integer|min:0',
			"compliance_upto_date"		=> 'date_format:"d/m/Y"',
			"total_loss_amount"			=> 'integer|min:0',
			"number_of_charge"			=> 'required|integer|min:0',
			"sell_price"				=> 'required|integer|min:0',
			"email"						=> "required|email",
			"name"						=> "required",
			);

	public static function validate($input){
		$v = Validator::make($input, static::$rules);
		return $v->fails()
		? $v
		: true;

	}

	public function user(){
		return $this->belongsTo('User');
	}
}