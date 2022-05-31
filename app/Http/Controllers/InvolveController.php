<?php

namespace App\Http\Controllers;

use App\Models\Involve;
use App\Http\Requests\StoreInvolveRequest;
use App\Http\Requests\UpdateInvolveRequest;
use App\Traits\FileUploader;

class InvolveController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.involve.index');
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
     * @param  \App\Http\Requests\StoreInvolveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvolveRequest $request)
    {
        foreach ($request->keys() as $key)
        {
            if ($key != '_token')
            {
                if ($key == 'src' || $key == 'src_mobile')
                {
                    $src = $this->fileSave('files/involve/', $request,$key);
                    Involve::updateOrCreate(
                        ['key'   => $key],
                        [
                            'value' => $src
                        ]
                    );
                }
                else
                {
                    Involve::updateOrCreate(
                        ['key'   => $key],
                        [
                            'value' => $request->post($key)
                        ]
                    );
                }
            }
        }

        toastr()->success('Data added successfully');
        return redirect()->route('involve.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Involve  $involve
     * @return \Illuminate\Http\Response
     */
    public function show(Involve $involve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Involve  $involve
     * @return \Illuminate\Http\Response
     */
    public function edit(Involve $involve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvolveRequest  $request
     * @param  \App\Models\Involve  $involve
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvolveRequest $request, Involve $involve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Involve  $involve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Involve $involve)
    {
        //
    }
}
