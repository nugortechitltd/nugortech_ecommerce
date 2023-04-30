<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderproduct;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $thisWeek = Carbon::today()->subDays(7);
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');


        // $users = App\Models\User::where('created_at','>=',$date)->get();
        // dd($users);

        $totalOrder = Orderproduct::count();
        $todayOrder = Orderproduct::whereDate('created_at', $todayDate)->count();

        $thisweekuser = User::whereDate('created_at','>=',$thisWeek)->count();
        $thisweekorder = Orderproduct::whereDate('created_at','>=',$thisWeek)->count();
        $thisMonthOrder = Orderproduct::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrder = Orderproduct::whereYear('created_at', $thisYear)->count();

        $totalUser = User::count();
        $todayUser = User::whereDate('created_at', $todayDate)->count();
        $thisMonthUser = User::whereMonth('created_at', $thisMonth)->count();
        $thisYearUser = User::whereYear('created_at', $thisYear)->count();

        // Sells
        $todaySells = Order::whereDate('created_at', $todayDate)->where('status', 4)->count();
        $thisweeksells = Order::whereDate('created_at','>=',$thisWeek)->where('status', 4)->count();
        $thisMonthsells = Order::whereMonth('created_at', $thisMonth)->where('status', 4)->count();
        $totalsells = Order::where('status', 4)->count();
        
        // Revenue
        $todayrevenue = Order::whereDate('created_at', $todayDate)->where('status', 4)->sum('total');
        $thisweekrevenue= Order::whereDate('created_at','>=',$thisWeek)->where('status', 4)->sum('total');
        $thisMonthrevenue = Order::whereMonth('created_at', $thisMonth)->where('status', 4)->sum('total');
        $totalrevenue = Order::where('status', 4)->sum('total');

        // All orders
        $confirmorders = Order::where('status', '0')->count();
        $processingorders = Order::where('status', '1')->count();
        $dispatchorders = Order::where('status', '2')->count();
        $ondeliveryorders = Order::where('status', '3')->count();
        $deliveredorders = Order::where('status', '4')->count();
        $cancelorders = Order::where('status', '5')->count();

        // order product
        $orders = Order::latest()->get();

        return view('home', [
            'totalOrder' => $totalOrder,
            'todayOrder' => $todayOrder,
            'thisweekorder' => $thisweekorder,
            'thisMonthOrder' => $thisMonthOrder,
            'thisYearOrder' => $thisYearOrder,
            'totalUser' => $totalUser,
            'todayUser' => $todayUser,
            'thisMonthUser' => $thisMonthUser,
            'thisYearUser' => $thisYearUser,
            'thisweekuser' => $thisweekuser,
            'todaySells' => $todaySells,
            'thisweeksells' => $thisweeksells,
            'thisMonthsells' => $thisMonthsells,
            'totalsells' => $totalsells,
            'todayrevenue' => $todayrevenue,
            'thisweekrevenue' => $thisweekrevenue,
            'thisMonthrevenue' => $thisMonthrevenue,
            'totalrevenue' => $totalrevenue,
            'confirmorders' => $confirmorders,
            'processingorders' => $processingorders,
            'dispatchorders' => $dispatchorders,
            'ondeliveryorders' => $ondeliveryorders,
            'deliveredorders' => $deliveredorders,
            'cancelorders' => $cancelorders,
            'orders' => $orders,
        ]);
    }
}
