@extends('layouts.main')
@section('content')
<div class="">
    <div class="container-fluid mt-3">
        <div class="row" id="main_content">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-Banks-center">
                        <div class="col">
                            <h3 class="mb-0">Add Bid</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('bids.index')}}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                         @include('flash-message')
                
                            {!! Form::open(array('route' => 'bids.store','method'=>'POST','id'=>'addCategory')) !!}
                            @csrf
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                {!! Form::text('bid_url', null, array('placeholder' => 'Bid Url','class' => 'form-control')) !!}
                                
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                             <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                              
                                {!! Form::select('bid_id',$bids,[], array('placeholder' => 'Select Profile','class' => 'form-control')) !!}
                                
                                </div>
                                @error('roles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                
                                {!! Form::textarea('perposal', null, array('placeholder' => 'Proposal','class' => 'form-control')) !!}
                                
                                </div>
                                @error('perposal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>--}}

                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                        
                                {!! Form::textarea('comment', null, array('placeholder' => 'Comment','class' => 'form-control')) !!}
                                
                                </div>
                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                 
                            <div class="text-right">
                                <button type="submit" id="save_cat" class="btn btn-primary mt-3">Save</button>
                            </div>
                       {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
</div>
@endsection

@section('script')
<script>
$("#addCategory").validate({
    errorElement: 'div',
rules: {
    bid_id:{
        required:true,
    },
    bid_url:{
        required:true,
    },
},messages: {
    bid_id: {
      required: "Please provide  bid id",
    },
    bid_url: {
       required: "Please provide bid url",
    },
},
 submitHandler: function(form) {
    form.submit();
  }

});


    
</script>
@endsection