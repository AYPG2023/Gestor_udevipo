<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $userCount = User::count();
        $fileCount = 0; // Solo si ya tenés el modelo. Si no, ponelo en 0 por ahora.

        return view('dashboard', compact('userCount', 'fileCount'));
    }
}
