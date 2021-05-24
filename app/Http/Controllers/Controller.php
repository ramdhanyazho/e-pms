<?php

namespace App\Http\Controllers;

use App\Bsc;
use App\Kpi;
use App\Kra;
use App\Company;
use App\Activiti;
use App\Division;
use App\Employee;
use App\Location;
use App\CostCenter;
use App\KpiTemplate;
use App\BusinessUnits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getMe() {
        return Employee::find(Auth::user()->id);
    }

    public function getPeriods() {
    	$currentYear = intval(date('Y'));
    	$result = array();
    	for ($i = $currentYear; $i >= $currentYear - 4; $i--) {
    		array_push($result, $i);
    	}
    	return $result;
    }

    public function getBusinessUnits() {
    	$bus = BusinessUnits::all();
    	$result = array();
    	foreach ($bus as $bu) {
    		$result[$bu->getId()] = $bu->getBusinessUnit();
    	}
    	return $result;
    }

    public function getCompanies() {
        $companies = Company::all();
        $result = array();
        foreach ($companies as $company) {
            $result[$company->getId()] = $company->getName();
        }
        return $result;
    }

    public function getLocations() {
        $locations = Location::all();
        $result = array();
        foreach ($locations as $loc) {
            $result[$loc->getId()] = $loc->getName();
        }
        return $result;
    }

    public function getLocationsByCompanyId($companyId) {

        $locations = DB::select('SELECT DISTINCT u.location_id, l.name FROM users u
                        LEFT JOIN locations l ON u.location_id = l.id
                        WHERE u.company_id = ' . $companyId . '
                        ORDER BY l.name ASC');

        $result = array();
        foreach ($locations as $loc) {
            $result[$loc->location_id] = trim($loc->name);
        }

        return $result;
    }



    public function getOrgUnits() {
        $orgUnits = Division::all();
        $result = array();
        foreach ($orgUnits as $ou) {
            $result[$ou->getId()] = $ou->getName();
        }
        return $result;
    }

    public function getCostCenters() {
        $costCenters = CostCenter::all();
        $result = array();
        foreach ($costCenters as $cc) {
            $result[$cc->getId()] = $cc->getName();
        }
        return $result;
    }

    public function getCostCentersByCompany($companyId) {
        $costcenters = DB::select('SELECT DISTINCT u.costcenter_id, cc.name FROM users u
                        LEFT JOIN costcenters cc ON u.costcenter_id = cc.id
                        WHERE u.company_id = ' . $companyId . '
                        ORDER BY cc.name ASC');

        $result = array();
        foreach ($costcenters as $cc) {
            $result[$cc->costcenter_id] = trim($cc->name);
        }

        return $result;
    }

    public function getCostCentersByLocation($locationId) {
        $costcenters = DB::select('SELECT DISTINCT u.costcenter_id, cc.name FROM users u
                        LEFT JOIN costcenters cc ON u.costcenter_id = cc.id
                        WHERE u.location_id = ' . $locationId . '
                        ORDER BY cc.name ASC');

        $result = array();
        foreach ($costcenters as $cc) {
            $result[$cc->costcenter_id] = trim($cc->name);
        }

        return $result;
    }


    public function getStatus() {
        $result = array();
        $result[1] = 'Contract';
        $result[2] = 'Permanent';
        return $result;
    }

    protected function recordActivity($action) {
        try {
            Activiti::record($action);
        } catch (Exception $e) {
            // do nothing
        }
    }

    protected function intToMonth($int) {
        $months = [1 => 'January',
                    2 => 'February',
                    3 => 'March',
                    4 => 'April',
                    5 => 'May',
                    6 => 'June',
                    7 => 'July',
                    8 => 'August',
                    9 => 'September',
                    10 => 'October',
                    11 => 'November',
                    12 => 'December'];

        return $months[$int];
    }

	protected function isNIKExist($nik) {
		$nikObj = Employee::where('nik', $nik)->first();
		if ($nikObj != null) return true;
		return false;
    }
    
	protected function getBSC($bscName) {
		$bsc = Bsc::where('name', $bscName)->first();
		if ($bsc != null) return $bsc->getId();
		$newBsc = new Bsc;
		$newBsc->name = $bscName;
		$newBsc->save();
		return $newBsc->id;
	}

	protected function getKRA($kraName) {
		$kra = Kra::where('name', $kraName)->first();
		if ($kra != null) return $kra->getId();
		$newKra = new Kra;
		$newKra->name = $kraName;
		$newKra->save();
		return $newKra->id;
	}

	protected function getKPI($kpiName) {
		$kpi = Kpi::where('name', $kpiName)->first();
		if ($kpi != null) return $kpi->getId();
		$newKpi = new Kpi;
		$newKpi->name = $kpiName;
		$newKpi->save();
		return $newKpi->id;
    }

    protected function getPositionId($nik) {
        $employee = Employee::where('nik', $nik)->first();
        if ($employee == null) return 0;
        return $employee->getPositionId();
    }

    protected function getKpiTemplateId($bsc, $kpi, $positionId) {
        $kpiTemplateId = KpiTemplate::where('bsc_id', $bsc)
                                    ->where('kpi_id', $kpi)
                                    ->where('position_id', $positionId)
                                    ->first();
        if ($kpiTemplateId != null) return $kpiTemplateId->getId();
        return 0;
    }

    protected function getIdFromNIK($nik) {
        $nikObj = Employee::where('nik', $nik)->first();
        return $nikObj->getId();
    }
}
