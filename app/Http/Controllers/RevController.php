<?php

namespace App\Http\Controllers;

use App\Rev;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validate_data = Validator::make(request()->all(), [
            'projectID' => '',
            'rev' => '',
            'allPipe' => '',
            'allStress' => '',
            'designPipe' => '',
            'stressPipe' => '',
            'supportPipe' => '',
            'releasePipe' => '',
            'fabricatePipe' => '',
            'noStatusPipe' => '',
        ])->validated();


        Rev::create([
            'projectID' => $validate_data['projectID'],
            'rev' => $validate_data['rev'],
            'allPipe' => $validate_data['allPipe'],
            'allStress' => $validate_data['allStress'],
            'designPipe' => $validate_data['designPipe'],
            'stressPipe' => $validate_data['stressPipe'],
            'supportPipe' => $validate_data['supportPipe'],
            'releasePipe' => $validate_data['releasePipe'],
            'fabricatePipe' => $validate_data['fabricatePipe'],
            'noStatusPipe' => $validate_data['noStatusPipe'],
        ]);
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
