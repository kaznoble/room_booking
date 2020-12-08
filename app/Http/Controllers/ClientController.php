<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title As Title;

class ClientController extends Controller
{
    //
	public function __construct(Title $titles)
	{
		$this->titles = $titles->all();
	}

	public function di()
	{
		dd($this->titles);
	}

	public function index()
	{
		$data = [];
		$obj = new \stdClass;
		$obj->id = 1;
		$obj->title = 'mr';
		$obj->name = 'john';
		$obj->last_name = 'doe';
		$obj->email = 'john@domain.com';
		$data['clients'][] = $obj;

		$obj = new \stdClass;
		$obj->id = 2;
		$obj->title = 'ms';
		$obj->name = 'jane';
		$obj->last_name = 'doe';
		$obj->email = 'jane@domain.com';
		$data['clients'][] = $obj;
		return view('client/index', $data);
	}

	public function newClient(Request $request)
	{
		$data = [];

		$data['title'] = $request->input('title');
		$data['txt_name'] = $request->input('txt_name');
		$data['txt_last_name'] = $request->input('txt_last_name');
		$data['txt_address'] = $request->input('txt_address');
		$data['txt_post_code'] = $request->input('txt_post_code');
		$data['txt_city'] = $request->input('txt_city');
		$data['txt_county'] = $request->input('txt_county');
		$data['txt_email'] = $request->input('txt_email');

		if ($request->isMethod('post'))
		{
			//dd($data);
			$this->validate(
				$request,
				[
					'title' => 'required',
					'txt_name' => 'required',
					'txt_last_name' => 'required',
					'txt_address' => 'required',
					'txt_post_code' => 'required',
					'txt_city' => 'required',
					'txt_county' => 'required',
					'txt_email' => 'required',
				]
			);
			return redirect('clients');
		}

		$data['titles'] = $this->titles;
		$data['modify'] = 0;
		return view('client/newClient',$data);
	}

	public function create()
	{
		return view('client/create');
	}

	public function show($client_id)
	{
		$data = [];
		$data['titles'] = $this->titles;
		$data['modify'] = 1;
		return view('client/newClient',$data);
	}

	public function modify($client_id)
	{
		$data = [];
		$data['titles'] = $this->titles;
		$data['modify'] = 1;
		return view('client/newClient', $data);
	}
}
