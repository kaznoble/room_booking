<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ROOMS') }}
        </h2>
    </x-slot>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="container" >
          <h4>{{ $modify == 1 ? 'Modify Room' : 'New Room' }}</h4>
          <form name="frm_room" method="POST" >
            <div class="row align-items-end" >
              @csrf
              <div class="col-md-4">
                <label>Room Name:</label> <small class="error">{{ $errors->first('name') }}</small>
                <input type="text" name="name" class="form-control" value="{{old('name') ? old('name') : $name}}" />
              </div>
              <div class="col-md-4">
                <label>Floor:</label> <small class="error">{{ $errors->first('floor') }}</small>
                <input type="text" name="floor" class="form-control" value="{{old('floor') ? old('floor') : $floor}}"/>
              </div>
            </div>
            <div class="row align-items-end mt-4" >
              <div class="col-md-6" >
                <label>Description:</label> <small class="error">{{ $errors->first('description') }}</small>
                <textarea name="description" class="form-control" >{{ old('description') ? old('description') : $description }}</textarea>
              </div>
            </div>
            <div class="row align-items-end mt-4" >
              <div class="col-md-4">
                <label> </label>
                <button type="submit" name="submit_room" class="btn btn-primary align-bottom align-text-bottom">SAVE</button>
              </div>
            </div>
          </form>

          @unless( $modify == 0 )
            <form name="frm_comments" method="POST" action="/comment/{{ $comment_id ? $comment_id : 'room/' . $id }}" class="mt-5" >
              @csrf
              <h4>{{ __('Comments') }}</h4>
              <div class="row mt-4" >
                <div class="col-md-6" >
                  <textarea name="comment" class="form-control" >{{ $comment ? $comment : '' }}</textarea>
                  <small class="error" >{{ $errors->first('comment') }}</small>
                </div>
              </div>
              <div class="row mt-4" >
                <div class="col-md-6" >
                  <button type="submit" name="but_comment" class="btn btn-primary" >SAVE</button>
                </div>
              </div>
            </form>
          @endunless

        </div>
      </div>
    </div>
</x-app-layout>

<script >
  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy'
  });
</script>
