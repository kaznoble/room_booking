<h4>{{ $modify == 1 ? 'Modify Client' : 'New Client' }}</h4>
<form method="POST" action="{{ $modify == 1 ? route('update_client', ['client_id'=>1]) : route('create_client') }}" name='new_client' class='new_client'>
  <div class="row" >
    <div class="col-md-4" >
      <label>Title</label>
      <select name="title" class="form-control">
        <option value="">--select--</option>
        @foreach($titles as $title)
          <option value="{{$title}}" >{{$title}}.</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4" >
      <label>
        Name
      </label>
      <input type="text" class="form-control" id="txt_name" name="txt_name" value="" />
      <small class="error">{{$errors->first('txt_name')}}</small>
    </div>
    <div class="col-md-4" >
      <label>
        Last Name
      </label>
      <input type="text" class="form-control" id="txt_last_name" name="txt_last_name" value="" />
    </div>
  </div>

  <div class="row mt-4" >
    <div class="col-md-8" >
      <label>Address</label>
      <input type="text" class="form-control" id="txt_address" name="txt_address" value="" />
    </div>
    <div class="col-md-4" >
      <label>
        Post Code
      </label>
      <input type="text" class="form-control" id="txt_post_code" name="txt_post_code" value="" />
    </div>
  </div>

  <div class="row mt-4" >
    <div class="col-md-4" >
      <label>City</label>
      <input type="text" class="form-control" id="txt_city" name="txt_city" value="" />
    </div>
    <div class="col-md-4" >
      <label>
        County
      </label>
      <input type="text" class="form-control" id="txt_county" name="txt_county" value="" />
    </div>
    <div class="col-md-4" >
      <!-- do nothing -->
    </div>
  </div>

  <div class="row mt-4" >
    <div class="col-md-12" >
      <label>Email</label>
      <input type="text" class="form-control" id="txt_email" name="txt_email" value="" />
    </div>
  </div>

  <div class="row mt-4" >
    <div class="col-md-12" >
      <button class="btn btn-primary" id="but_save" name="but_save" >SAVE</button>
    </div>
  </div>
</form>
