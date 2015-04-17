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
			'carrier' => "required",
			'username' => "required|unique_fields:accounts,".$data['carrier'].",".$data['username'],
			'password' => 'required'
		];
		$messages = array(
					'unique_fields'=>'carrier and username combination already exists.'
		);

		$validator = Validator::make($data,$rules,$messages);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$account = new Account();

		$account->customer_id = $customer;
		$account->carrier = $data['carrier'];
		$account->username = $data['username'];
		$account->password = $data['password'];

		if($account->save()){
			return Redirect::route('customer.accounts.index',['customer'=> $customer])->with('success',"Customer Account Created Successfully");
		}else{
			return Redirect::route('customer.accounts.index',['customer'=> $customer])->with('error',"Something went wrong.Try again");
		}
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
	public function edit($customer,$account)
	{
		return View::make('accounts.edit')
					->with('account',Account::find($account))
					->with('customer_id',$customer)
					->with('title','Edit Account');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /account/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($customer,$account)
	{
		$rules = [
					'password' => 'required',
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$account = Account::find($account);
		$account->password = $data['password'];

		if($account->save()){
			return Redirect::route('customer.accounts.index',['customer'=> $customer])->with('success',"Customer Account Updated Successfully");
		}else{
			return Redirect::route('customer.accounts.index',['customer'=> $customer])->with('error',"Something went wrong.Try again");
		}
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