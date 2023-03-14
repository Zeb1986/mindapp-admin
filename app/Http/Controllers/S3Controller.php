<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;

class S3Controller extends Controller
{
    public function index()
    {
        $feeds = Feed::latest('timestamp')->simplePaginate(10);
        return view('upload-s3', compact('feeds'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|max:2048',
            'feed_id' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filePath = 'images/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $feed_id = $request->input('feed_id');
            $url = $this->getImageUrl('images/' . $name);
            $feed = Feed::where('feed_id', $feed_id)->first();
            $feed->update(['image' => $url, 'img_path' => $filePath]);
        }

        return back()->withSuccess('Image uploaded successfully');
    }

    public function destroy($image)
    {
        Storage::disk('s3')->delete('images/' . $image);

        Feed::where('img_path', 'images/' .$image)->update(['image' => null, 'img_path' => null]);

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
