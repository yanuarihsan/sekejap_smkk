<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Package;
use App\Models\PPK;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    //

    public function index()
    {
        if (\auth()->user()->roles[0] == 'vendor') {
            $vendor = new VendorController();
            return $vendor->detailVendor(Auth::id());
        }
        return view('superuser/dashboard');
    }

    public function getAllCountUser()
    {
        $user = User::count('*');

        return $user;
    }

    public function getAllCountPackage()
    {
        $package = Package::count('*');

        return $package;
    }

    public function getAllCountPPK()
    {
        $ppk = PPK::count('*');

        return $ppk;
    }

    public function getAllCountIndikator()
    {
        $indikator = Indicator::count('*');

        return $indikator;
    }

    public function getAllCountData()
    {
        $data = [
            'user' => $this->getAllCountUser(),
            'package' => $this->getAllCountPackage(),
            'ppk' => $this->getAllCountPPK(),
            'indicator' => $this->getAllCountIndikator(),
        ];

        return $data;
    }

    public function datatable()
    {
        $tahun = \request()->query->get('tahun');
        $data = Package::with(['vendor.vendor', 'ppk']);
        if (Auth::user()->roles[0] == 'vendor') {
            $data = $data->where('vendor_id', '=', Auth::id());
        } elseif (Auth::user()->roles[0] == 'accessorppk') {
            $data = $data->whereHas('ppk.accessorppk', function ($query) {
                $query->where('user_id', '=', Auth::id());
            });
        }
        if ($tahun !== '') {
            $start = $tahun . '-01-01';
            $end = $tahun . '-12-31';
            $data->where(function ($query) use ($start, $end) {
                $query->whereBetween('start_at', [$start, $end])
                    ->orWhereBetween('finish_at', [$start, $end]);
            });
        }
        $data = $data->get();
        return DataTables::of($data)->make(true);

    }
}
