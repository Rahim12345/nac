<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Http\Requests\StoreMembershipRequest;
use App\Http\Requests\UpdateMembershipRequest;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.membership.index',[
            'memberships'=>Membership::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.membership.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMembershipRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMembershipRequest $request)
    {
        Membership::create([
            'option_title_az'=>$request->title_az,
            'option_title_en'=>$request->title_en,
            'option_text_az'=>$request->text_az,
            'option_text_en'=>$request->text_en
        ]);

        toastSuccess('Data added successfully');
        return redirect()->route('membership.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        return view('back.pages.membership.edit',  compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMembershipRequest  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMembershipRequest $request, Membership $membership)
    {
        $membership->update([
            'option_title_az'=>$request->title_az,
            'option_title_en'=>$request->title_en,
            'option_text_az'=>$request->text_az,
            'option_text_en'=>$request->text_en
        ]);

        toastSuccess('Data updated successfully');
        return redirect()->route('membership.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        $membership->delete();
        toastSuccess('Data deleted successfully');
        return redirect()->route('membership.index');
    }
}
