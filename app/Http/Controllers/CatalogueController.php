<?php

namespace App\Http\Controllers;


use App\Catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('catalogue/index' , [
            'catalogues' => Catalogue::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/catalogue/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        $validate_data = Validator::make(request()->all() , [
            'project' => 'required',
            'type' => 'required',
            'size1' => 'required',
            'size2' => 'required',
            'name' => 'required|min:4|max:50',
            'status' => '',
            'comment' => '',
            'link' => '',
        ])->validated();


        Catalogue::create([
            'project' => $validate_data['project'],
            'type' => $validate_data['type'],
            'size1' => $validate_data['size1'],
            'size2' => $validate_data['size2'],
            'name' => $validate_data['name'],
            'status' => $validate_data['status'],
            'comment' => $validate_data['comment'],
            'link' => $validate_data['link'],
        ]);
        return redirect('/catalogue/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
