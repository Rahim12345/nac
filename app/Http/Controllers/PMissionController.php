<?php

namespace App\Http\Controllers;

use App\Models\PMission;
use App\Http\Requests\StorePMissionRequest;
use App\Http\Requests\UpdatePMissionRequest;
use App\Models\Press;
use App\Traits\FileUploader;

class PMissionController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.pmission.index');
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
     * @param  \App\Http\Requests\StorePMissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePMissionRequest $request)
    {
        foreach ($request->keys() as $key)
        {
            if ($key != '_token')
            {
                if ($key == 'src')
                {
                    $src = $this->fileSave('files/pmission/', $request,'src');
                    PMission::updateOrCreate(
                        ['key'   => 'src'],
                        [
                            'value' => $src
                        ]
                    );
                }
                else
                {
                    PMission::updateOrCreate(
                        ['key'   => $key],
                        [
                            'value' => $request->post($key)
                        ]
                    );
                }
            }
        }

        toastr()->success('Data added successfully');
        return redirect()->route('pmission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PMission  $pMission
     * @return \Illuminate\Http\Response
     */
    public function show(PMission $pMission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PMission  $pMission
     * @return \Illuminate\Http\Response
     */
    public function edit(PMission $pMission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePMissionRequest  $request
     * @param  \App\Models\PMission  $pMission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePMissionRequest $request, PMission $pMission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PMission  $pMission
     * @return \Illuminate\Http\Response
     */
    public function destroy(PMission $pMission)
    {
        //
    }
}
