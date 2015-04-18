<?php

class CompanyRequirement extends \Eloquent {
	protected $fillable = [];

	public static $rules = array(
			"roc_office_id"					=> "required|integer",
			"company_type_id"				=> "required|integer",
			"incorporation_date_from"		=> 'required|date_format:"d/m/Y"',
			"incorporation_date_to"			=> 'required|date_format:"d/m/Y"',
			"last_balance_sheet_date_from"	=> 'required|date_format:"d/m/Y"',
			"last_balance_sheet_date_to"	=> 'required|date_format:"d/m/Y"',
			"authorized_capital_from"		=> 'required|integer|min:0',
			"authorized_capital_to"			=> 'required|integer|min:0',
			"paidup_capital_from"			=> 'required|integer|min:0',
			"paidup_capital_to"				=> 'required|integer|min:0',
			"sell_price_from"				=> 'required|integer|min:0',
			"sell_price_to"					=> 'required|integer|min:0',
			"email"							=> "required|email",
			"name"							=> "required",
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