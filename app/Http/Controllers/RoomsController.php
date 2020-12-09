<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Room;

class RoomsController extends Controller
{
    //
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
