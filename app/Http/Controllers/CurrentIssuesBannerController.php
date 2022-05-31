<?php

namespace App\Http\Controllers;

use App\Models\CurrentIssuesBanner;
use App\Http\Requests\StoreCurrentIssuesBannerRequest;
use App\Http\Requests\UpdateCurrentIssuesBannerRequest;
use App\Traits\FileUploader;

class CurrentIssuesBannerController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.our.current.banner.index');
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
     * @param  \App\Http\Requests\StoreCurrentIssuesBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurrentIssuesBannerRequest $request)
    {
        $src = $this->fileSave('files/current/',$request,'src');
        CurrentIssuesBanner::updateOrCreate(
            ['key'   => 'src'],
            [
                'value' => $src
            ]
        );

        toastSuccess('Data added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CurrentIssuesBanner  $currentIssuesBanner
     * @return \Illuminate\Http\Response
     */
    public function show(CurrentIssuesBanner $currentIssuesBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurrentIssuesBanner  $currentIssuesBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrentIssuesBanner $currentIssuesBanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCurrentIssuesBannerRequest  $request
     * @param  \App\Models\CurrentIssuesBanner  $currentIssuesBanner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrentIssuesBannerRequest $request, CurrentIssuesBanner $currentIssuesBanner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CurrentIssuesBanner  $currentIssuesBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrentIssuesBanner $currentIssuesBanner)
    {
        //
    }
}
