<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtikelFormRequest;
use App\Models\tb_artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = tb_artikel::orderBy('id', 'desc')->paginate(5);
        return view('admin.dashboard', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtikelFormRequest $request)
    {
        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        $data = $request->all();

        tb_artikel::create([
            'image' => $image->hashName(),
            'link' => $data['link'],
            'nama_resto' => $data['nama_resto'],
            'judul_artikel' => $data['judul_artikel'],
            'isi_artikel' => $data['isi_artikel'],
            'status_publish' => $data['status_publish'],

        ]);

        return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = tb_artikel::find($id);
        return view('admin.edit', [
            "data" => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArtikelFormRequest $request, string $id)
    {
        // Temukan data dengan ID yang diberikan
        $data = tb_artikel::find($id);

        // Validasi data yang diterima dari formulir
        $validatedData = $request->validated();

        // Check apakah ada file gambar yang diupload
        if ($request->hasFile('image')) {
            // Menghapus gambar yang lama
            Storage::delete('public/images/' . $data->image);

            // Upload gambar yang baru
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

            // Update data dengan informasi gambar yang baru
            $data->update([
                'image' => $image->hashName(),
                'link' => $validatedData['link'],
                'nama_resto' => $validatedData['nama_resto'],
                'judul_artikel' => $validatedData['judul_artikel'],
                'isi_artikel' => $validatedData['isi_artikel'],
                'status_publish' => $validatedData['status_publish'],
            ]);
        } else {
            // Jika tidak ada file gambar yang diupload, tetapkan nama gambar yang sudah ada
            $data->update([
                'link' => $validatedData['link'],
                'nama_resto' => $validatedData['nama_resto'],
                'judul_artikel' => $validatedData['judul_artikel'],
                'isi_artikel' => $validatedData['isi_artikel'],
                'status_publish' => $validatedData['status_publish'],
            ]);
        }

        // Redirect ke rute yang diinginkan dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Data berhasil diperbarui');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = tb_artikel::find($id)->delete();
        return redirect()->route('dashboard')->with('success', 'Data berhasil Dihapus');

    }
}
