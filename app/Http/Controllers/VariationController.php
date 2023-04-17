<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    //product_variation page
    function product_variation() {
        return view('backend.product.product_variation');
    }
    // Color
    function color(Request $request) {
        $request->validate([
            'color_name' => 'required|unique:colors',
            'color_code' => 'unique:colors',
        ]);
        Color::insert([
            'color_name' => $request->color_name,
            'color_code' => $request->color_code,
        ]);
        return back()->withSuccess('Color added successfully');
    }
    // Color delete
    function color_delete($color_id) {
        Color::find($color_id)->delete();
        return back()->withSuccess('Color deleted successfully');
    }
    // Size
    function size(Request $request) {
        $request->validate([
            'size_name' => 'unique:sizes'
        ]);
        if($request->size_name == null) {
            if(Size::where('size_name', null)->exists()) {
                return back()->with('taken', 'The size name has already been taken.');
            } else {
                $size_name = null;
            }
        } else {
            $size_name = $request->size_name;
        }
        Size::insert([
            'size_name' => $size_name,
        ]);
       
        
        return back()->withSuccess('Size added successfully');
    }
    // Color delete
    function size_delete($size_id) {
        Size::find($size_id)->delete();
        return back()->withSuccess('Size deleted successfully');
    }
    // variation list
    function variation_list() {
        $colors = Color::where('color_code', '!=', null)->get();
        $sizes = Size::where('size_name', '!=', null)->get();
        return view('backend.product.product_variation_list', [
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }
}
