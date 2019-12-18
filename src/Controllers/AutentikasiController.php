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
		return redirect()->route('dashboard');
	}
}
