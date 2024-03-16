<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profil.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function password()
    {
        return view('profil.password');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $extension = $request->avatar->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;

        $data = User::find(auth()->user()->id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $nama_file,
        ]);

        toastr()->success('Data berhasil diubah!', 'Selamat');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
