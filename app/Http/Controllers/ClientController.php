<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title As Title;
use App\Models\Client As Client;

class ClientController extends Controller
{
    //
	public function __construct(Title $titles, Client $client)
	{
		$this->titles = $titles->all();
		$this->client = $client;
	}

	public function index()
	{
		$data = [];

		$data['clients'] = $this->client->all();
		return view('client/index', $data);
	}

	public function newClient(Request $request, Client $client)
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

			$client->insert($data);

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
		$data = []; $data['client_id'] = $client_id;
		$data['titles'] = $this->titles;
		$data['modify'] = 1;

		$client_data = $this->client->find($client_id);
		$data['title'] = $client_data->title;
		$data['txt_name'] = $client_data->txt_name;
		$data['txt_last_name'] = $client_data->txt_last_name;
		$data['txt_address'] = $client_data->txt_address;
		$data['txt_post_code'] = $client_data->txt_post_code;
		$data['txt_city'] = $client_data->txt_city;
		$data['txt_county'] = $client_data->txt_county;
		$data['txt_email'] = $client_data->txt_email;

		return view('client/newClient',$data);
	}

	public function modify(Request $request, $client_id, Client $client)
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

			$client_data = $this->client->find($client_id);

			$client_data->title = $request->input('title');
			$client_data->txt_name = $request->input('txt_name');
			$client_data->txt_last_name = $request->input('txt_last_name');
			$client_data->txt_address = $request->input('txt_address');
			$client_data->txt_post_code = $request->input('txt_post_code');
			$client_data->txt_city = $request->input('txt_city');
			$client_data->txt_county = $request->input('txt_county');
			$client_data->txt_email = $request->input('txt_email');

			$client_data->save();

			return redirect('clients');
		}

		$data['titles'] = $this->titles;
		$data['modify'] = 0;
		return view('client/newClient',$data);
	}

	public function delete($client_id)
	{
		$client = $this->client->find($client_id);
		$client->delete();
		return redirect('clients');
	}

}
