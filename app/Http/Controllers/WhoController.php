<?php

namespace App\Http\Controllers;

use App\Models\Who;
use App\Http\Requests\StoreWhoRequest;
use App\Http\Requests\UpdateWhoRequest;
use App\Traits\FileUploader;

class WhoController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametr = request()->segment(3);
        if (!in_array($parametr,['section_one','section_two','section_three','section_four']))
        {
            abort(404);
        }
        return view('back.pages.who.index', compact('parametr'));
    }

    public function statistics()
    {
        return view('back.pages.who.statistics');
    }

    public function statisticsPost()
    {
        $this->validate(request(),[
           'members'=>'nullable|max:255',
           'events'=>'nullable|max:255',
           'parliament'=>'nullable|max:255',
           'programs'=>'nullable|max:255',
        ],[],[
            'members'=>'Members',
            'events'=>'Organized events',
            'parliament'=>'Parliament members',
            'programs'=>'Programs',
        ]);

        foreach (request()->keys() as $key)
        {
            if ($key != '_token')
            {
                Who::updateOrCreate(
                    ['key'   => $key],
                    [
                        'value' => request()->post($key)
                    ]
                );
            }
        }

        toastr()->success('Data added successfully');
        return redirect()->route('back.statistics');
    }

    public function flagPart()
    {
        return view('back.pages.who.flag');
    }

    public function flagPartPost()
    {
        $this->validate(request(),[
           'photo_1'=>'nullable|max:2048',
           'photo_2'=>'nullable|max:2048',
           'photo_3'=>'nullable|max:2048',
           'photo_1_text_az'=>'nullable|max:10000',
           'photo_2_text_az'=>'nullable|max:10000',
           'photo_3_text_az'=>'nullable|max:10000',
           'photo_1_text_en'=>'nullable|max:10000',
           'photo_2_text_en'=>'nullable|max:10000',
           'photo_3_text_en'=>'nullable|max:10000',
           'title_1_az'=>'nullable|max:10000',
           'title_1_en'=>'nullable|max:10000',
           'text_az'=>'nullable|max:10000',
           'text_en'=>'nullable|max:10000',
        ]);
        foreach (request()->keys() as $key)
        {
            if ($key != '_token')
            {
                if ($key == 'photo_1')
                {
                    $photo_1 = $this->fileSave('files/who/', request(),'photo_1');
                    Who::updateOrCreate(
                        ['key'   => 'photo_1'],
                        [
                            'value' => $photo_1
                        ]
                    );
                }

                if ($key == 'photo_2')
                {
                    $photo_2 = $this->fileSave('files/who/', request(),'photo_2');
                    Who::updateOrCreate(
                        ['key'   => 'photo_2'],
                        [
                            'value' => $photo_2
                        ]
                    );
                }

                if ($key == 'photo_3')
                {
                    $photo_3 = $this->fileSave('files/who/', request(),'photo_3');
                    Who::updateOrCreate(
                        ['key'   => 'photo_3'],
                        [
                            'value' => $photo_3
                        ]
                    );
                }

                if ($key == 'photo_1' || $key == 'photo_2' || $key == 'photo_3')
                {

                }
                else
                {
                    Who::updateOrCreate(
                        ['key'   => $key],
                        [
                            'value' => request()->post($key)
                        ]
                    );
                }
            }
        }

        toastr()->success('Data added successfully');
        return redirect()->route('back.flag.part');
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
     * @param  \App\Http\Requests\StoreWhoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWhoRequest $request)
    {
        foreach ($request->keys() as $key)
        {
            if ($key != '_token' && $key != 'section')
            {
                if ($key == 'src')
                {
                    $src = $this->fileSave('files/who/', $request,'src');
                    Who::updateOrCreate(
                        ['key'   => $request->section.'_src'],
                        [
                            'value' => $src
                        ]
                    );
                }
                else
                {
                    Who::updateOrCreate(
                        ['key'   => $request->section.'_'.$key],
                        [
                            'value' => $request->post($key)
                        ]
                    );
                }
            }
        }

        toastr()->success('Data added successfully');
        return redirect()->route('back.who',['section'=>$request->section]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Who  $who
     * @return \Illuminate\Http\Response
     */
    public function show(Who $who)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Who  $who
     * @return \Illuminate\Http\Response
     */
    public function edit(Who $who)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWhoRequest  $request
     * @param  \App\Models\Who  $who
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWhoRequest $request, Who $who)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Who  $who
     * @return \Illuminate\Http\Response
     */
    public function destroy(Who $who)
    {
        //
    }
}
