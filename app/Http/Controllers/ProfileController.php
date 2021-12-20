<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required'],
            'provinsi' => ['required'],
            'kabKota' => ['required'],
            'number' => ['required'],
            'jenisBank' => ['required'],
            'noRek' => ['required'],
        ]);

        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->provinsi = $request->input('provinsi');
        $user->kab_kota = $request->input('kabKota');
        $user->no_hp = $request->input('number');
        $user->keahlian = $request->input('skill');
        $user->jenis_bank = $request->input('jenisBank');
        $user->no_rek = $request->input('noRek');

        $user->save();
        return redirect('profile')->with('status', 'change profile success');
    }
}
