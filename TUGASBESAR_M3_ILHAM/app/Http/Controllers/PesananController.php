<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function index() {
        $data = Pesanan::orderBy('id', 'desc')->get();
        return view('pesanan.index', compact('data'));
    }

    public function store(Request $request) {
        Pesanan::create([
            'nama' => $request->nama,
            'whatsapp' => $request->wa,
            'layanan' => $request->layanan,
            'berat' => $request->berat
        ]);
        return redirect()->route('pesanan.index');
    }

    public function edit($id) {
        $d = Pesanan::findOrFail($id);
        return view('pesanan.edit', compact('d'));
    }

    public function update(Request $request, $id) {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update([
            'nama' => $request->nama,
            'whatsapp' => $request->wa,
            'layanan' => $request->layanan,
            'berat' => $request->berat
        ]);
        return redirect()->route('pesanan.index');
    }

    public function destroy($id) {
        Pesanan::findOrFail($id)->delete();
        return redirect()->route('pesanan.index');
    }
}