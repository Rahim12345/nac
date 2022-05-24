<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Traits\FileUploader;

class BannerController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.banner.index',[
            'banners'=>Banner::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $src = $this->fileSave('files/banners/', $request,'src');
        Banner::create([
            'src'=>$src,
            'title_az'=>$request->title_az,
            'title_en'=>$request->title_en,
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en,
            'button_az'=>$request->button_az,
            'button_en'=>$request->button_en,
            'link'=>$request->link
        ]);

        toastSuccess('Data added successfully');
        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('back.pages.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBannerRequest  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $src   = $this->fileUpdate($banner->src, $request->hasFile('src'), $request->src, 'files/banners/');
        $banner->update([
            'src'=>$src,
            'title_az'=>$request->title_az,
            'title_en'=>$request->title_en,
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en,
            'button_az'=>$request->button_az,
            'button_en'=>$request->button_en,
            'link'=>$request->link
        ]);

        toastSuccess('Data updated successfully');
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $this->fileDelete('files/banners/'.$banner->src);
        $banner->delete();

        toastSuccess('Data deleted successfully');
        return redirect()->route('banner.index');
    }
}
