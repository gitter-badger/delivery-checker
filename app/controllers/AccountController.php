<?php

class AccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /account
	 *
	 * @return Response
	 */
	public function index($customer)
	{
		$accounts = Account::with('customer.user')->where('customer_id',$customer)->get();
		return View::make('accounts.index')
					->with('accounts',$accounts)
					->with('customer_id',$customer)
					->with('title',"Accounts");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /account/create
	 *
	 * @return Response
	 */
	public function create($customer)
	{
		return View::make('accounts.create')
					->with('customer_id',$customer)
					->with('title','Create Account');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /account
	 *
	 * @return Response
	 */
	public function store($customer)
	{
		$data = Input::all();

		$rules =[
			'username' => "unique_fields:accounts,".$data['carrier'].",".$data['username']
		];
		$messages = array(
					'unique_fields'=>'carrier and username combination must be unique.'
		);

		$validator = Validator::make($data,$rules,$messages);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		return Input::all();
	}

	/**
	 * Display the specified resource.
	 * GET /account/{id}
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
	 * GET /account/{id}/edit
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
	 * PUT /account/{id}
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
	 * DELETE /account/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}