<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FacilityHierarchy;
use App\Models\FacilityLevel;
use App\Models\HUD;
use App\Models\Block;
use App\Models\PHC;
use App\Models\HSC;

class FacilityHierarchyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hiiii');
        $facility_levels = FacilityLevel::getFacilityLevelData();

        $huds = HUD::filter()->where('status', _active())->orderBy('name')->get();
        
        $blocks = [];
        if ($hud_id = request('hud_id')) {
            $blocks = Block::filter()->where('status', _active())->orderBy('name')->get();
        }
        $phcs = array();

        if ($block_id = request('block_id')) {
            $phcs = PHC::filter()->where('status', _active())->orderBy('name')->get();
        }
        $hscs = [];
        if ($phc_id = request('phc_id')) {
            $hscs = HSC::filter()->where('status', _active())->orderBy('name')->get();
        }
        $results = FacilityHierarchy::getQueriedResult();
        // dd($results);
        return view('admin.masters.facilityhierarchy.list',compact('results', 'facility_levels', 'huds', 'blocks', 'phcs', 'hscs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = _getGlobalStatus();
        $facility_levels = FacilityLevel::getFacilityLevelData();
        $huds = $blocks = $phc = $hsc = $designation = [];
        return view('admin.masters.facilityhierarchy.create', compact('huds', 'blocks', 'phc', 'hsc', 'statuses', 'facility_levels', ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
