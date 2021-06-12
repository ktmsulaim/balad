<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $applications = Application::count();
        $active_perc = (Application::active()->count() * 100) / $applications;
        $inactive_perc = (Application::where('status', 0)->count() * 100) / $applications;
        $total_amount = Payment::where(['status' => 1, 'type' => 1])->sum('amount');

        $total_amount = $total_amount / 100;

        $apps = Application::select([
            DB::raw('MONTHNAME(created_at) as month'),
            DB::raw('COUNT(*) as count'),
        ])
        ->where('status', 1)
        ->where('created_at', '>=', Carbon::now()->subMonths(6))
        ->groupBy('month')
        ->orderBy('month', 'DESC')
        ->get()
        ->toArray();
        
        $payments = Payment::select([
            DB::raw('MONTHNAME(created_at) as month'),
            DB::raw('SUM(amount / 100) as amount'),
        ])
        ->where(['status' => 1, 'type' => 1])
        ->where('created_at', '>=', Carbon::now()->subMonths(6))
        ->groupBy('month')
        ->orderBy('month', 'DESC')
        ->get()
        ->toArray();

        return view('admin.index', 
        ['applications' => $applications, 'active' => $active_perc, 'inactive' => $inactive_perc, 'amount' => $total_amount, 'apps' => $apps, 'payments' => $payments]);
    }
}
