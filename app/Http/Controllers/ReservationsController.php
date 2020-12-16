<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Client As Client;
use App\Models\Room As Room;
use App\Models\Reservation As Reservation;

class ReservationsController extends Controller
{
    //
	public function __construct()
	{
		$this->reservation = new Reservation();
	}

	public function bookRoom($client_id, $room_id, $date_in, $date_out)
	{
		$reservation = new Reservation();
		$client_instance = new Client();
		$room_instance = new Room();

		$client = $client_instance->find($client_id);
		$room = $room_instance->find($room_id);
		$reservation->date_in = $date_in;
		$reservation->date_out = $date_out;

		$reservation->room()->associate($room);
		$reservation->client()->associate($client);
		if ( $room_instance->isRoomBooked( $room_id, $date_in, $date_out ) )
		{
			abort(405, 'Try to book an already booked room');
		}
		$reservation->save();

		return redirect()->route('clients');;
		//return view('reservations/bookRome');
	}

	public function cancelReservation($res_id)
	{
		$reservation = $this->reservation->find($res_id);
		$reservation->delete();
		return redirect('clients')->with('message','Cancel has been successfully!');
	}
}
