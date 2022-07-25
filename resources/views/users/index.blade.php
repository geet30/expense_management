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
                            <h3 class="mb-0">Users</h3>
                        </div>
                        @can('user-create')
                        <div class="col text-right"> 
                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Add User</a>
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

                      
                        <!-- Projects table -->
                        <div id="abc">
                        @if(count($data) > 0)

                        <!-- Projects table -->
                        <table class="table table-sm table-striped table-hover dataTable no-footer" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Sr.no</th>
                                    <th scope="col" class="sort" data-sort="name"> Name</th>
                                    <th scope="col" class="sort" data-sort="name">Email</th>
                                    <th scope="col" class="sort" data-sort="name">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                 @php {{$count=1;}} @endphp
                                @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                      @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                           <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                      @endif
                                    </td>
                                    <td>
                                    @can('user-edit')
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-info btn-sm"><i class="fas fa-user-edit"></i></a>
                                    @endcan
                                    @can('user-delete')
                                    @if($user->id != auth()->user()->id)
                                    <a id="Are you sure want to delete this user?" data-toggle="tooltip" title="Delete" onclick="javascript:confirmationDelete($(this));return false;" href="{{route('users.destroy',$user->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                   @endif
                                    @endcan
                                   
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                           
                        </table>
                         <button class="btn btn-primary btn-sm mt-3 show_all_records" id="show_all_records">Show All</button>
                         @else
                           <div class="no-data-found"><h4>No bank accounts found</h4></div>
                        @endif
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
@endsection