<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
{
    //Banner
    function banner() {
        $banners = Banner::all();
        return view('backend.banner.banner', compact('banners'));
    }
    // banner_store
    function banner_store(Request $request) {
        $request->validate([
            'head' => 'required',
            'title' => 'required',
            'title2' => 'required',
            'desc' => 'required',
            'image' => 'required',
        ]);

        $banner_image = $request->image;
        $extension = $banner_image->getClientOriginalExtension();
        $file_name = 'Slider'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($banner_image)->resize(1140, 570)->save(public_path('uploads/hero/'.$file_name));

        Banner::insert([
            'head' => $request->head,
            'title' => $request->title,
            'title2' => $request->title2,
            'desc' => $request->desc,
            'image' => $file_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Banner successfully added.');
    }

    // banner_delete
    function banner_delete($banner_id) {
        $banner_image = Banner::where('id', $banner_id)->first()->image;
        $delete_from = public_path('uploads/hero/'.$banner_image);
        unlink($delete_from);
        Banner::find($banner_id)->delete();
        return back()->withSuccess('Banner deleted successfully.');
    }
}
