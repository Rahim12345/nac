<?php

namespace App\Http\Controllers;

use App\Models\Press;
use App\Http\Requests\StorePressRequest;
use App\Http\Requests\UpdatePressRequest;
use App\Traits\FileUploader;

class PressController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.press.index');
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
     * @param  \App\Http\Requests\StorePressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePressRequest $request)
    {
        foreach ($request->keys() as $key)
        {
            if ($key != '_token')
            {
                if ($key == 'src')
                {
                    $src = $this->fileSave('files/press/', $request,'src');
                    Press::updateOrCreate(
                        ['key'   => 'src'],
                        [
                            'value' => $src
                        ]
                    );
                }
                else
                {
                    Press::updateOrCreate(
                        ['key'   => $key],
                        [
                            'value' => $request->post($key)
                        ]
                    );
                }
            }
        }

        toastr()->success('Data added successfully');
        return redirect()->route('press.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Press  $press
     * @return \Illuminate\Http\Response
     */
    public function show(Press $press)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Press  $press
     * @return \Illuminate\Http\Response
     */
    public function edit(Press $press)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePressRequest  $request
     * @param  \App\Models\Press  $press
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePressRequest $request, Press $press)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Press  $press
     * @return \Illuminate\Http\Response
     */
    public function destroy(Press $press)
    {
        //
    }
}
