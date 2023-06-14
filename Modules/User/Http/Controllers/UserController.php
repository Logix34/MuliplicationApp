<?php

namespace Modules\User\Http\Controllers;

use App\Models\AffiliationSetting;
use App\Models\Tax;
use App\Models\UserCryptochil;
use Carbon\Carbon;
use Hash,Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Modules\KYC\Entities\kyc;
use Illuminate\Routing\Controller;
use Modules\Subscription\Entities\Subscription;
use Modules\User\Entities\Deposit;
use Spatie\Permission\Models\Role;
use Modules\Package\Entities\Package;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Spatie\MediaLibrary\Support\MediaStream;
use Modules\Transactions\Entities\Transactions;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        if ($user->getRoleNames()[0] != 'super_admin'){
            $users=User::where('parent_id', $user->id)->get();
        }else{
            $users=User::whereHas('roles', function ($query) {
                $query->where('name','!=', 'super_admin');
            })->get();
        }

        return view('user::index',compact('users'));
    }
    public function planters_all()
    {

        $users=User::whereHas('roles', function ($query) {
            $query->where('name', 'Church Planter');
        })->get();

        return view('user::planters_all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        $roles = Role::where('name','!=', 'super_admin')->get();
        $denom = User::whereHas('roles', function ($query) {
            $query->where('name', 'Denominational Leader');
        })->get();
        $regional = User::whereHas('roles', function ($query) {
            $query->where('name', 'Regional Leader');
        })->get();

        return view('user::create', compact('roles', 'denom', 'regional'));
    }
    public function add_planter()
    {

        $roles = Role::where('name','!=', 'super_admin')->get();
        $denom = User::whereHas('roles', function ($query) {
            $query->where('name', 'Denominational Leader');
        })->get();
        $regional = User::whereHas('roles', function ($query) {
            $query->where('name', 'Regional Leader');
        })->get();

        return view('user::add_planter', compact('roles', 'denom', 'regional'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
        ]);
        $parent_id = $request->parent_id ?? \Illuminate\Support\Facades\Auth::id();
        $user = User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password), 'parent_id' => $parent_id]);
        $user->assignRole($request->role);

        return back()->with('success','User added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function detail(User $user)
    {
        $roles = Role::where('name','!=', 'super_admin')->get();
        return view('user::detail',compact('user',  'roles'));
    }
    public function view(User $user)
    {
        $roles = Role::where('name','!=', 'super_admin')->get();
        return view('user::user_view',compact('user',  'roles'));
    }
    public function accounts(User $user)
    {
        return view('user::accounts',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $user=User::find($request->id);

        $user->update($request->except('_token', 'password', 'email'));

        if($request->password){
            $user->password=Hash::make($request->password);
        }
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $user->clearMediaCollection('image');
            $user->addMediaFromRequest('image')->toMediaCollection('image');
        }
        $user->save();

//        $user->assignRole($request->role);

        return back()->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.all')->with('delete','User Deletd Successfully!');
    }
    public function profile(){
        $user = Auth::user();
        $response = Http::withHeaders([
            'api-token'=> 'UTidCZq8C6f8abMcwuzIal6m2n-TIjFJV7lsEuK3dxCU83DeK0Ex8r_1QIfRi4LQcds',
            'user-email'=> 'iamahmadraza54@gmail.com',
        ])->get('https://www.universal-tutorial.com/api/getaccesstoken');
        $data = (array)json_decode($response->body());
        $auth_token = $data['auth_token'];
        $country_response = Http::withHeaders([
            'Authorization' => 'Bearer '.$auth_token,
        ])->get('https://www.universal-tutorial.com/api/countries');
        $countries = (array)json_decode($country_response->body());
        return view('user::profile',['user' => $user, 'countries' =>$countries, 'token' =>$auth_token]);
    }
    public function states(Request $req){
        $stateResponse = Http::withHeaders([
            'Authorization' => 'Bearer '.$req->token,
        ])->get('https://www.universal-tutorial.com/api/states/'.$req->country);

        $states = $stateResponse->body();
        return $states;

    }
    public function cities(Request $req)
    {
        $citiesResponse = Http::withHeaders([
            'Authorization' => 'Bearer '.$req->token,
        ])->get('https://www.universal-tutorial.com/api/cities/'.$req->state);
        $cities = $citiesResponse->body();
        return $cities;
    }
    public function church(){
        $user = Auth::user();
        return view('user::church', compact('user'));
    }
    public function m_church(){
        $user = Auth::user();
        return view('user::m_church', compact('user'));
    }
    public function testimony(){
        $user = Auth::user();
        return view('user::testimony', compact('user'));
    }
    public function affiliation(User $user = null){
        if (!$user){
            $user = Auth::user();
        }
        $refarals = User::where('ref_by',Auth::user()->id)->get();

        return view('user::affiliation', compact('user','refarals'));
    }

    public function profileUpdate(Request $request){
        $user=User::find($request->user_id);
        $user->update($request->except('_token', 'password', 'email', 'image', 'user_id'));

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $user->clearMediaCollection('image');
            $user->addMediaFromRequest('image')->toMediaCollection('image');
        }

        if($request->password){
            $user->password=Hash::make($request->password);
        }
        $user->save();
        return redirect()->back()->with('success','Updated');
    }

    public function business(User $user){
        if($user->email){
            $user = User::find($user->id);
        }else{
            $user = Auth::user();
        }
        $initiatives = json_decode($user->initiatives);
        if(is_null($initiatives)){
            $initiatives = [];
        }
        return view('user::business', compact('user', 'initiatives'));
    }
    public function businessUpdate(Request $request){
        $user= User::find($request->user_id);
        $user->update($request->except('_token', 'user_id'));
        return back()->with('success','Updated');
    }
    public function user_affiliation(User $user)
    {
        $referals = User::where('ref_by',$user->id)->get();
        return view('user::user_affiliation',compact('user','referals'));
    }
    public function user_agreement(User $user)
    {
        return view('user::user_agreement',compact('user'));
    }
    public function transactions(User $user)
    {
        // dd($user);
        $transactions = Transactions::where('user_id',$user->id)->get();
        return view('user::transactions',compact('user','transactions'));
    }
    public function add_user(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'cpassword' => 'required|same:password',
            'role' => 'required',
        ]);
        // dd($request);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $password = $request->password;
        $cpassword = $request->cpassword;
        if ($password == $cpassword)
        {
            $user->password = Hash::make($password);
        }
        $user->save();
        $user->assignRole($request->role);
        return redirect()->route('user.all')->with('add','User Added Successfully');

    }
    public function affliation_setting()
    {
        $affliation = AffiliationSetting::first();
        $tax = Tax::first();
        return view("user::affliation_setting",compact('affliation', 'tax'));
    }
    public function affliation_add_update(Request $request)
    {
        $request->validate([
            'percentage'=>'required',
            'recurring'=>'required|integer'
        ]);
        $affliation = AffiliationSetting::first();
        if (!$affliation) {
            AffiliationSetting::create($request->except('_token'));
        }
        else{
            $affliations = $affliation::first();
            $affliations->update($request->except('_token'));
        }
        return redirect()->route('affliation.setting')->with('add','Affliation Setting Updated Successfully!');
    }
    public function tax_add_update(Request $request)
    {

        $tax = Tax::first();
        if (!$tax) {
            Tax::create($request->except('_token'));
        }
        else{
            $tax = $tax::first();
            $tax->update($request->except('_token'));
        }
        return redirect()->route('affliation.setting')->with('add','Tax Setting Updated Successfully!');
    }

    public function agreement_add_update(Request $request)
    {
        $affliation = AffiliationSetting::first();
        if (!$affliation) {
            AffiliationSetting::create($request->except('_token'));
        }
        else{
            $affliations = $affliation::first();
            $affliations->update($request->except('_token'));
        }
        return redirect()->route('affliation.setting')->with('add','Agreement Setting Updated Successfully!');
    }

    public function tax_document(){
        return view('user::tax_document');
    }
    public function tax_document_post(Request $request){
        $request->validate([
            'year' => 'required',
        ]);
        $year = $request->year;
        $address = $request->address ?? '';
        $recipient_tin = $request->recipient_tin ?? '';
        $user = \Illuminate\Support\Facades\Auth::user();
        $withdraws = $user->withdraws()->where('status', 1)->whereYear('created_at', $year)->get();
        $tax = Tax::first();
        return view('user::withdraws_report', compact( 'year', 'address', 'tax', 'user', 'recipient_tin', 'withdraws'));
    }

    public function subscription_agreement(){
        $setting = AffiliationSetting::first();

        return view('user::settings', compact('setting'));
    }

    public function view_agreement(){
        $setting = AffiliationSetting::first();
        return view('user::view_agreement', compact('setting'));
    }
}
