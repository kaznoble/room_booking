<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Room;
use App\Models\Comments;

class RoomsController extends Controller
{
  //
	public function __construct(Room $room)
	{
		$this->room = $room;
	}

	public function index()
	{
		$rooms = new Room();

		$data = [];
		$data['rooms'] = $rooms->all();

		return view('rooms/index', $data);
	}

	public function newRoom(Request $request, Room $rooms) {
		$data = [];

		$data['name'] = $request->input('name');
		$data['floor'] = $request->input('floor');
		$data['description'] = $request->input('description');

		if ( $request->isMethod('POST') )
		{
			$this->validate(
				$request,
				[
					'name' => 'required',
					'floor' => 'required|integer',
					'description' => 'required',
				]
			);

			$rooms->insert($data);
			return redirect('rooms');
		}

		$data['modify'] = 0;
		return view('rooms/new', $data);
	}

	public function modifyRoom(Request $request, $room_id, Room $rooms, Comments $comments) {
		$data = [];

		$data = $this->room->find($room_id);
		$comment_data = $comments->find($room_id);
		$data['comment_id'] = $comment_data['id'];
		$data['comment'] = $comment_data['comment'];

		if ( $request->isMethod('POST') )
		{
			$this->validate(
				$request,
				[
					'name' => 'required',
					'floor' => 'required|integer',
					'description' => 'required',
				]
			);

			$room_data = $this->room->find($room_id);

			$room_data->name = $request->input('name');
			$room_data->floor = $request->input('floor');
			$room_data->description = $request->input('description');

			$room_data->save();

			return redirect('rooms');
		}

		$data['modify'] = 1;
		return view('rooms/new', $data);
	}

	public function checkAvailableRooms($client_id, Request $request)
	{
		$dateFrom = $request->input('txt_dateFrom');
		$dateTo = $request->input('txt_dateTo');
		$client = new Client();
		$room = new Room();

		$data = [];
		$data['dateFrom'] = $dateFrom;
		$data['dateTo'] = $dateTo;
		$data['dateFromBut'] = '';
		if ( !empty($dateFrom) )
			$data['dateFromBut'] = Carbon::createFromFormat('d/m/Y', $dateFrom)->format('Y-m-d');
		$data['dateToBut'] = '';
		if ( !empty($dateTo) )
			$data['dateToBut'] = Carbon::createFromFormat('d/m/Y', $dateTo)->format('Y-m-d');
		$data['rooms'] = $room->getAvailablerooms($data['dateFromBut'], $data['dateToBut']);
		$data['client'] = $client->find($client_id);

		return view('rooms/checkAvailableRooms', $data);
	}

}
