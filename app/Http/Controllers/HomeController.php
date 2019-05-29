<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin', ['except' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the administration user list.
     *
     * @return \Illuminate\Http\Response
     */
    public function administration()
    {

        // Dohvaćamo sve korisnike koji nisu administratori
        $users = User::where('role', '<>', 'admin')->get();

        return view('administration', ['users' => $users]);
    }

    /**
     * Show the administration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function administrationSpecific($id)
    {
        // Dohvatimo korisnika pod tim id i koji nema role admin
        $user = User::where('id', $id)->where('role', '<>', 'admin')->first();

        // Ako takav ne postoji vratimo se nazad
        if(!$user)
            return redirect()->back();

        return view('administration_specific', ['user' => $user]);
    }

    public function administrationSave(Request $request)
    {
        // Dohvati korisnika
        $user = User::where('id', $request->input('id'))->first();

        // Postavi mu novu ulogu koju je korisnik odabrao i snimi
        $user->role = $request->input('role');
        $user->save();

        // Dodaj nešto u session (ovo će ispisat poruku nakon što se ažurira u pogledu)
        $request->session()->flash('success', "Korisnik '{$user->name}' uspješno ažuriran!");

        return redirect()->route('administration');
    }
}
