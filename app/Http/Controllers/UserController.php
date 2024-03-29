<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NotifDaftar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = User::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('avatar', function ($row) {
                    if ($row->avatar == null) {
                        return '<p class="text-danger">Belum Ada Avatar</p>';
                    } else {
                        if (file_exists('gambar/' . $row->avatar)) {
                            return '<img class="card-img-top" style="height: 120px; width: 120px; object-fit: cover; object-position: center;" src="gambar/' . $row->avatar . '" alt="avatar">';
                        } else {
                            return '<img class="card-img-top" style="height: 120px; width: 120px; object-fit: cover; object-position: center;" src="' . $row->avatar . '" alt="avatar">';
                        }
                    }
                })
                ->rawColumns(['avatar'])
                ->make(true);
        }

        return view('user.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->file('avatar')) {
            $extension = $request->avatar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('avatar')->move(public_path('gambar/'), $nama_file);

            $make_password = Str::random(8);
            $user = User::updateOrCreate([
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $nama_file,
                'password' => Hash::make($make_password)
            ]);
        } else {
            $make_password = Str::random(8);
            $user = User::updateOrCreate([
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($make_password)
            ]);
        }



        Mail::to($user->email)->send(new NotifDaftar($user, $make_password));

        toastr()->success('Berhasil menambah data user.', 'Sukses');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = User::find($request->id);

        if ($request->file('avatar')) {
            // Hapus Foto Lama
            $path = public_path('gambar/' . $data->avatar);
            if (file_exists($path)) {
                @unlink($path);
            }

            $extension = $request->avatar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('avatar')->move(public_path('gambar/'), $nama_file);

            $data->update([
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $nama_file,
            ]);
        } else {
            $data->update([
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        toastr()->success('Berhasil edit data user.', 'Sukses');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = User::find($id);
        return $data;
    }
}
