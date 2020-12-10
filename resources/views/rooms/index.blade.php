<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ROOMS') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
          <div class="row" >
            <div class="col-md-4">
              <a href="{{route('new_room')}}" class="btn btn-primary" />NEW ROOM</a>
            </div>
          </div>
          <table class="table mt-4 table-striped" >
            <thead>
              <th >Name</th>
              <th >Floor</th>
              <th >Description</th>
              <th >Action</th>
            </thead>
            <tbody>
              @if ( !$rooms->isEmpty() )
                @foreach ( $rooms as $room )
                  <tr>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->floor }}</td>
                    <td>{{ $room->description }}</td>
                    <td><a class="btn btn-secondary"  href="{{ route('modify_room', ['room_id' => $room->id]) }}" >EDIT</a></td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td><span class="alert alert-warning">Empty</span></td>
                  <td><span class="alert alert-warning">Empty</span></td>
                  <td><span class="alert alert-warning">Empty</span></td>
                  <td><a class="btn btn-primary" disabled="disabled" >NEW ROOM</a></td>
                </tr>
              @endif
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
