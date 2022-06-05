<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\BlogImages;
use App\Traits\FileUploader;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use FileUploader;

    public function is_cover(Request $request)
    {
        $this->validate($request,[
           'id'=>'required|exists:blog_images,id'
        ]);
        $blog_image = BlogImages::findOrFail($request->id);
        BlogImages::where('blog_id',$blog_image->blog_id)->update([
           'is_cover'=>0
        ]);
        $blog_image->update([
            'is_cover'=>1
        ]);
    }

    public function blogList($menu_id)
    {
        return view('back.pages.blogs.index',[
            'blogs'=>Blog::latest()->where('menu_id',$menu_id)->get(),
            'menu_id'=>$menu_id
        ]);
    }

    public function blogCreate($menu_id)
    {
        return view('back.pages.blogs.create',[
            'menu_id'=>$menu_id
        ]);
    }

    public function blogEdit($menu_id, $id)
    {
        $blog = Blog::findOrFail($id);
        return view('back.pages.blogs.edit',[
            'menu_id'=>$menu_id,
            'id'=>$id,
            'blog'=>$blog
        ]);
    }

    public function blogPast($menu_id,$id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update([
            'past'=>$blog->past == 0 ? 1 : 0
        ]);

        toastSuccess('Status changed successfully');
        return redirect()->route('blog.list',['menu_id'=>$menu_id]);
    }

    public function blogImageDeleter($id)
    {
        $blog_image = BlogImages::findOrFail($id);
        $new_cover  = BlogImages::where('blog_id',$blog_image->blog_id)->where('id','!=',$blog_image->id)->first();
        if ($new_cover)
        {
            $new_cover->update([
                'is_cover'=>1
            ]);
        }
        $this->fileDelete('files/blogs/'.$blog_image->src);
        $blog_image->delete();

        toastSuccess('Data deleted successfully');
        return redirect()->back();
    }

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
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create([
            'menu_id'=>$request->menu_id,
            'title_az'=>$request->title_az,
            'title_en'=>$request->title_en,
            'slug_az'=>str_slug($request->title_az),
            'slug_en'=>str_slug($request->title_en),
            'intro_text_az'=>$request->intro_text_az,
            'intro_text_en'=>$request->intro_text_en,
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en
        ]);

        if ($request->menu_id == 8 || $request->menu_id == 9)
        {
            $names  = $this->multiFileSave('files/blogs/', $request, 'src');
            $i      = 0;
            foreach ($names as $name)
            {
                $is_cover       = 0;
                if ($i == 0)
                {
                    $is_cover   = 1;
                }

                BlogImages::create([
                    'blog_id'=>$blog->id,
                    'is_cover'=>$is_cover,
                    'src'=>$name
                ]);
                $i++;
            }
        }
        else
        {
            $src = $this->fileSave('files/blogs/',$request,'src');
            BlogImages::create([
                'blog_id'=>$blog->id,
                'is_cover'=>1,
                'src'=>$src
            ]);
        }


        toastSuccess('Data added successfully');
        return redirect()->route('blog.list',['menu_id'=>$request->menu_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update([
            'menu_id'=>$request->menu_id,
            'title_az'=>$request->title_az,
            'title_en'=>$request->title_en,
            'slug_az'=>str_slug($request->title_az),
            'slug_en'=>str_slug($request->title_en),
            'intro_text_az'=>$request->intro_text_az,
            'intro_text_en'=>$request->intro_text_en,
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en
        ]);

        if ($request->menu_id == 8 || $request->menu_id == 9)
        {
            $names  = $this->multiFileSave('files/blogs/', $request, 'src');
            if (count($names) > 0)
            {
                BlogImages::where('blog_id',$blog->id)->update([
                    'is_cover'=>0,
                ]);
            }
            $i      = 0;
            foreach ($names as $name)
            {
                $is_cover       = 0;
                if ($i == 0)
                {
                    $is_cover   = 1;
                }

                BlogImages::create([
                    'blog_id'=>$blog->id,
                    'is_cover'=>$is_cover,
                    'src'=>$name
                ]);
                $i++;
            }
        }
        else
        {

            if ($blog->images->count() == 0)
            {
                $src = $this->fileSave('files/blogs/',$request,'src');
                BlogImages::create([
                    'blog_id'=>$blog->id,
                    'is_cover'=>1,
                    'src'=>$src
                ]);
            }
            else
            {
                $src   = $this->fileUpdate($blog->images[0]->src, $request->hasFile('src'), $request->src, 'files/blogs/');
                BlogImages::where('blog_id',$blog->id)->update([
                    'is_cover'=>1,
                    'src'=>$src,
                ]);
            }
        }

        toastSuccess('Data updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        foreach ($blog->images  as $image)
        {
            $this->fileDelete('files/blogs/'.$image->src);
        }

        $blog->delete();
        toastSuccess('Data deleted successfully');
        return redirect()->back();
    }
}
