<div class="col-md-12 text-right pb-2">
  <div class="user-search-form">
    <form method="GET" action="{{route('filterBid')}}" enctype="multipart/form-data" id="filterbids">
     @csrf
 
     <div class="form-row">
      
        <div class="form-group mb-0 col-md-2">
          <input type="text" class="form-control form-control-sm datepicker-one @error('from_date') is-invalid @enderror" value="{{ isset($data['from_date'])?$data['from_date']:'' }}" id="datepickerbid" name="from_date" placeholder="From Date" autocomplete="off">
           <p class="err_filter"></p>
           @error('from_date')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group mb-0 col-md-2">
          <input type="text" class="form-control form-control-sm datepicker-two @error('to_date') is-invalid @enderror" value="{{ isset($data['to_date'])?$data['to_date']:''}}" id="datepickerbid2" name="to_date" placeholder="To Date" autocomplete="off">
           @error('to_date')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group mb-0 col-md-2 ">
          <div class="user_div">
            <select class="form-control form-control-sm send" name="user_id" id="user_id">
                <option  value="">Bid Owner</option>
                @foreach($users as $user)
                    <option value="{{$user['id']}}" @if(isset($data['user_id'])) {{$user['id'] == $data['user_id']  ? 'selected' : ''}} @endif>{{$user['name']}}</option>
                @endforeach
                
            </select>
          </div>
        </div>
       <div class="form-group mb-0 col-md-4 danger ">
         <a href="{{route('bids.index')}}" class="btn btn-danger btn-sm float-right">Reset</a>
         <button id="search" class="btn mr-2 btn-primary btn-sm float-right">Search</button>
                
        </div>


      </div>
  </form>
</div>
</div>


