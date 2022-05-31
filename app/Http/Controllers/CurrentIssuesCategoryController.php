<?php

namespace App\Http\Controllers;

use App\Models\CurrentIssuesCategory;
use App\Http\Requests\StoreCurrentIssuesCategoryRequest;
use App\Http\Requests\UpdateCurrentIssuesCategoryRequest;

class CurrentIssuesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.our.current.category.index',[
            'categories'=>CurrentIssuesCategory::latest()->get()
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
     * @param  \App\Http\Requests\StoreCurrentIssuesCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurrentIssuesCategoryRequest $request)
    {
        CurrentIssuesCategory::create([
           'name_az'=>$request->name_az,
           'name_en'=>$request->name_en,
            'title_az'=>$request->title_az,
            'title_en'=>$request->title_en,
            'slug_az'=>str_slug($request->name_az),
            'slug_en'=>str_slug($request->name_en),
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en,
        ]);

        toastSuccess('Data added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CurrentIssuesCategory  $currentIssuesCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CurrentIssuesCategory $currentIssuesCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurrentIssuesCategory  $currentIssuesCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrentIssuesCategory $currentIssuesCategory)
    {
        return view('back.pages.our.current.category.edit',[
            'categories'=>CurrentIssuesCategory::latest()->get(),
            'currentIssuesCategory'=>$currentIssuesCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCurrentIssuesCategoryRequest  $request
     * @param  \App\Models\CurrentIssuesCategory  $currentIssuesCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrentIssuesCategoryRequest $request, CurrentIssuesCategory $currentIssuesCategory)
    {
        $currentIssuesCategory->update([
            'name_az'=>$request->name_az,
            'name_en'=>$request->name_en,
            'title_az'=>$request->title_az,
            'title_en'=>$request->title_en,
            'slug_az'=>str_slug($request->name_az),
            'slug_en'=>str_slug($request->name_en),
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en,
        ]);

        toastSuccess('Data added successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CurrentIssuesCategory  $currentIssuesCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrentIssuesCategory $currentIssuesCategory)
    {
        $currentIssuesCategory->delete();
        toastSuccess('Data deleted succesfully');
        return redirect()->back();
    }
}
