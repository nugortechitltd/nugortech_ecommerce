<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
// use App\Student;

class PrintController extends Controller
{
    // function order_view() {
    //       $students = Student::all();
    //       return view('printstudent')->with('students', $students);;
    // }
    // Order view
    function order_view($order_id) {
        $order_info = Order::find($order_id);
        return view('backend.order.order_view', [
            'order_info' => $order_info
        ]);
    }
}
