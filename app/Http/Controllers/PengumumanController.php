<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Mail\NotifPengumuman;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Pengumuman::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->make(true);
        }
        return view('pengumuman.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::all();
        $pengumuman = Pengumuman::create($request->all());
        foreach ($user as $user) {
            Mail::to($user->email)->send(new NotifPengumuman($user, $pengumuman));
        }

        toastr()->success('Berhasil menambah pengumuman.', 'Sukses');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pengumuman::find($request->id);
        $data->update($request->all());

        toastr()->success('Berhasil edit pengumuman.', 'Sukses');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengumuman::find($id)->delete();
        toastr()->success('Berhasil hapus pengumuman.', 'Sukses');
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Pengumuman::find($id);
        return $data;
    }
}
