<?php

namespace Modules\Program\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Program\Entities\Program;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $programs = Program::get();
        return view('program::index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('program::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Program::create($request->except('_token'));
        return redirect(route('programs.all'))->with('success', 'Program Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('program::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Program $program)
    {
        return view('program::edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Program $program)
    {
        $program->update($request->except('_token'));
        return redirect(route('programs.all'))->with('success', 'Program Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return redirect(route('programs.all'))->with('success', 'Program Deleted Successfully');
    }
}
