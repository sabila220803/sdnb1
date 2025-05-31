<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KalenderPendidikan as Kurikulum;
use App\Http\Requests\KalenderPendidikan\StoreRequest;
use App\Http\Requests\KalenderPendidikan\UpdateRequest;
use Illuminate\Contracts\Cache\Store;

class KurikulumController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $kurikulums = Kurikulum::when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('jenis', 'like', '%' . $search);
        })
            ->orderBy('created_at', 'DESC') // Order before pagination
            ->paginate(10); // Paginate comes last

        return view('admin.kurikulum.index', compact('kurikulums'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $file = Cloudinary()->uploadApi()->upload($data['file']->getRealPath(), [
            'folder' => 'KalenderPendidikan',
            'resource_type' => 'raw'
        ]);
        if (!$file) {
            return redirect()->back()->with('error', 'Gagal mengunggah file ke Cloudinary');
        }

        $result = Kurikulum::create([
            'nama' => strtolower($data['nama']),
            'jenis' => $data['jenis'],
            'public_id' => $file['public_id'],
            'url_file' => $file['secure_url'],
            'tahun_ajaran' => $data['tahun_ajaran_1'] . '/' . $data['tahun_ajaran_2']
        ]);
        if (!$result) {
            cloudinary()->uploadApi()->destroy($file['public_id'], [
                'resource_type' => 'raw'
            ]);
            return redirect()->back()->with('error', 'Gagal menyimpan data Kalender Pendidikan');
        }

        return redirect()->route('admin.kurikulum.index')->with('success', 'Dokumen Kalender Pendidikan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        return response()->json($kurikulum);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();

        $data['nama'] = strtolower($data['nama']);
        $data['tahun_ajaran'] = $data['tahun_ajaran_1'] . '/' . $data['tahun_ajaran_2'];
        unset($data['tahun_ajaran_1'], $data['tahun_ajaran_2']);
        $data['file'] = $data['file'] ?? '';

        $kurikulum = Kurikulum::findOrFail($id);

        if ($data['file']) {
            if ($kurikulum->public_id) {
                $result = cloudinary()->uploadApi()->destroy($kurikulum->public_id, [
                    'resource_type' => 'raw'
                ]);
                if (!$result) {
                    return redirect()->back()->with('error', 'Gagal menghapus file lama dari Cloudinary');
                }
            }

            $file = cloudinary()->uploadApi()->upload($data['file']->getRealPath(), [
                'folder' => 'KalenderPendidikan',
                'resource_type' => 'raw'
            ]);

            if (!$file) {
                return redirect()->back()->with('error', 'Gagal mengunggah file baru ke Cloudinary');
            }

            $data['public_id'] = $file['public_id'];
            $data['url_file'] = $file['secure_url'];
        }

        $result = $kurikulum->update($data);
        if (!$result) {
            cloudinary()->uploadApi()->destroy($file['public_id'], [
                'resource_type' => 'raw'
            ]);
            return redirect()->back()->with('error', 'Gagal memperbarui data Kalender Pendidikan');
        }

        return redirect()->route('admin.kurikulum.index')->with('success', 'Dokumen Kalender Pendidikan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kurikulum = Kurikulum::findOrFail($id);

        if ($kurikulum->public_id) {
            $file = cloudinary()->uploadApi()->destroy($kurikulum->public_id, [
                'resource_type' => 'raw',
            ]);
            if (!$file) {
                return redirect()->back()->with('error', 'Gagal menghapus file dari Cloudinary');
            }
        }

        $result = $kurikulum->delete();
        if (!$result) {
            return redirect()->back()->with('error', 'Gagal menghapus data Kalender Pendidikan');
        }

        return redirect()->route('admin.kurikulum.index')->with('success', 'Dokumen kalender pendidikan berhasil dihapus');
    }
}
