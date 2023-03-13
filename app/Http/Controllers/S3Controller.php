<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;

class S3Controller extends Controller
{
    public function index()
    {
        $images = [];
        $files = Storage::disk('s3')->files('images');
        foreach ($files as $file) {
            $url = $this->getImageUrl($file);
            $images[] = [
                'name' => str_replace('images/', '', $file),
                'src' => $url
            ];
        }
        return view('upload-s3', compact('images'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'images/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
        }

        return back()->withSuccess('Image uploaded successfully');
    }

    public function destroy($image)
    {
        Storage::disk('s3')->delete('images/' . $image);

        return back()->withSuccess('Image was deleted successfully');
    }

    public function getImageUrl($key)
    {
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => config('s3.aws_default_region'),
        ]);

        return $s3->getObjectUrl(config('s3.aws_bucket'), $key);
    }
}
