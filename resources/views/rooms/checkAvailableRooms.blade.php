<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CLIENTS/BOOKING') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
          <div class="row" >
            <div class="col-md-2" >
              BOOKING FOR:
            </div>
            <div class="col-md-6" >
              <b>{{$client->title}}. {{$client->txt_name}} {{$client->txt_last_name}}</b>
            </div>
            <div class="col-md-4" >

            </div>
          </div>

          <form method="POST" action="" >
            @csrf
            <div class="row mt-4" >
              <div class="col-md-2">FROM:</div>
              <div class="col-md-2"><input type="text" name="txt_dateFrom" class="form-control datepicker" value="{{ $dateFrom}}" autocomplete='off' /></div>
              <div class="col-md-2">TO:</div>
              <div class="col-md-2"><input type="text" name="txt_dateTo" class="form-control datepicker" value="{{ $dateTo }}" autocomplete='off' /></div>
              <div class="col-md-4"><input class="btn btn-primary" type="submit" value="SEARCH" /></div>
            </div>
          </form>

          <table class="table mt-4" >
            <thead>
              <th >Room</th>
              <th >Availability</th>
              <th >Action</th>
            </thead>
            <tbody>
              @unless( empty($dateFrom) || empty($dateTo) )
                @foreach($rooms as $room)
                  <tr>
                    <td>{{$room->name}}</td>
                    <td>Available</td>
                    <td><a class="btn btn-warning" href="{{route('book_room',
                                                            ['client_id' => $client->id,
                                                            'room_id' => $room->id,
                                                            'date_in' => $dateFromBut,
                                                            'date_out' => $dateToBut])}}" >BOOK NOW</a></td>
                  </tr>
                @endforeach
              @endunless
            </tbody>
          </table>
        </div>
    </div>
</x-app-layout>

<script >
  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy'
  });
</script>
