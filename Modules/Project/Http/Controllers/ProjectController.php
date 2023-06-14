<?php

namespace Modules\Project\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Modules\Coordinator\Entities\Coordinator;
use Modules\Program\Entities\Program;
use Modules\Project\Entities\Denomination;
use Modules\Project\Entities\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $projects = Project::get();
        return view('project::index',compact('projects'));
    }
    public function denomination(){
        return view('project::denomination');
    }
    public function addDenomination(Request $req){
        $data=[
            'name'        =>$req['name'],
        ];
        if($data){
            Denomination::create($data);
            return redirect(route('projects.all'))->with('success','Denomination Added Successfully');
        }else{
            return redirect(route('projects.all'))->with('error','Denomination Added failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
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
        $programs = Program::get();
        $coordinators = Coordinator::get();
        $denominations = Denomination::whereIsDeleted(0)->get();
        $denomLeader = User::whereHas('roles', function ($query) {
          $query->where('name', 'Denominational Leader');
      })->get();
        return view('project::create',['token' =>$auth_token,'coordinators'=>$coordinators,'programs' => $programs ,'countries'=>$countries,'denominations'=>$denominations,'denomLeader'=>$denomLeader]);
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

    public function store(Request $request)
    {
        $country = substr($request->country, 0, 4);
        $denomination = substr($request->denomination, 0, 4);
        $district = substr($request->district, 0, 4);
        $date = Carbon::parse($request->start_date);
        $month = $date->format('m');
        $year = $date->format('Y');
        $random_number = rand(1000, 9999);
        $project_id = $country.'-'.$denomination.'-'.$district.'-'.$month.'-'.$year.'-'.$random_number;
        $project= Project::create(['project_id' => $project_id, 'denomination' => $request->denomination, 'district' => $request->district, 'country' => $request->country, 'state' => $request->state, 'city' => $request->city, 'start_date' => $request->start_date, 'coordinator_id' => $request->coordinator_id, 'program_id' => $request->program_id,'user_id' =>$request->user_id]);
        return redirect(route('projects.all'))->with('success','Project Added Successfully');
    }


    public function countries()
    {
        return view('Admin.countries', );
    }

    public function show($id)
    {
        return view('project::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Project $project)
    {
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
        $programs = Program::get();
        $coordinators = Coordinator::get();
        $denominations = Denomination::whereIsDeleted(0)->get();
        $denomLeader = User::whereHas('roles', function ($query) {
            $query->where('name', 'Denominational Leader');
        })->get();
        return view('project::edit',['project'=>$project,'token' =>$auth_token,'coordinators'=>$coordinators,'programs' => $programs ,'countries'=>$countries,'denominations'=>$denominations,'denomLeader'=>$denomLeader]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Project $project)
    {
        $country = substr($request->country, 0, 4);
        $denomination = substr($request->denomination, 0, 4);
        $district = substr($request->district, 0, 4);
        $date = Carbon::parse($request->start_date);
        $month = $date->format('m');
        $year = $date->format('Y');
        $random_number = rand(1000, 9999);
        $project_id = $country.'-'.$denomination.'-'.$district.'-'.$month.'-'.$year.'-'.$random_number;

        $project->update(['project_id' => $project_id, 'denomination' => $request->denomination, 'district' => $request->district, 'country' => $request->country, 'state' => $request->state, 'city' => $request->city, 'start_date' => $request->start_date, 'coordinator_id' => $request->coordinator_id, 'program_id' => $request->program_id]);
        return redirect(route('projects.all'))->with('success','Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect(route('projects.all'))->with('success','Project Deleted Successfully');
    }

    public function planter_add(Request $request){
        $user = User::find($request->user_id);
        $user->update(['project_id' => $request->project_id]);
        return redirect()->back()->with('success','Planter added Successfully');
    }
}
