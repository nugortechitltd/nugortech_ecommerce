<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class DealController extends Controller
{
    //deal
    function deal() {
        $deals = Deal::all();
        return view('backend.deal.deal', [
            'deals' => $deals,
        ]);
    }

    // deal_store
    function deal_store(Request $request) {
        $request->validate([
            'title' => 'required',
            'content1' => 'required',
            'content2' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);
        $uploaded_file_one = $request->image;
        $extension = $uploaded_file_one->getClientOriginalExtension();
        $file_name_one = 'Poster'.'-'.rand(1000, 9999).'.'.$extension;
        Image::make($uploaded_file_one)->resize(1440, 570)->save(public_path('uploads/deal/'.$file_name_one));
        Deal::insert([
            'title' => $request->title,
            'content1' => $request->content1,
            'content2' => $request->content2,
            'description' => $request->description,
            'image' => $file_name_one,
            'created_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Deal added successfully');
    }

    // deal_delete
    function deal_delete($deal_id) {
        $preview_image_one = Deal::where('id', $deal_id)->get();
        $delete_preview_one = public_path('uploads/deal/'. $preview_image_one->first()->image);
        unlink($delete_preview_one);
        Deal::find($deal_id)->delete();
        return back()->withSuccess('Deal deleted successfully');
    }
}
