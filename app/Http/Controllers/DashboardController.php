<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        return view('dashboard.index');
    }
    public function calendar() {
        return view('dashboard.calendar');
    }

    public function schedule_save(Request $request) {

        $data['schedule'] = $request->schedule_data;
        $data['user_id'] = $request->tutor_id;

        return $data;
    }


}
