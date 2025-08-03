<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filterDate = $request->query('date');
        $users = User::with(['comments' => function($query) use ($filterDate) {
            if ($filterDate) {
                $query->where('comment_date', $filterDate);
            }
            $query->with('bibleReading');
        }])->get();
        return view('dashboard.index', compact('users', 'filterDate'));
    }
}