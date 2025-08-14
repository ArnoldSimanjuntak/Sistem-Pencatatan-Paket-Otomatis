<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        // Mulai query untuk paket yang sudah diambil
        $query = Paket::where('status', 'Sudah Diambil');

        // Terapkan filter jika ada input kata kunci
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nama_penerima', 'like', "%{$search}%")
                  ->orWhere('nama_pengirim', 'like', "%{$search}%")
                  ->orWhere('kontak_pengirim', 'like', "%{$search}%")
                  ->orWhere('ekspedisi', 'like', "%{$search}%")
                  ->orWhere('nama_pengambil', 'like', "%{$search}%");
            });
        }

        // Terapkan filter berdasarkan tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('waktu_diambil', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
        }

        // Ambil data yang sudah difilter, urutkan dari yang terbaru, dan gunakan pagination
        $historyPaket = $query->latest('waktu_diambil')->paginate(10)->withQueryString();

        // Kirim data ke view
        return view('admin.history', compact('historyPaket'));
    }
}