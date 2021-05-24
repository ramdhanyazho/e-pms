<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	public function __construct() {}

	public function registerAdmin() {
		$user = new User();
		$user->nik = 2222;
		$user->level = 1;
		$user->group_id = 1;
		$user->position_id = 1;
		$user->status = 'Permanent';
		$user->business_unit_id = 1;
		$user->org_unit_id = 1;
		$user->location_id = 1;
		$user->company_name = 'BMW';
		$user->join_date = '2019-01-01';
		$user->email = 'bawahan_admin@tunas.com';
		$user->password = Hash::make('123456');
		$user->name = 'Bawahan Admin Tunas';
		$user->reporting_id = 11;
		$user->save();
	}
}
