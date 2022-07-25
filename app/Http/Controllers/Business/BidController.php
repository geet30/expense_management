<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business\Bid;
use App\Models\Business\BidProfile;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DateTime;
use App\Models\User;
class BidController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
        $this->middleware('permission:bid-list|bid-create|bid-edit|bid-delete', ['only' => ['index','save']]);
        $this->middleware('permission:bid-create', ['only' => ['create','store']]);
        $this->middleware('permission:bid-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:bid-delete', ['only' => ['show']]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data=$request->all();
        $first_day = new DateTime('first day of this month');
        $last_day = new DateTime('last day of this month');
        $userid = auth()->user()->id;
        $users = User::where('id','!=',1)->orderBy('id','DESC')->get();
        $bid=Bid::query();
        $otherbids=Bid::query();
        // echo "<pre>";print_r($data);die;
    
        if (isset($data['user_id'])) {
            $otherbids=$otherbids->where('user_id',$data['user_id']);
        }
       
        if (isset($data['from_date']) && isset($data['to_date'])) {
           
           $from_date=\Carbon\Carbon::parse($data['from_date'])->format('Y-m-d');
           $to_date=\Carbon\Carbon::parse($data['to_date'])->format('Y-m-d');

           $bid=$bid->whereBetween('created_at',[$from_date, $to_date]);
           $otherbids=$otherbids->whereBetween('created_at',[$from_date, $to_date]);
        }
        else{
            $from_date = $first_day->format('Y-m-d');
            $to_date = $last_day->format('Y-m-d');
            $bid=$bid->whereBetween('created_at',[$from_date, $to_date]);
            $otherbids=$otherbids->whereBetween('created_at',[$from_date, $to_date]);
            $data['from_date'] = $first_day->format('d-m-Y');
            $data['to_date'] = $last_day->format('d-m-Y');
        }
        $other_bids_uid = (isset($data['user_id']))  ? $data['user_id']:'null';
        $mybids=$bid->with(['bidprofile','biduser'])->where('user_id',$userid)->orderBy('id','DESC')->get();
        $otherbids =$otherbids->with(['bidprofile','biduser'])->where('user_id','!=',$userid)->orderBy('id','DESC')->get();
//  echo "<pre>";print_r($mybids);die;
        return view('business.bid.index',compact('mybids','otherbids','data','users','other_bids_uid'))->with('i');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bids = BidProfile::pluck('name','id');
        return view('business.bid.create',compact('bids'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$data=$request->except('_token');
        $this->validate($request, [
            'bid_id' => 'required',
            'bid_url' => 'required',
        ]);
        $data['user_id']=auth()->user()->id;
        $bid = Bid::create($data);
        return redirect()->route('bids.index')->with('success','Bid added successfully');
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	
        $bid = Bid::find($id);
        $bids = BidProfile::pluck('name','id');
        $userbid = $bid->bidprofile->pluck('name','id')->all();
        //dd($userbid);
        return view('business.bid.edit',compact('bid','bids','userbid'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'bid_id' => 'required',
            'bid_url' => 'required',
        ]);
    
        $data=$request->all();
        $data['user_id']=auth()->user()->id;
        $bid = Bid::find($id);
        $bid->fill($data)->save();
    
        return redirect()->route('bids.index')->with('success','Bid updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $bid=Bid::find($id);
        $bid->delete();
        return redirect()->route('bids.index') ->with('success','Bid deleted successfully');
    }
}
