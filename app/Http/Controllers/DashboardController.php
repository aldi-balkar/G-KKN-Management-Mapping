<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Activities;

class DashboardController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Dashboard';

        $data['lecturers'] = User::role('dosen')->count();
        $data['students'] = User::role('mahasiswa')->count();
        $data['activities'] = Activities::count();

        return view('dashboard', $data);
    }
}
