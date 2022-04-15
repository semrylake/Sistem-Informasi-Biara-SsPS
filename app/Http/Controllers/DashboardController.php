<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $penghuni = count(Penghuni::all());
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $data = [
            'title' => "Dashboard",
            'jumlahpenghuni' => $penghuni,
            'today' => $today,
        ];
        return view('view_admin.dashboard', $data);
    }
}
