<?php

namespace App\Http\Controllers\Stisla;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AutentikasiController extends Controller
{
	public function formMasuk()
	{
		return view('stisla.autentikasi.masuk');
	}

	public function masuk(Request $request)
	{
		$request->validate([
			'email'		=> 'required|exists:users',
			'password'	=> 'required',
		]);
		$user = User::where('email', $request->email)->first();
		$validator = \Validator::make($request->all(), [
			'password'	=> [
				function($attribute, $value, $fail){
					if(!\Hash::check($request->password, $user->password))
						$fail('Password yang anda masukkan salah');
				}
			]
		]);
		\Auth::login($user, $request->filled('remember'));
		if($request->query('redirect'))
			return redirect($request->query('redirect'));
		return redirect()->route('dashboard');
	}

	public function dashboard()
	{
		return view('stisla.dashboard.index', [
			'title'			=> 'Dashboard',
			'active'		=> 'dashboard',
		]);
	}

	public function keluar()
	{
		\Auth::logout();
		return redirect()->route('masuk');
	}

	public function profil()
	{
		return view('stisla.profil.index', [
			'title'		=> 'Profil',
			'active'	=> null,
			'd'			=> \Auth::user(),
			'action'	=> route('profil.update'),
		]);
	}

	public function perbaruiProfil(Request $request)
	{
		$user = \Auth::user();
		$request->validate([
			'nama'			=> 'required',
			'email'			=> 'required|unique:users,email,'.$user->id,
			'password'		=> 'nullable|min:5',
		]);
		$user->nama = $request->nama;
		$user->email = $request->email;
		if($request->filled('password'))
			$user->password = $request->password;
		$user->save();
		return redirect()->back()->with('success_msg', 'Profil berhasil diperbarui');
	}
}
