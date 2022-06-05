<?php

namespace App\Http\Controllers;

use App\Models\BlogImages;
use App\Http\Requests\StoreBlogImagesRequest;
use App\Http\Requests\UpdateBlogImagesRequest;

class BlogImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreBlogImagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogImagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogImages  $blogImages
     * @return \Illuminate\Http\Response
     */
    public function show(BlogImages $blogImages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogImages  $blogImages
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogImages $blogImages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogImagesRequest  $request
     * @param  \App\Models\BlogImages  $blogImages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogImagesRequest $request, BlogImages $blogImages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogImages  $blogImages
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogImages $blogImages)
    {
        //
    }
}
