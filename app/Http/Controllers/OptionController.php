<?php

namespace App\Http\Controllers;

use App\Helpers\Options;
use App\Models\Option;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Traits\FileUploader;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.options',[
            'unvan_az'=>Options::getOption('unvan_az'),
            'unvan_en'=>Options::getOption('unvan_en'),
            'facebook'=>Options::getOption('facebook'),
            'twitter'=>Options::getOption('twitter'),
            'youtube'=>Options::getOption('youtube'),
            'instagram'=>Options::getOption('instagram'),
            'email'=>Options::getOption('email'),
            'tel'=>Options::getOption('tel'),
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOptionRequest $request)
    {
        $check_add = Options::getOption('facebook') == '' ? true : false;
        foreach ($request->keys() as $key)
        {
            if ($key != '_token')
            {
                if ($key == 'unvan')
                {
                    $unvan = explode('***',$request->post($key));
                    Option::updateOrCreate(
                        ['key'   => 'unvan_az'],
                        [
                            'value' => $unvan[0]
                        ]
                    );

                    Option::updateOrCreate(
                        ['key'   => 'unvan_en'],
                        [
                            'value' => $unvan[1]
                        ]
                    );
                }
                else
                {
                    Option::updateOrCreate(
                        ['key'   => $key],
                        [
                            'value' => $request->post($key)
                        ]
                    );
                }
            }
        }

        if ($check_add)
        {
            toastr()->success('Data added successfully');
        }
        else
        {
            toastr()->success('Data has been successfully updated');
        }

        return redirect()->route('option.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOptionRequest  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOptionRequest $request, Option $option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }

    public function pageBanner($key)
    {
        return view('back.pages.page-banners.banner', compact('key'));
    }

    public function pageBannerPost(Request $request)
    {
        $this->validate($request,[
            'src'=>'nullable|max:10000',
            'title_az'=>'nullable|max:10000',
            'title_en'=>'nullable|max:10000',
        ]);

        foreach ($request->keys() as $key)
        {
            if ($key != '_token' && $key != 'key')
            {
                if ($key == 'src')
                {
                    $src = $this->fileSave('files/pages-banners/',$request,'src');
                    Option::updateOrCreate(
                        ['key'   => $request->post('key').'_'.$key],
                        [
                            'value' => $src
                        ]
                    );
                }
                else
                {
                    Option::updateOrCreate(
                        ['key'   => $request->post('key').'_'.$key],
                        [
                            'value' => $request->post($key)
                        ]
                    );
                }
            }
        }

        toastSuccess('Data added successfully');
        return redirect()->back();
    }
}
