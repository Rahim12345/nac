<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Traits\FileUploader;

class MenuController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.menu.index',[
            'menus'=>Menu::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Menu::where('parent_id',0)->select(['id','menu_az','menu_en'])->orderBy('id','desc')->get()->toArray();
        array_unshift($parents,[
            "id" => 0,
            "menu_az" => "Root",
            "menu_en" => "Root"
        ]);

        return view('back.pages.menu.create',[
            'parents'=>$parents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        $src = $this->fileSave('files/menus/',$request,'src');
        Menu::create([
            'menu_az'=>$request->menu_az,
            'menu_en'=>$request->menu_en,
            'slug_az'=>str_slug($request->menu_az),
            'slug_en'=>str_slug($request->menu_en),
            'src'=>$src,
            'title_az'=>$request->title_az,
            'title_en'=>$request->title_en,
            'button_az'=>$request->button_az,
            'button_en'=>$request->button_en,
            'link'=>$request->link,
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en,
            'default'=>0,
            'parent_id'=>$request->menu_id,
        ]);

        toastSuccess('Data added successfully');
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $parents = Menu::where('parent_id',0)->select(['id','menu_az','menu_en'])->orderBy('id','desc')->get()->toArray();
        array_unshift($parents,[
            "id" => 0,
            "menu_az" => "Root",
            "menu_en" => "Root"
        ]);

        return view('back.pages.menu.edit',[
            'parents'=>$parents,
            'menu'=>$menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $src   = $this->fileUpdate($menu->src, $request->hasFile('src'), $request->src, 'files/menus/');
        if ($menu->id != 5)
        {
            $menu->update([
                'menu_az'=>$request->menu_az,
                'menu_en'=>$request->menu_en,
                'slug_az'=>str_slug($request->menu_az),
                'slug_en'=>str_slug($request->menu_en),
                'src'=>$src,
                'title_az'=>$request->title_az,
                'title_en'=>$request->title_en,
                'button_az'=>$request->button_az,
                'button_en'=>$request->button_en,
                'link'=>$request->link,
                'text_az'=>$request->text_az,
                'text_en'=>$request->text_en,
                'parent_id'=>$request->menu_id,
            ]);
        }
        else
        {
            $menu->update([
                'menu_az'=>$request->menu_az,
                'menu_en'=>$request->menu_en,
                'src'=>$src,
                'title_az'=>$request->title_az,
                'title_en'=>$request->title_en,
                'button_az'=>$request->button_az,
                'button_en'=>$request->button_en,
                'link'=>$request->link,
                'text_az'=>$request->text_az,
                'text_en'=>$request->text_en,
                'parent_id'=>$request->menu_id,
            ]);
        }

        toastSuccess('Data updated successfully');
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function menuDeleter($id)
    {
        $menu = Menu::findOrFail($id);
        foreach ($menu->children as $child)
        {
            $this->fileDelete('files/menus/'.$child->src);
            $child->delete();
        }
        $this->fileDelete('files/menus/'.$menu->src);
        $menu->delete();

        toastSuccess('Data deleted successfully');
        return redirect()->route('menu.index');
    }

    public function shown($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update([
            'shown'=>$menu->shown ? 0 : 1
        ]);

        toastSuccess('Status changed successfully');
        return redirect()->route('menu.index');
    }
}
