@extends('layouts.main')
@section('content')

<div class="">
    <div class="container-fluid mt-3">
        <div class="row" id="main_content">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-banks-center">
                        <div class="col">
                            <h3 class="mb-0">Bids</h3>
                        </div>
                        @can('bid-create')
                        <div class="col text-right"> 
                            <a href="{{route('bids.create')}}" class="btn btn-sm btn-primary">Add Bid</a>
                        </div>
                        @endcan
                       
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        @if(session('status'))
                            <div class="alert alert-{{ Session::get('status') }}" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        @include('business.bid.filter')

                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" data-id="1" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">My Bids</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" data-id="2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Other Bids</a>
                                </li>
                            
                            </ul>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                    <div id="abc2">
                                        @if(count($mybids) > 0)
                                        <table class="table table-sm table-striped table-hover dataTable no-footer" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">Sr.no</th>
                                                    <th scope="col" class="sort" data-sort="name">Profile</th>
                                                    <th scope="col" class="sort" data-sort="name">Bid Url</th>
                                                    <th scope="col" class="sort" data-sort="name">Comment</th>
                                                    <th scope="col" class="sort" data-sort="name">Created Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ($mybids as $key => $bid)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{($bid->bidprofile()->exists())?$bid->bidprofile->name:''}}</td>
                                                    <td><a target="_blank" href="{{ $bid->bid_url }}">{{ $bid->bid_url}}</a></td>
                                                   {{-- <td>{{ ucfirst($bid->biduser->name) }}</td>--}}
                                                    <td>
                                                    @if(isset($bid->comment) && !empty($bid->comment))
                                                    <a data-toggle="modal" data-target="#viewcomment_{{$bid->id}}" style="color: blue;cursor: pointer;">View Comment</a>
                                                    @endif
                                                    <div class="modal fade" id="viewcomment_{{$bid->id}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title"></h3>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <div class="col-sm-12">
                                                                                        <div class="row">
                                                                                        <div class="col-sm-12"> {{$bid->comment}}</div>
                                                                                        </div>
                                                                                </div>
                                                                                    
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">OK</button>
                                                                        </div>
                                                                    </div>
                                                    </td>
                                                
                                                    <td> {{ date('m-d-Y', strtotime($bid->created_at)) }}</td>
                                                
                                                    <td>
                                                    @can('bid-edit')
                                                    <a href="{{route('bids.edit',$bid->id)}}" class="btn btn-info btn-sm"><i class="fas fa-user-edit"></i></a>
                                                    @endcan
                                                
                                                    @can('bid-delete')
                                                    <a id="Are you sure, you want to delete this bid?" data-toggle="tooltip" title="Delete" onclick="javascript:confirmationDelete($(this));return false;" href="{{route('bids.destroy',$bid->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                    @endcan
                                                
                                                    </td>
                                                </tr>
                                                 @endforeach
                                            </tbody>
                                
                                        </table>
                            
                                    @else
                                        <div class="no-data-found"><h4>No bids found</h4></div>
                                    @endif
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                            <div id="abc2">
                                        @if(count($otherbids) > 0 )
                                        
                                        <table class="table table-sm table-striped table-hover dataTable no-footer" id="dataTable2">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name" style="width:7% !important;">Sr.no</th>
                                                    <th scope="col" class="sort" data-sort="name">Profile</th>
                                                    <th scope="col" class="sort" data-sort="name">Bid Owner</th> 
                                                    <th scope="col" class="sort" data-sort="name">Bid Url</th>
                                                     <th scope="col" class="sort" data-sort="name">Comment</th>
                                                    <th scope="col" class="sort" data-sort="name">Created Date</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ($otherbids as $key => $bid)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{($bid->bidprofile()->exists())?$bid->bidprofile->name:''}}</td>
                                                    <td>{{ ucfirst($bid->biduser->name) }}</td>
                                                    <td><a target="_blank" href="{{ $bid->bid_url }}">{{ $bid->bid_url}}</a></td>
                                                
                                                    <td>
                                                    @if(isset($bid->comment) && !empty($bid->comment))
                                                    <a data-toggle="modal" data-target="#viewcomment_{{$bid->id}}" style="color: blue;cursor: pointer;">View Comment</a>
                                                    @endif
                                                    <div class="modal fade" id="viewcomment_{{$bid->id}}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title"></h3>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <div class="col-sm-12">
                                                                                        <div class="row">
                                                                                        <div class="col-sm-12"> {{$bid->comment}}</div>
                                                                                        </div>
                                                                                </div>
                                                                                    
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">OK</button>
                                                                        </div>
                                                                    </div>
                                                    </td>
                                                
                                                    <td> {{ date('m-d-Y', strtotime($bid->created_at)) }}</td>
                                                
                                                    <!-- <td>
                                                    
                                                
                                                
                                                    <a id="Are you sure, you want to delete this bid?" data-toggle="tooltip" title="Delete" onclick="javascript:confirmationDelete($(this));return false;" href="{{route('bids.destroy',$bid->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                
                                                    </td> -->
                                                </tr>
                                                 @endforeach
                                            </tbody>
                                
                                        </table>
                            
                                    @else
                                        <div class="no-data-found"><h4>No bids found</h4></div>
                                    @endif
                                    </div>
                            </div>
            
                            </div>
                        </div>
                    </div>
                            
                           
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')
       

    </div>
</div>
@endsection
@section('script')
@include('layouts.common_js')
<script type="text/javascript">
    $(document).ready(function(){
        activaTab();
        function activaTab(){
            var undValue = <?= $other_bids_uid ?>;
            console.log('un',undValue);
            if (undValue != null) {
                var tab = 'tabs-icons-text-2'; 
                $('.nav-pills a[href="#' + tab + '"]').trigger('click');
            }
        };
        $('.user_div').css('display','none');

        $('.nav-pills a').click(function(){
            $(this).tab('show');
        });

        $('.nav-pills a').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("data-id") // activated tab
        // var target = $(e.target).attr("data-id") /
        if(target == 2){
            $('.user_div').css('display','block');

        }else{
            $('.user_div').css('display','none');
            $('#user_id').val(''); 
            // $("#user_id:selected").remove(); 
        }
        });

    
    });


    $(function() {


        $( "#datepickerbid" ).datepicker({
        // defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            // maxDate:new Date(),
            onClose: function( selectedDate ) {
                $( "#datepickerbid2" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#datepickerbid2" ).datepicker({
            // defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            // maxDate:new Date(),
            onClose: function( selectedDate ) {
                $( "#datepickerbid" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    });
    $('#dataTable2').DataTable({
        language: {
        paginate: {
            next: '<i class="fas fa-angle-right"></i>',
            previous: '<i class="fas fa-angle-left"></i>'  
        }
        
        },
        "pageLength": 20
        
    });
// $('form').submit(function(e){
//    e.preventDefault();
//    let title=$('form').attr('id');
//    swal({
//             title: title,
//             icon: "warning",
//             buttons: true,
//             dangerMode: true,
//             })
//             .then((willDelete) => {
//             if (willDelete) {
//                 $('form').submit();
               
//             }
//         });
             
// });
</script>
@endsection