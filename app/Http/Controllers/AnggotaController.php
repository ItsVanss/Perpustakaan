<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;



class AnggotaController extends Controller
{
   
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request): RedirectResponse
    {
        $anggota = new anggota;

        $foto = $request->file('foto');
        $foto->storeAs('public/anggota', $foto->hashName());
        
        anggota::create([
            'kode' => $request->kode,
            'nama' =>  $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'foto' => $foto->hashName()
        ]);

        return redirect('anggota')->with('sukses', 'Data berhasil di simpan');
    }

    
    public function show(anggota $anggota)
    {
        //
    }

   
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.edit', compact('anggota'));
    }

    
    public function update(Request $request, $id): RedirectResponse
    {
        $anggota = Anggota::findOrFail($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto->storeAs('public/anggota/',$foto->hashName());

            //delete old foto
            // Storage::delate('public/anggota/'.$anggota->foto);

            //update anggota with new foto
            $anggota->update([
                'kode' => $request->kode,
                'nama' =>  $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'foto' => $foto->hashName()
            ]);
        }else{
            $anggota->update([
                'kode' => $request->kode,
                'nama' =>  $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat
            ]);
        }


        return redirect('anggota')->with('sukses', 'Data berhasil di update');
    }

   
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect('anggota')->with('sukses', 'Data berhasil di hapus');
    }
}