<?php

class RequirementsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$searchFields =  Input::get();
		$query = new  CompanyRequirement();
		//roc_office_id
		if(isset($searchFields['roc_office_id']) && RocOffice::find($searchFields['roc_office_id'])){
			$query = $query->where('roc_office_id',$searchFields['roc_office_id']);
		}
		//company_type_id
		if(isset($searchFields['company_type_id']) && CompanyType::find($searchFields['company_type_id'])){
			$query = $query->where('company_type_id',$searchFields['company_type_id']);
		}
		//incorporation_date
		if(isset($searchFields['incorporation_date']) && Validator::make(['date' => $searchFields['incorporation_date']], ['date' => 'date_format:"d/m/Y"|required'])->passes() ){
			$query = $query->where('incorporation_date_from','<=',DateTime::createFromFormat('d/m/Y', $searchFields['incorporation_date'])->format('Y-m-d 00:00:00'));
			$query = $query->where('incorporation_date_to','>=',DateTime::createFromFormat('d/m/Y', $searchFields['incorporation_date'])->format('Y-m-d 00:00:00'));
		}
		//last_balance_sheet_date
		if(isset($searchFields['last_balance_sheet_date']) && Validator::make(['date' => $searchFields['last_balance_sheet_date']], ['date' => 'date_format:"d/m/Y"|required'])->passes() ){
			$query = $query->where('last_balance_sheet_date_from','<=',DateTime::createFromFormat('d/m/Y', $searchFields['last_balance_sheet_date'])->format('Y-m-d 00:00:00'));
			$query = $query->where('last_balance_sheet_date_to','>=',DateTime::createFromFormat('d/m/Y', $searchFields['last_balance_sheet_date'])->format('Y-m-d 00:00:00'));
		}
		//authorized_capital
		if(isset($searchFields['authorized_capital']) && Validator::make(['authorized_capital' => $searchFields['authorized_capital']], ['authorized_capital' => 'required|integer'])->passes() ){
			$query = $query->where('authorized_capital_from','<=',$searchFields['authorized_capital']);
			$query = $query->where('authorized_capital_to','>=',$searchFields['authorized_capital']);
		}
		//paidup_capital
		if(isset($searchFields['paidup_capital']) && Validator::make(['paidup_capital' => $searchFields['paidup_capital']], ['paidup_capital' => 'required|integer'])->passes() ){
			$query = $query->where('paidup_capital_from','<=',$searchFields['paidup_capital']);
			$query = $query->where('paidup_capital_to','>=',$searchFields['paidup_capital']);
		}
		//sell_price
		if(isset($searchFields['sell_price']) && Validator::make(['sell_price' => $searchFields['sell_price']], ['sell_price' => 'required|integer'])->passes() ){
			$query = $query->where('sell_price_from','<=',$searchFields['sell_price']);
			$query = $query->where('sell_price_to','>=',$searchFields['sell_price']);
		}
		
		$company_requirements = $query->with('user')->get();
		$queries = DB::getQueryLog();
		$last_query = end($queries);
		//return [Input::get(),$query->get(),$query->toSql()];
		View::share('hidePageHeadContainer', true);
		View::share('page_title', "Search Requirements");
		return View::make("requirements.index",array('roc_officess'=>RocOffice::get()->toArray(),'company_types' => CompanyType::get()->toArray(),'company_requirements' => $company_requirements,'last_query' => $last_query,'searchFields' => $searchFields));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		View::share('hidePageHeadContainer', true);
		View::share('title', "Fill you Criteria");
		View::share('page_title', "Submit Requirements");
		return View::make("requirements.create",array('roc_officess'=>RocOffice::get()->toArray(),'company_types' => CompanyType::get()->toArray()));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$response = array();
		$only = Input::only(
							"roc_office_id"					,
							"company_type_id"				,
							"incorporation_date_from"		,
							"incorporation_date_to"			,
							"last_balance_sheet_date_from"	,
							"last_balance_sheet_date_to"	,
							"authorized_capital_from"		,
							"authorized_capital_to"			,
							"paidup_capital_from"			,
							"paidup_capital_to"				,
							"sell_price_from"				,
							"sell_price_to"					,
							"email"							,
							"name"							
							);
		if(CompanyRequirement::validate($only) === true){
			
			$isValid = true;

			if($isValid){
				//save company field
				$user = User::where('email',Input::get('email'))->first();
				if(!$user){
					$user = new User();
					$user->email = Input::get('email');
					$user->first_name = Input::get('name');
					$user->save();
				}
				$new_company_requirement = new CompanyRequirement();
				$new_company_requirement->roc_office_id				= Input::get('roc_office_id');
				$new_company_requirement->company_type_id			= Input::get('company_type_id');
				$new_company_requirement->incorporation_date_from 		= DateTime::createFromFormat('d/m/Y', Input::get('incorporation_date_from'))->format('Y-m-d 00:00:00');//Input::get('last_balance_sheet_date');
				$new_company_requirement->incorporation_date_to 		= DateTime::createFromFormat('d/m/Y', Input::get('incorporation_date_to'))->format('Y-m-d 23:59:59');//Input::get('last_balance_sheet_date');
				$new_company_requirement->last_balance_sheet_date_from 	= DateTime::createFromFormat('d/m/Y', Input::get('last_balance_sheet_date_from'))->format('Y-m-d 00:00:00');//Input::get('last_balance_sheet_date');
				$new_company_requirement->last_balance_sheet_date_to 	= DateTime::createFromFormat('d/m/Y', Input::get('last_balance_sheet_date_to'))->format('Y-m-d 23:59:59');//Input::get('last_balance_sheet_date');
				$new_company_requirement->authorized_capital_from		= Input::get('authorized_capital_from');
				$new_company_requirement->authorized_capital_to		= Input::get('authorized_capital_to');
				$new_company_requirement->paidup_capital_from			= Input::get('paidup_capital_from');
				$new_company_requirement->paidup_capital_to			= Input::get('paidup_capital_to');
				$new_company_requirement->sell_price_from 				= Input::get('sell_price_from');
				$new_company_requirement->sell_price_to 				= Input::get('sell_price_to');
				$new_company_requirement->user_id 					= $user->id;
			
				//$company_id = 0;

				if($new_company_requirement->save()){//if(true){//
					$company_id = $new_company_requirement->id;

					

					$response['new_company_requirement'] = $new_company_requirement->toArray();
					$response['success'] = true;
					//$response['compliances'] = $compliances;
					//$response['balance_sheets'] = $balance_sheets;
					//$response['company_losses'] = $company_losses;
					$response['message'] = 'Your data saved successfully';
					return $response;

				}else{
					$response['success'] = false;
					$response['error'] = 'Error while saving requirement';
					return Response::json($response,self::$errorStatusCode);
				}
				
			}else{
				$response['success'] = false;
				$response['error'] = 'Invalid data supplied.';
				return Response::json($response,self::$errorStatusCode);
			}

		}else{
			$v = CompanyRequirement::validate($only);
			$response['success'] = false;
			$response['error'] = $v->messages()->toArray();
			return Response::json($response,self::$errorStatusCode);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
