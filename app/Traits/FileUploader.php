<?php


namespace App\Traits;


use Illuminate\Support\Facades\File;

Trait FileUploader
{
    // $src = $this->fileSave('files/categories/',$request,'inputName');
    public function fileSave($path, $request, $inputName)
    {
        $name = null;
        if ($request->hasFile($inputName))
        {
            $file   = $request->{$inputName};
            $name   = $file->hashName();
            $file->move(public_path($path), $name);
        }
        return $name;
    }

    // $this->fileDelete('files/categories/'.$category->src);
    public function fileDelete($path)
    {
        if (File::exists(public_path($path)))
        {
            File::delete(public_path($path));
        }

        return true;
    }

    // $src   = $this->fileUpdate($category->src, $request->hasFile('foto'), $request->foto, 'files/categories/');
    public function fileUpdate($name, $fileSend, $file, $path)
    {
        if ($fileSend)
        {
            if (File::exists(public_path($path.$name)))
            {
                File::delete(public_path($path.$name));
            }

            $name   = $file->hashName();
            $file->move(public_path($path), $name);
        }

        return $name;
    }
}
