<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Cookie;

class AdminController extends Controller
{
    // Login
    public function login()
    {
        return view('login');
    }

    // Check Login
    public function check_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Retrieve user by email
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            if ($request->has('rememberme')) {
                Cookie::queue('adminuser', $request->email, 1440);
                Cookie::queue('adminpwd', $request->password, 1440);
            }

            return redirect('admin');
        } else {
            return redirect('admin/login')->with('msg', 'Email atau password salah!');
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    public function dashboard(Request $request)
    {
        $bookings = Booking::selectRaw('count(id) as total_bookings, checkin_date')
                            ->groupBy('checkin_date')
                            ->get();
        $labels = [];
        $data = [];
        foreach ($bookings as $booking) {
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

        return view('dashboard', [
            'labels' => $labels,
            'data' => $data,
            'plabels' => $plabels,
            'pdata' => $pdata,
        ]);
    }
}
