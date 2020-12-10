<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CLIENTS') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
          <a href="{{route('new_client')}}" class="btn btn-primary" >New Client</a>
          <a href="{{route('new_room')}}" class="btn btn-primary" >New Room</a>
          <table class="table table-striped mt-3" >
              <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
              </thead>
            @foreach($clients As $client)
              <tr>
                <td>{{$client->title}} . {{$client->txt_name}} {{$client->txt_last_name}}</td>
                <td>{{$client->txt_email}}</td>
                <td>
                  <a class="btn btn-primary" href="{{ route('show_client', ['client_id' => $client->id]) }}" >EDIT</a>
                  <a class="btn btn-info" href="{{ route('check_room', ['client_id' => $client->id]) }}" >BOOK A ROOM</a>
                </td>
              </tr>
            @endforeach
        </table>
        </div>
    </div>
</x-app-layout>
