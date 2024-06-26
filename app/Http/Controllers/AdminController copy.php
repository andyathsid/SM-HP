<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
use Cookie;

class AdminController extends Controller
{

    protected $redirectTo = '/admin/login';
    // Login
    function login(){
        return view('login');
    }
    // Check Login
    function check_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $admin=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->first();
        if($admin){
            session(['adminData' => $admin]);
    
            if($request->has('rememberme')){
                Cookie::queue('adminuser', $request->username, 1440);
                Cookie::queue('adminpwd', $request->password, 1440);
            }
    
            return redirect('admin');
        } else {
            return redirect('admin/login')->with('msg', 'Username atau password salah!');
        }
    }
    
    // Logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }

    function dashboard(Request $request){
        $bookings = Booking::selectRaw('count(id) as total_bookings, checkin_date')
                            ->groupBy('checkin_date')
                            ->get();
        $labels = [];
        $data = [];
        foreach($bookings as $booking){
            $labels[] = $booking['checkin_date'];
            $data[] = $booking['total_bookings'];
        }
    
        // For Pie Chart
        $rtbookings = DB::table('room_types as rt')
            ->join('rooms as r', 'r.room_type_id', '=', 'rt.id')
            ->join('bookings as b', 'b.room_id', '=', 'r.id')
            ->select('rt.title', DB::raw('count(b.id) as total_bookings'))
            ->groupBy('r.room_type_id', 'rt.title')
            ->get();
        $plabels = [];
        $pdata = [];
        foreach ($rtbookings as $rbooking) {
            $plabels[] = $rbooking->title;
            $pdata[] = $rbooking->total_bookings;
        }

        $adminData = session('adminData');
    
        // Get admin data from session
        $adminData = session('adminData');
    
        return view('dashboard', [
            'labels' => $labels,
            'data' => $data,
            'plabels' => $plabels,
            'pdata' => $pdata,
        ]);
        
        return view('layout', [
            'adminUsername' => $adminData->username 
        ]);
    }    
}