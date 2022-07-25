@extends('layouts.main')
@section('content')
<div class="header pb-6" id="main_content">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            @can('expense-dashboard')
            <div class="row align-items-center py-4">
           
                <div class="col-xl-12 col-md-12">
                    <h5>Expense Dashboard</h5>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                    <!-- Card body -->
                        <div class="card-body">
                            <a href="{{ route('categories') }}">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title  text-muted mb-0">Categories</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $data['categories'] }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                            <i class="ni ni-bullet-list-67 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                 <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                    <!-- Card body -->
                        <div class="card-body">
                            <a href="{{ route('beneficiaries') }}">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title  text-muted mb-0">Beneficiaries</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $data['beneficiaries'] }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                            <i class="far fa-money-bill-alt text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                 <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                    <!-- Card body -->
                        <div class="card-body">
                            <a href="{{ route('bankaccounts') }}">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title  text-muted mb-0">Bank Accounts</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $data['bank_accounts'] }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                            <i class="ni ni-shop text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

               
               
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                    <!-- Card body -->
                        <div class="card-body">
                            <a href="{{ route('expenses') }}">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title  text-muted mb-0">Current Financial Year Expenses Credit</h5>
                                        <span class="h2 font-weight-bold mb-0">Rs. {{ $data['current_year_expenses_credit'] }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                            <img src="{{asset('assets/img/icons/credit.png')}}">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                    <!-- Card body -->
                        <div class="card-body">
                            <a href="{{ route('expenses') }}">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title  text-muted mb-0">Current Financial Year Expenses Debit</h5>
                                        <span class="h2 font-weight-bold mb-0">Rs. {{ $data['current_year_expenses_debit'] }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                            <img src="{{asset('assets/img/icons/debit.png')}}">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

               
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                    <!-- Card body -->
                        <div class="card-body">
                            <a href="{{ route('expenses') }}">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title  text-muted mb-0">Current Month Expenses Credit</h5>
                                        <span class="h2 font-weight-bold mb-0">Rs. {{ $data['current_month_expenses_credit'] }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                            <img src="{{asset('assets/img/icons/credit.png')}}">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                    <!-- Card body -->
                        <div class="card-body">
                            <a href="{{ route('expenses') }}">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title  text-muted mb-0">Current Month Expenses Debit</h5>
                                        <span class="h2 font-weight-bold mb-0">Rs. {{ $data['current_month_expenses_debit'] }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                            <img src="{{asset('assets/img/icons/debit.png')}}">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            @endcan
            @can('resumes-dashboard')
            <div class="row align-items-center py-4">
                <div class="col-xl-12 col-md-12">
                    <h5>Resumes Dashboard</h5>
                </div>
               <div class="col-xl-3 col-md-6">
                   <div class="card card-stats">
                   <!-- Card body -->
                       <div class="card-body">
                           <a href="{{ route('resumeCategory') }}">
                               <div class="row">
                                   <div class="col">
                                       <h5 class="card-title  text-muted mb-0">Resume Category</h5>
                                       <span class="h2 font-weight-bold mb-0">{{ $data['resume_category'] }}</span>
                                   </div>
                                   <div class="col-auto">
                                       <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                           <i class="ni ni-bullet-list-67 text-white"></i>
                                       </div>
                                   </div>
                               </div>
                           </a>
                       </div>
                   </div>
               </div>
               <div class="col-xl-3 col-md-6">
                   <div class="card card-stats">
                   <!-- Card body -->
                       <div class="card-body">
                           <a href="{{ route('resumes') }}">
                               <div class="row">
                                   <div class="col">
                                       <h5 class="card-title  text-muted mb-0">Resume</h5>
                                       <span class="h2 font-weight-bold mb-0">{{ $data['resumes'] }}</span>
                                   </div>
                                   <div class="col-auto">
                                       <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                           <i class="ni ni-bullet-list-67 text-white"></i>
                                       </div>
                                   </div>
                               </div>
                           </a>
                       </div>
                   </div>
               </div>
            </div>
            @endcan
            @can('business-dashboard')
            <div class="row align-items-center py-4">
                <div class="col-xl-12 col-md-12">
                    <h5>Business Dashboard</h5>
                </div>
               <div class="col-xl-3 col-md-6">
                   <div class="card card-stats">
                   <!-- Card body -->
                       <div class="card-body">
                           <a href="{{ route('bidprofile.index') }}">
                               <div class="row">
                                   <div class="col">
                                       <h5 class="card-title  text-muted mb-0">Bids Profile</h5>
                                       <span class="h2 font-weight-bold mb-0">{{ $data['bid_profile'] }}</span>
                                   </div>
                                   <div class="col-auto">
                                       <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                           <i class="ni ni-bullet-list-67 text-white"></i>
                                       </div>
                                   </div>
                               </div>
                           </a>
                       </div>
                   </div>
               </div>
               <div class="col-xl-3 col-md-6">
                   <div class="card card-stats">
                   <!-- Card body -->
                       <div class="card-body">
                           <a href="{{ route('bids.index') }}">
                               <div class="row">
                                   <div class="col">
                                       <h5 class="card-title  text-muted mb-0">Bids</h5>
                                       <span class="h2 font-weight-bold mb-0">{{ $data['bids'] }}</span>
                                   </div>
                                   <div class="col-auto">
                                       <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                           <i class="ni ni-bullet-list-67 text-white"></i>
                                       </div>
                                   </div>
                               </div>
                           </a>
                       </div>
                   </div>
               </div>
               <div class="col-xl-3 col-md-6">
                   <div class="card card-stats">
                   <!-- Card body -->
                       <div class="card-body">
                           <a href="{{ route('targets.index') }}">
                               <div class="row">
                                   <div class="col">
                                       <h5 class="card-title  text-muted mb-0">Targets Achieved</h5>
                                       <span class="h2 font-weight-bold mb-0">{{ $data['targets'] }}</span>
                                   </div>
                                   <div class="col-auto">
                                       <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                           <i class="ni ni-bullet-list-67 text-white"></i>
                                       </div>
                                   </div>
                               </div>
                           </a>
                       </div>
                   </div>
               </div>
               
            </div>
            @endcan
        </div>
    </div>
</div>
<!-- Page content -->

<div class="container-fluid ">
      <!-- Footer -->
     @include('layouts.footer')
 </div>
@endsection