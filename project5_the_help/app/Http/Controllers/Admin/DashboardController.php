<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
// In DashboardController.php
public function index()
{
    // Payment Methods Count from bookings table
    $paymentStats = DB::table('bookings')
        ->join('payments', 'bookings.payment_id', '=', 'payments.id')
        ->selectRaw('payments.name, COUNT(*) as count')
        ->groupBy('payments.name')
        ->get()
        ->pluck('count', 'name')
        ->toArray();

    // Get the counts, defaulting to 0 if not found
    $visaCount = $paymentStats['visa'] ?? 0;
    $cashCount = $paymentStats['cash'] ?? 0;

    // Services Count
    $servicesCount = DB::table('services')->count();

    // Categories Count
    $categoriesCount = DB::table('categories')->count();

    // Reviews and Bookings Count
    $reviewsCount = DB::table('reviews')->count();
    $bookingsCount = DB::table('bookings')->count();

    // Monthly Data for Charts
    $sql_users = "SELECT MONTH(created_at) AS month, 
                  COUNT(*) AS user_count
                  FROM users
                  GROUP BY MONTH(created_at)
                  ORDER BY MONTH(created_at)";
    
    $result_users = DB::select($sql_users);

    $months = [];
    $user_counts = [];

    foreach ($result_users as $row) {
        $months[] = $row->month;
        $user_counts[] = $row->user_count;
    }

    // Provider counts per month
    $sql_providers = "SELECT MONTH(created_at) AS month, 
                     COUNT(*) AS provider_count
                     FROM providers
                     GROUP BY MONTH(created_at)
                     ORDER BY MONTH(created_at)";
    
    $result_providers = DB::select($sql_providers);
    $provider_counts = [];

    foreach ($result_providers as $row) {
        $provider_counts[] = $row->provider_count;
    }

    // Booking counts per month
    $sql_bookings = "SELECT MONTH(created_at) AS month, 
                     COUNT(*) AS booking_count
                     FROM bookings
                     GROUP BY MONTH(created_at)
                     ORDER BY MONTH(created_at)";
    
    $result_bookings = DB::select($sql_bookings);
    $booking_counts = [];

    foreach ($result_bookings as $row) {
        $booking_counts[] = $row->booking_count;
    }

    // Return all necessary variables
    return view('admin.dashboard', compact(
        'visaCount',
        'cashCount',
        'servicesCount',
        'categoriesCount',
        'reviewsCount',
        'bookingsCount',
        'months',
        'user_counts',
        'provider_counts',
        'booking_counts'
    ));
}
}
