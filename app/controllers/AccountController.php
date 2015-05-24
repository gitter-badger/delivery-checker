<?php

class AccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /allaccount
	 *
	 * @return Response
	 */
	public function index()
	{
		$accounts = Account::all();
		return View::make('accounts.all.index')
					->with('accounts',$accounts)
					->with('title',"Accounts");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /allaccount/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /allaccount
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /allaccount/{id}
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
	 * GET /allaccount/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($account)
	{
		return View::make('accounts.all.edit')
					->with('account',Account::find($account))
					->with('title','Edit Carrier Account');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /allaccount/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($account)
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
			return Redirect::route('accounts.edit',['account'=> $account->id])->with('success',"Carrier Account Updated Successfully");
		}else{
			return Redirect::route('accounts.edit',['account'=> $account->id])->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /allaccount/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}