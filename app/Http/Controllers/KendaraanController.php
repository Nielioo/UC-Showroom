<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\Motor;
use App\Models\Truck;
use App\Models\User;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $kendaraans = Kendaraan::all();
        // $mobils = $kendaraans[3]->jenis_kendaraan;

        $kendaraans = Kendaraan::all();
        return view('kendaraans.index', compact('kendaraans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kendaraans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'model' => 'required',
            'tahun' => 'required|digits:4',
            'jumlah_penumpang' => 'required|digits_between:1,2',
            'manufaktur' => 'required',
            'harga' => 'required|digits_between:1,14',
        ]);

        // check if the jenis_kendaraan_type is Mobil or Motor or Truck
        $current_jenis_kendaraan_type = $request->input('jenis_kendaraan_type');
        if ($current_jenis_kendaraan_type == 'Mobil') {

            $mobilValidated = $request->validate([
                'tipe_bahan_bakar' => 'required',
                'luas_bagasi' => 'required',
            ]);
            $mobil = Mobil::create($mobilValidated);
            $validated['jenis_kendaraan_id'] = $mobil['id'];
            $validated['jenis_kendaraan_type'] = 'App\\Models\\Mobil';

            Kendaraan::create($validated);

        } elseif ($current_jenis_kendaraan_type == 'Motor') {
            $motorValidated = $request->validate([
                'kapasitas_bensin' => 'required',
                'ukuran_bagasi' => 'required',
            ]);
            $motor = Motor::create($motorValidated);
            $validated['jenis_kendaraan_id'] = $motor['id'];
            $validated['jenis_kendaraan_type'] = 'App\\Models\\Motor';

            Kendaraan::create($validated);

        } elseif ($current_jenis_kendaraan_type == 'Truck') {
            $truckValidated = $request->validate([
                'jumlah_roda_ban' => 'required',
                'luas_area_kargo' => 'required',
            ]);
            $truck = Truck::create($truckValidated);
            $validated['jenis_kendaraan_id'] = $truck['id'];
            $validated['jenis_kendaraan_type'] = 'App\\Models\\Truck';

            Kendaraan::create($validated);

        }

        return redirect(route('kendaraans.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kendaraan = Kendaraan::find($id);
        return view('kendaraans.show', compact('kendaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kendaraan = Kendaraan::find($id);
        return view('kendaraans.edit', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'model' => 'required',
            'tahun' => 'required|digits:4',
            'jumlah_penumpang' => 'required|digits_between:1,2',
            'manufaktur' => 'required',
            'harga' => 'required',
        ]);
        $kendaraan = Kendaraan::find($id);

        $kendaraan->update($validated);

        // check if the jenis_kendaraan_type is Mobil or Motor or Truck
        $current_jenis_kendaraan_type = $kendaraan->jenis_kendaraan_type;
        if ($current_jenis_kendaraan_type == 'App\\Models\\Mobil') {

            $mobilValidated = $request->validate([
                'tipe_bahan_bakar' => 'required',
                'luas_bagasi' => 'required',
            ]);
            $mobil = Mobil::find($kendaraan->jenis_kendaraan->id);
            $mobil->update($mobilValidated);

        } elseif ($current_jenis_kendaraan_type == 'App\\Models\\Motor') {
            $motorValidated = $request->validate([
                'kapasitas_bensin' => 'required',
                'ukuran_bagasi' => 'required',
            ]);
            $motor = Motor::find($kendaraan->jenis_kendaraan->id);
            $motor->update($motorValidated);

        } elseif ($current_jenis_kendaraan_type == 'App\\Models\\Truck') {
            $truckValidated = $request->validate([
                'jumlah_roda_ban' => 'required',
                'luas_area_kargo' => 'required',
            ]);
            $truck = Truck::find($kendaraan->jenis_kendaraan->id);
            $truck->update($truckValidated);

        }

        return redirect(route('kendaraans.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan->jenis_kendaraan->delete();
        $kendaraan->delete();

        return redirect(route('kendaraans.index'));
    }
}
