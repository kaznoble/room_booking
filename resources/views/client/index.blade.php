<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CLIENTS') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
          <div class="row" >
            <div class="col-md-12" >
              @unless ( empty(Session::get('message')) )
                <div class="alert alert-primary">{{ Session::get('message') }}</div>
              @endunless
            </div>
          </div>
          <a href="{{route('new_client')}}" class="btn btn-primary" >New Client</a>
          <a href="{{route('new_room')}}" class="btn btn-primary" >New Room</a>
          <table class="table table-striped mt-3" >
              <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Reservations</th>
                <th>Action</th>
              </thead>
            @foreach($clients As $client)
              <tr>
                <td>{{$client->title}} . {{$client->txt_name}} {{$client->txt_last_name}}</td>
                <td>{{$client->txt_email}}</td>
                <td>{{$client->date_in}}
                  @foreach ($client->reservations As $res)
                    <strong>Date In:</strong> {{ $res->date_in }}<br />
                    <strong>Date Out:</strong> {{ $res->date_out }}<br />
                    <form id="frm_note" method="POST" action="{{ route('edit_note', ['res_id' => $res->id]) }}" >
                      @csrf
                      <textarea name="txt_note" class="form-control" >{{ $res->note->note }}</textarea>
                      <button name="butt_note_save" class="btn btn-secondary mt-2" type="submit" >SAVE</button>
                    </form>
                    <form id="form_cancel_res" action="{{ route('cancel_reservation',['res_id' => $res->id]) }}" method="POST" >
                      @csrf
                      <input type="hidden" name="_method" value="DELETE" />
                      <button type="submit" class="text-danger" >[Cancel]</button>
                    </form>
                    <br />
                  @endforeach
                </td>
                <td>
                  <a class="btn btn-primary" href="{{ route('show_client', ['client_id' => $client->id]) }}" >EDIT</a>
                  <a class="btn btn-info" href="{{ route('check_room', ['client_id' => $client->id]) }}" >BOOK A ROOM</a>
                  <form id="form_delete_client" class="mt-3" method="POST" action="{{ route('delete_client', ['client_id' => $client->id]) }}" >
                    @csrf
                    <input type="hidden" name="_method" value="DELETE" />
                    <button class="btn btn-warning" type="submit" >DELETE</button>
                  </form>
                </td>
              </tr>
            @endforeach
        </table>
        </div>
    </div>
</x-app-layout>
