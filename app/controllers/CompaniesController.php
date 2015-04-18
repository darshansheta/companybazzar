<?php

class CompaniesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$searchFields =  Input::get();
		$query =new  Company();
		//roc_office_id
		if(isset($searchFields['roc_office_id']) && RocOffice::find($searchFields['roc_office_id'])){
			$query = $query->where('roc_office_id',$searchFields['roc_office_id']);
		}
		//company_type_id
		if(isset($searchFields['company_type_id']) && CompanyType::find($searchFields['company_type_id'])){
			$query = $query->where('company_type_id',$searchFields['company_type_id']);
		}
		//incorporation_date_from
		if(isset($searchFields['incorporation_date_from']) && Validator::make(['date' => $searchFields['incorporation_date_from']], ['date' => 'date_format:"d/m/Y"|required'])->passes() ){
			$query = $query->where('incorporation_date','>=',DateTime::createFromFormat('d/m/Y', $searchFields['incorporation_date_from'])->format('Y-m-d 00:00:00'));
		}
		//incorporation_date_to
		if(isset($searchFields['incorporation_date_to']) && Validator::make(['date' => $searchFields['incorporation_date_to']], ['date' => 'date_format:"d/m/Y"|required'])->passes() ){
			$query = $query->where('incorporation_date','<=',DateTime::createFromFormat('d/m/Y', $searchFields['incorporation_date_to'])->format('Y-m-d 23:59:59'));
		}
		//last_balance_sheet_date_from
		if(isset($searchFields['last_balance_sheet_date_from']) && Validator::make(['date' => $searchFields['last_balance_sheet_date_from']], ['date' => 'date_format:"d/m/Y"|required'])->passes() ){
			$query = $query->where('last_balance_sheet_date','>=',DateTime::createFromFormat('d/m/Y', $searchFields['last_balance_sheet_date_from'])->format('Y-m-d 00:00:00'));
		}
		//last_balance_sheet_date_to
		if(isset($searchFields['last_balance_sheet_date_to']) && Validator::make(['date' => $searchFields['last_balance_sheet_date_to']], ['date' => 'date_format:"d/m/Y"|required'])->passes() ){
			$query = $query->where('last_balance_sheet_date','<=',DateTime::createFromFormat('d/m/Y', $searchFields['last_balance_sheet_date_to'])->format('Y-m-d 23:59:59'));
		}
		//authorized_capital_from
		if(isset($searchFields['authorized_capital_from']) && Validator::make(['authorized_capital' => $searchFields['authorized_capital_from']], ['authorized_capital' => 'required|integer'])->passes() ){
			$query = $query->where('authorized_capital','>=',$searchFields['authorized_capital_from']);
		}
		//authorized_capital_to
		if(isset($searchFields['authorized_capital_to']) && Validator::make(['authorized_capital' => $searchFields['authorized_capital_to']], ['authorized_capital' => 'integer|required'])->passes() ){
			$query = $query->where('authorized_capital','<=',$searchFields['authorized_capital_to']);
		}
		//paidup_capital_from
		if(isset($searchFields['paidup_capital_from']) && Validator::make(['paidup_capital' => $searchFields['paidup_capital_from']], ['paidup_capital' => 'required|integer'])->passes() ){
			$query = $query->where('paidup_capital','>=',$searchFields['paidup_capital_from']);
		}
		//paidup_capital_to
		if(isset($searchFields['paidup_capital_to']) && Validator::make(['paidup_capital' => $searchFields['paidup_capital_to']], ['paidup_capital' => 'integer|required'])->passes() ){
			$query = $query->where('paidup_capital','<=',$searchFields['paidup_capital_to']);
		}
		//sell_price_from
		if(isset($searchFields['sell_price_from']) && Validator::make(['sell_price' => $searchFields['sell_price_from']], ['sell_price' => 'required|integer'])->passes() ){
			$query = $query->where('sell_price','>=',$searchFields['sell_price_from']);
		}
		//sell_price_to
		if(isset($searchFields['sell_price_to']) && Validator::make(['sell_price' => $searchFields['sell_price_to']], ['sell_price' => 'integer|required'])->passes() ){
			$query = $query->where('sell_price','<=',$searchFields['sell_price_to']);
		}

		if(isset($searchFields['in_lost'])){
			if($searchFields['in_lost'] == "1")
				$query = $query->where('in_lost',1);
			if($searchFields['in_lost'] == "0")
				$query = $query->where('in_lost',0);
		}

		$companies = $query->with('user')->get();
		$queries = DB::getQueryLog();
		$last_query = end($queries);
		//return [Input::get(),$query->get(),$query->toSql()];
		View::share('hidePageHeadContainer', true);
		View::share('page_title', "Submit Companies");
		return View::make("companies.index",array('roc_officess'=>RocOffice::get()->toArray(),'company_types' => CompanyType::get()->toArray(),'companies' => $companies,'last_query' => $last_query,'searchFields' => $searchFields));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//$hidePageHeadContainer
		View::share('hidePageHeadContainer', true);
		View::share('title', "Fill you Criteria");
		View::share('page_title', "Submit Companies");
		return View::make("companies.create",array('roc_officess'=>RocOffice::get()->toArray(),'company_types' => CompanyType::get()->toArray()));
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
							"roc_office_id"				,
							"company_type_id"			,
							"incorporation_date"		,
							"last_balance_sheet_date"	,
							"authorized_capital"		,
							"paidup_capital"			,
							"compliance_upto_date"		,
							"total_loss_amount"			,
							"number_of_charge"			,
							"sell_price"				,
							"email"						,
							"name"						
							);
		if(Company::validate($only) === true){
			//validate compliance
			$compliance_label	= Input::get('compliance_label');
			$compliance_date	= Input::get('compliance_date');
			$is_compliance		= Input::get('is_compliance');

			$isValid			= true;
			$compliances		= array();
			if(!empty($compliance_label)){
				foreach ($compliance_label as $key => $cl) {
					//if( trim($cl) == '' || ( isset($is_compliance[$key])  ) )
					if(!empty($cl)){
						if(!isset($is_compliance[$key])){
							//$ic = isset($is_compliance[$key]) ? 1 : 0 ;
							$compliances[]				= array('compliance_label' => $cl,'is_compliance' => 0,'compliance_date'=>null);
						}else{
							if(Validator::make(['date' => $compliance_date[$key]], ['date' => 'date_format:"d/m/Y"'])->passes()){
								$cd						= DateTime::createFromFormat('d/m/Y', $compliance_date[$key])->format('Y-m-d 00:00:00');
								$compliances[]			= array('compliance_label' => $cl,'is_compliance' => 1,'compliance_date'=>$cd);
							}else{
								$response['debug'][] 	= $compliance_date[$key];
								//$response['debug'][] 	= 'compliance_date is not valid';
								//$response['debug'][] 	= Validator::make(['date' => $compliance_date[$key]], ['date' => 'date_format:"m/d/Y"'])->messages()->toArray();
								$isValid 				= false;
								break;
							}
						}
					}else{
						$response['debug'][] = 'compliance_label is not valid';
						$isValid = false;
						break;
					}
				}
			}

			//validte balance_sheets data
			$liability			= Input::get('liability');
			$liability_amount	= Input::get('liability_amount');
			$asset				= Input::get('asset');
			$asset_amount		= Input::get('asset_amount');
			$balance_sheets		= array();
			if(!empty($liability)){
				foreach ($liability as $key => $lb) {
					$balance_sheet			= array('liability'=>$lb,			'liability_amount'=>$liability_amount[$key],	'asset'=>$asset[$key],	'asset_amount'=>$asset_amount[$key]);
					$balance_sheet_rules	= array('liability'=>'required',	'liability_amount'=>'required|integer|min:0',	'asset'=>'required',	'asset_amount'=>'required|integer|min:0');
					if(Validator::make($balance_sheet, $balance_sheet_rules)->passes()){
						$balance_sheets[] = $balance_sheet;
					}else{
						$response['debug'][] = 'balance_sheet data is not valid';
						$isValid = false;
						break;
					}
				}
			}

			//validate loss data
			$company_losses = array();
			if(Input::has('in_lost')){
				$year_end		= Input::get('year_end');
				$loss_amount	= Input::get('loss_amount');
				if(!empty($year_end)){
					foreach ($year_end as $key => $year) {
						$company_loss		= array('year'=>$year,		'amount'=>$loss_amount[$key]);
						$company_loss_rules = array('year'=>'required', 'amount'=>'required|integer|min:0');
						if(Validator::make($company_loss, $company_loss_rules)->passes()){
							$company_losses[] = $company_loss;
						}else{
							$response['debug'][] = 'company_losses data is not valid';
							$isValid = false;
							break;
						}
					}
				}
			}

			if($isValid){
				//save company field
				$user = User::where('email',Input::get('email'))->first();
				if(!$user){
					$user = new User();
					$user->email = Input::get('email');
					$user->first_name = Input::get('name');
					$user->save();
				}
				$new_company = new Company();
				$new_company->roc_office_id				= Input::get('roc_office_id');
				$new_company->company_type_id			= Input::get('company_type_id');
				$new_company->incorporation_date 		= DateTime::createFromFormat('d/m/Y', Input::get('incorporation_date'))->format('Y-m-d 00:00:00');//Input::get('last_balance_sheet_date');
				$new_company->last_balance_sheet_date 	= DateTime::createFromFormat('d/m/Y', Input::get('last_balance_sheet_date'))->format('Y-m-d 00:00:00');//Input::get('last_balance_sheet_date');
				$new_company->authorized_capital		= Input::get('authorized_capital');
				$new_company->paidup_capital			= Input::get('paidup_capital');
				$new_company->compliance_upto_date		= (Input::has('compliance_upto_date') && Input::get('compliance_upto_date') != '')? DateTime::createFromFormat('d/m/Y', Input::get('compliance_upto_date'))->format('Y-m-d 00:00:00'):'0000-00-00 00:00:00';
				$new_company->in_lost		 			= (Input::has('in_lost')) ? 1 : 0 ;
				$new_company->loss_amount		 			= (Input::has('in_lost')) ? Input::get('total_loss_amount') : 0 ;
				$new_company->number_of_charge 			= Input::get('number_of_charge');
				$new_company->sell_price 				= Input::get('sell_price');
				$new_company->user_id 					= $user->id;
			
				//$company_id = 0;

				if($new_company->save()){//if(true){//
					$company_id = $new_company->id;

					for ($i=0; $i < count($compliances); $i++) { 
						$compliances[$i]['company_id'] = $company_id;
						$compliances[$i]['created_at'] = date('Y-m-d H:i:s');
					}
					for ($i=0; $i < count($balance_sheets); $i++) { 
						$balance_sheets[$i]['company_id'] = $company_id;
						$balance_sheets[$i]['created_at'] = date('Y-m-d H:i:s');
					}
					for ($i=0; $i < count($company_losses); $i++) { 
						$company_losses[$i]['company_id'] = $company_id;
						$company_losses[$i]['created_at'] = date('Y-m-d H:i:s');
					}

					$response['debug'][] = 'before save relation data';

					if(Input::has('compliance_label')){
						Compliance::insert($compliances);
						$response['debug'][] = 'compliance_label';
					}
					if(Input::has('liability')){
						BalanceSheet::insert($balance_sheets);
						$response['debug'][] = 'balance_sheets';
					}
					if(Input::has('in_lost') && Input::has('year_end')){
						CompanyLoss::insert($company_losses);
						$response['debug'][] = 'company_losses';
					}

					$response['debug'][] = 'after save relation after';

					$response['new_company'] = $new_company->toArray();
					$response['success'] = true;
					//$response['compliances'] = $compliances;
					//$response['balance_sheets'] = $balance_sheets;
					//$response['company_losses'] = $company_losses;
					$response['message'] = 'Your data saved successfully';
					return $response;

				}else{
					$response['success'] = false;
					$response['error'] = 'Error while saving company';
					return Response::json($response,self::$errorStatusCode);
				}
				
			}else{
				$response['success'] = false;
				$response['error'] = 'Invalid data supplied.';
				return Response::json($response,self::$errorStatusCode);
			}

		}else{
			$v = Company::validate($only);
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
