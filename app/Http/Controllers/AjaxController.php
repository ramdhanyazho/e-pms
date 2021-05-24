<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
	public function getLocationByCompany($companyId) {
		$locations = DB::select('SELECT DISTINCT u.location_id, l.name FROM users u
						LEFT JOIN locations l ON u.location_id = l.id
						WHERE u.company_id = ' . $companyId . '
						ORDER BY l.name ASC');

		return response()->json(json_encode($locations), 200);
	}
}
