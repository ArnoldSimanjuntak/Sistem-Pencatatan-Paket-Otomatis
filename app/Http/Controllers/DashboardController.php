<?php
// File: app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil paket yang masih di resepsionis, urutkan dari yang terbaru
        $paketDiResepsionis = Paket::where('status', 'Di Resepsionis')
                                    ->latest('waktu_tiba')
                                    ->paginate(10, ['*'], 'di_resepsionis');

        // Ambil riwayat paket yang sudah diambil, urutkan dari yang terbaru
        $riwayatPaket = Paket::where('status', 'Sudah Diambil')
                            ->latest('waktu_diambil')
                            ->paginate(10, ['*'], 'riwayat'); // Gunakan paginate untuk riwayat

        return view('dashboard_public', compact('paketDiResepsionis', 'riwayatPaket'));
    }
}