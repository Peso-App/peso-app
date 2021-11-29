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
        $response = Http::get('https://ibnux.github.io/data-indonesia/provinsi.json');
        $data = $response->json();
        return view('profile', compact('user', 'data'));
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->provinsi = $request->input('provinsi');
        $user->kab_kota = $request->input('kabKota');
        $user->no_hp = $request->input('number');
        $user->keahlian = $request->input('skill');

        $user->save();
        return redirect('profile')->with('status', 'change profile success');
    }
}
