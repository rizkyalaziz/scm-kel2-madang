<?php

namespace App\Http\Controllers;

use App\Models\DataSuplier;
use Illuminate\Http\Request;

class DataSuplierController extends Controller
{
    public function index()
    {
        // Ambil semua data supplier dan kirim ke view supplierdata
        $dataSupliers = DataSuplier::all();
        return view('supplierdata', compact('dataSupliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string',
        ]);
        $suplier = DataSuplier::create($validated);
        return redirect()->route('supplierdata')->with('success', 'Data supplier berhasil ditambahkan!');
    }

    public function show($id)
    {
        $suplier = DataSuplier::findOrFail($id);
        return response()->json($suplier);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string',
        ]);
        $suplier = DataSuplier::findOrFail($id);
        $suplier->update($validated);
        return redirect()->route('supplierdata')->with('success', 'Data supplier berhasil diupdate!');
    }

    public function destroy($id)
    {
        $suplier = DataSuplier::findOrFail($id);
        $suplier->delete();
        return redirect()->route('supplierdata')->with('success', 'Data supplier berhasil dihapus!');
    }
}