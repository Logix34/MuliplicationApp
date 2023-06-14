<?php

namespace Modules\Coordinator\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Coordinator\Entities\Coordinator;

class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $coordinators = Coordinator::get();
        return view('coordinator::index', compact('coordinators'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('coordinator::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Coordinator::create($request->except('_token'));
        return redirect(route('coordinators.all'))->with('success', 'Coordinator Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('coordinator::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Coordinator $coordinator)
    {
        return view('coordinator::edit', compact('coordinator'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Coordinator $coordinator)
    {
        $coordinator->update($request->except('_token'));
        return redirect(route('coordinators.all'))->with('success', 'Coordinator Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Coordinator $coordinator)
    {
        $coordinator->delete();
        return redirect(route('coordinators.all'))->with('success', 'Coordinator Deleted Successfully');
    }
}
