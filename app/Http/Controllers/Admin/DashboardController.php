<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Serasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Serasi::count();

        $byKategori = Serasi::selectRaw("kategori, COUNT(*) as jumlah")
            ->groupBy('kategori')
            ->pluck('jumlah', 'kategori');

        $byStatus = Serasi::selectRaw("status, COUNT(*) as jumlah")
            ->groupBy('status')
            ->pluck('jumlah', 'status');

        $byMonth = Serasi::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as bulan_format, DATE_FORMAT(created_at, '%M %Y') as bulan_label, COUNT(*) as jumlah")
            ->groupBy('bulan_format', 'bulan_label')
            ->orderBy('bulan_format')
            ->pluck('jumlah', 'bulan_label');


        return view('dashboard', compact('total', 'byKategori', 'byStatus', 'byMonth'));
    }
}
