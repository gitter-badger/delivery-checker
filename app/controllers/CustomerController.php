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
					'name'           => 'required',
					'address_line_1' => 'required',
					'email'          => 'required|email|unique:users',
					'password'       => 'required',
					'city'           => 'required',
					'state'          => 'required',
					'zip'            => 'required',
					'country'        => 'required',
					'telephone'      => 'required',
					'fee_percentage' => 'required|numeric|between:50,100',

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
			$customer->title = $data['title'];
			$customer->attn_name = $data['attn_name'];
			$customer->address_line_1 = $data['address_line_1'];
			$customer->address_line_2 = $data['address_line_2'];
			$customer->city = $data['city'];
			$customer->state = $data['state'];
			$customer->zip = $data['zip'];
			$customer->country = $data['country'];
			$customer->telephone = $data['telephone'];
			$customer->fax = $data['fax'];
			$customer->website = $data['website'];
			$customer->fee_percentage = $data['fee_percentage'];
			$customer->fee_flat = $data['fee_flat'];
			$customer->sales_id = $data['sales_id'];
			$customer->sales_percentage = $data['sales_percentage'];
			$customer->affiliate_id = $data['affiliate_id'];

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
		$customer = Customer::find($id);
		return View::make('customers.edit')
					->with('customer',$customer)
					->with('accounts',$accounts)
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
					'name'           => 'required',
					'address_line_1' => 'required',
					'city'           => 'required',
					'state'          => 'required',
					'zip'            => 'required',
					'country'        => 'required',
					'telephone'      => 'required',
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$customer = Customer::find($id);
		$customer->company_name = $data['company_name'];
		$customer->name = $data['name'];
		$customer->title = $data['title'];
		$customer->address_line_1 = $data['address_line_1'];
		$customer->address_line_2 = $data['address_line_2'];
		$customer->city = $data['city'];
		$customer->state = $data['state'];
		$customer->zip = $data['zip'];
		$customer->country = $data['country'];
		$customer->telephone = $data['telephone'];
		$customer->fax = $data['fax'];
		$customer->website = $data['website'];

		if($customer->save()){
			return Redirect::back()->with('success',"Customer Basic Information Updated Successfully");
		}else{
			return Redirect::back()->with('error',"Something went wrong.Try again");
		}
	}


	public function updateBilling($id)
	{
		$rules = [

					'fee_percentage' => 'required|numeric|between:50,100',
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$customer = Customer::find($id);
		$customer->attn_name = $data['attn_name'];
		$customer->fee_percentage = $data['fee_percentage'];
		$customer->fee_flat = $data['fee_flat'];

		if($customer->save()){
			return Redirect::back()->with('success',"Customer Billing Information Updated Successfully");
		}else{
			return Redirect::back()->with('error',"Something went wrong.Try again");
		}
	}

	public function updateSales($id)
	{
		$rules = [


		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$customer = Customer::find($id);
		$customer->sales_id = $data['sales_id'];
		$customer->sales_percentage = $data['sales_percentage'];
		$customer->affiliate_id = $data['affiliate_id'];

		if($customer->save()){
			return Redirect::back()->with('success',"Customer Sales Information Updated Successfully");
		}else{
			return Redirect::back()->with('error',"Something went wrong.Try again");
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