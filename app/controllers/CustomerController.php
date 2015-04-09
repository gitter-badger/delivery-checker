<?php

class CustomerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /customers
	 *
	 * @return Response
	 */
	public function index()
	{
		//return Customer::with('user')->get();
		return View::make('customers.index')
					->with('customers',Customer::with('user')->get())
					->with('title',"Customers");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /customers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('customers.create')
					->with('title','Create Customer');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /customers
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
					'company_name'          => 'required',
					'email'                 =>	'required|email|unique:users',
					'password'              =>	'required'

		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$user = new User();

		$user->email = $data['email'];
		$user->password = Hash::make($data['password']);

		if($user->save()){
			$customer = new Customer();
			$customer->user_id = $user->id;
			$customer->company_name = $data['company_name'];
			$customer->name = $data['name'];
			if($customer->save()){
				return Redirect::route('customer.index')->with('success',"Customer Created Successfully");
			}else{
				return Redirect::route('customer.index')->with('error',"Something went wrong.Try again");
			}

		}else{
			return Redirect::route('customer.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Display the specified resource.
	 * GET /customers/{id}
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
	 * GET /customers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('customers.edit')
					->with('customer',Customer::find($id))
					->with('title','Edit Customer');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /customers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
					'company_name'          => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$customer = Customer::find($id);
		$customer->company_name = $data['company_name'];
		$customer->name = $data['name'];

		if($customer->save()){
			return Redirect::route('customer.index')->with('success',"Customer Updated Successfully");
		}else{
			return Redirect::route('customer.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /customers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$customer =Customer::find($id);
		if(User::destroy($customer->user_id)){
			return Redirect::route('customer.index')->with('success',"Customer deleted Successfully.");
		}else{
			return Redirect::route('customer.index')->with('error',"Something went wrong.Try again");
		}
	}

}