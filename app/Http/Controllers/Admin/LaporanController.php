<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pembelian()
    {
        $data = [
            'title' => 'Pembelian'
        ];

        return view('admin.laporan.pembelian',$data);
    }
}
