<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

//    // Today Orders
//    public function todayOrder(){
//        $today = date('d-m-y');
//        $orders = Order::where('date',$today)->get();
//        return view('admin.report.today_order', compact('orders'));
//    }
//
//    // Today Delivery
//    public function todayDelivery(){
//        $today = date('y-m-d');
//        $orders = Order::where('status',3)->where('date',$today)->get();
//        return view('admin.report.today_delivery', compact('orders'));
//    }

//    // this month Orders
//    public function thisMonth(){
//        $month = date('F');
//        $orders = Order::where('month',$month)->get();
//        return view('admin.report.month', compact('orders'));
//    }
//
//    // this month Orders
//    public function thisYear(){
//        $year = date('Y');
//        $orders = Order::where('year',$year)->get();
//        return view('admin.report.year', compact('orders'));
//    }

    // Search Report
    public function searchReport(){
        return view('admin.report.search');
    }

    // Search by year
    public function searchByYear(Request $request){
        $year = $request->year;
        $total = Order::where('year',$year)->sum('total');
        $orders = Order::where('year',$year)->get();
        return view('admin.report.search_year', compact('orders', 'total'));
    }

    // Search by month
    public function searchByMonth(Request $request){
        $month = $request->month;
        $total = Order::where('month',$month)->sum('total');
        $orders = Order::where('month',$month)->get();
        return view('admin.report.month', compact('orders', 'total'));
    }

    // Search by date
    public function searchByDate(Request $request){
        $date = $request->date;
        $new_date = date('d-m-y', strtotime($date)); // Converts the date with format y-m-d into the format d-m-y
        $total = Order::where('date',$new_date)->sum('total');
        $orders = Order::where('date',$new_date)->get();
        return view('admin.report.search_date', compact('orders', 'total'));
    }







}
