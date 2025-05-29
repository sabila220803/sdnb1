<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Prestasi\StorePrestasiRequest;
use App\Http\Requests\Prestasi\UpdatePrestasiRequest;
use Illuminate\Http\Request;
use App\Models\Prestasi;
use Cloudinary;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $prestasis = Prestasi::when($search, function ($query) use ($search) {
            return $query
                ->where('nama_peserta', 'like', '%' . $search . '%')
                ->orWhere('nama_lomba', 'like', '%' . $search . '%')
                ->orWhere('juara', 'like', '%' . $search . '%')
                ->orWhere('tahun', 'like', '%' . $search . '%')
                ->orWhere('tingkat', 'like', '%' . $search . '%');
        })
            ->orderBy('created_at', 'DESC') // Order before pagination
            ->paginate(10); // Paginate comes last

        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function store(StorePrestasiRequest $request)
    {
        $data = $request->validated();

        $image = cloudinary()
            ->uploadApi()
            ->upload($data['foto']->getRealPath(), [
                'folder' => 'prestasi',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto',
                    'compression' => 'low',
                ],
            ]);
        if (!$image) {
            return redirect()->route('admin.prestasi.index')->with('error', 'Gagal mengunggah foto');
        }

        $result = Prestasi::create([
            'nama_peserta' => strtolower($data['nama_peserta']),
            'nama_lomba' => strtolower($data['nama_lomba']),
            'tingkat' => strtolower($data['tingkat']),
            'juara' => $data['juara'],
            'tahun' => $data['tahun'],
            'public_id' => $image['public_id'],
            'url_file' => $image['secure_url'],
        ]);
        if (!$result) {
            cloudinary()->uploadApi()->destroy($image['public_id']);
            return redirect()->route('admin.prestasi.index')->with('error', 'Gagal menambahkan prestasi');
        }

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return response()->json($prestasi);
    }

    public function update(UpdatePrestasiRequest $request, $id)
    {
        $data = $request->validated();

        $prestasi = Prestasi::findOrFail($id);
        if (!$prestasi) {
            return redirect()->route('admin.prestasi.index')->with('error', 'Prestasi tidak ditemukan');
        }
        
        $data = [
            'nama_peserta' => $data['nama_peserta'],
            'nama_lomba' => $data['nama_lomba'],
            'tingkat' => $data['tingkat'],
            'juara' => $data['juara'],
            'tahun' => $data['tahun'],
            'foto' => $data['foto'] ?? '',
        ];

        if ($data['foto']) {
            if ($prestasi->public_id) {
                $result = cloudinary()->uploadApi()->destroy($prestasi->public_id);
                if (!$result) {
                    return redirect()->route('admin.prestasi.index')->with('error', 'Gagal menghapus foto dari Cloudinary');
                }
            }

            $image = cloudinary()
                ->uploadApi()
                ->upload($data['foto']->getRealPath(), [
                    'folder' => 'prestasi',
                    'transformation' => [
                        'quality' => 'auto',
                        'fetch_format' => 'auto',
                        'compression' => 'low',
                    ],
                ]);
            if (!$image) {
                return redirect()->route('admin.prestasi.index')->with('error', 'Gagal mengunggah foto');
            }

            $data['public_id'] = $image['public_id'];
            $data['url_file'] = $image['secure_url'];
        }

        $result = $prestasi->update($data);
        if (!$result) {
            cloudinary()->uploadApi()->destroy($data['public_id']);
            return redirect()->route('admin.prestasi.index')->with('error', 'Gagal memperbarui prestasi');
        }

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        if (!$prestasi) {
            return redirect()->route('admin.prestasi.index')->with('error', 'Prestasi tidak ditemukan');
        }

        if ($prestasi->public_id) {
            $result = cloudinary()->uploadApi()->destroy($prestasi->public_id);
            if (!$result) {
                return redirect()->route('admin.prestasi.index')->with('error', 'Gagal menghapus foto dari Cloudinary');
            }
        }

        $result = $prestasi->delete();
        if (!$result) {
            return redirect()->route('admin.prestasi.index')->with('error', 'Gagal menghapus prestasi');
        }

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus');
    }
}
