<?php

namespace App\Http\Controllers;

use App\Bsc;
use App\BusinessUnits;
use App\Company;
use App\CostCenter;
use App\Division;
use App\Employee;
use App\EmployeeKpis;
use App\Golongan;
use App\Kpi;
use App\KpiHistory;
use App\KpiTemplate;
use App\Kra;
use App\Location;
use App\Pangkat;
use App\Position;
use App\ReviewSchedule;
use DateTime;
use Illuminate\Support\Facades\Hash;

class UploadController extends Controller
{
    private function getNIK($nik) {return $nik;}
    
    public function resetPassword($nik, $newpass) {
        $emp = Employee::where('nik', $nik)->first();

        if ($emp != null) {
            $emp->password = Hash::make($newpass);
            $emp->save();
            echo "Changed.";
        } else {
            echo "NIK not found.";
        }
    }
	
	private function getName($name) {return $name;}

	private function getEmployeeStatus($status) {
		if (strcasecmp($status, 'tetap') == 0) {
			return 2;
		}
		return 1;
	}

	private function getLocation($location) {
		$loc = Location::where('name', $location)->first();
		if ($loc != null) return $loc->getId();
		$newloc = new Location;
		$newloc->name = $location;
		$newloc->save();
		return $newloc->id;
	}

	private function getBusinessUnit($bu) {
		$businessUnit = BusinessUnits::where('name', $bu)->first();
		if ($businessUnit != null) return $businessUnit->getId();
		$newBU = new BusinessUnits;
		$newBU->name = $bu;
		$newBU->save();
		return $newBU->id;
	}

	private function getCompany($company) {
		$cmpny = Company::where('name', $company)->first();
		if ($cmpny != null) return $cmpny->getId();
		$newCompany = new Company;
		$newCompany->name = $company;
		$newCompany->save();
		return $newCompany->id;
	}

	private function getJoinDate($joinDate) {
		if (strlen($joinDate) > 0) {
			return DateTime::createFromFormat("d/m/y", $joinDate);
		}
		return null;
	}

	private function getQuitDate($quitDate) {
		if (strlen($quitDate) == 0) {
			return null;
		}
		return DateTime::createFromFormat("d/m/y", $quitDate);
	}

	private function getCostCenter($costCenter) {
		$cc = CostCenter::where('name', $costCenter)->first();
		if ($cc != null) return $cc->getId();
		$newCC = new CostCenter;
		$newCC->name = $costCenter;
		$newCC->save();
		return $newCC->id;
	}

	private function getContractStart($contractStart) {
		if (strlen($contractStart) == 0) {
			return null;
		}
		return DateTime::createFromFormat("d/m/y", $contractStart);
	}

	private function getContractEnded($contractEnded) {
		if (strlen($contractEnded) == 0) {
			return null;
		}
		return DateTime::createFromFormat("d/m/y", $contractEnded);
	}

	private function getEmail($email) {
		return $email;
	}

	private function getPangkat($pangkat) {
		$pkt = Pangkat::where('name', $pangkat)->first();
		if ($pkt != null) return $pkt->getId();
		$newPkt = new Pangkat;
		$newPkt->name = $pangkat;
		$newPkt->save();
		return $newPkt->id;
	}

	private function getGolongan($golongan) {
		$glg = Golongan::where('name', $golongan)->first();
		if ($glg != null) return $glg->getId();
		$newGlg = new Golongan;
		$newGlg->name = $golongan;
		$newGlg->save();
		return $newGlg->id;
	}

	private function getOrgUnit($orgUnit) {
		$div = Division::where('name', $orgUnit)->first();
		if ($div != null) return $div->getId();
		$newDiv = new Division;
		$newDiv->name = $orgUnit;
		$newDiv->save();
		return $newDiv->id;
	}

	private function getPosition($position) {
		$pos = Position::where('name', $position)->first();
		if ($pos != null) return $pos->getId();
		$newPos = new Position;
		$newPos->name = $position;
		$newPos->save();
		return $newPos->id;
	}

	private function getLevel($level) {
		// Empty because it's the same as golongan
	}

	private function getSuperOrdinateNIK($superordinateNIK) {
		return $superordinateNIK;
	}

	public function uploadEmployee() {
		$filename = storage_path('app/employee_data.csv');
		if (($handle = fopen($filename, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
				if ($data[0] == 'NIK') continue;
				$nik = $this->getNIK(trim($data[0]));
				if ($this->isNIKExist(trim($nik))) continue;
				$name = $this->getName(trim($data[1]));
				$status = $this->getEmployeeStatus(trim($data[2]));
				$locationId = $this->getLocation(trim($data[3]));
				$businessUnitId = $this->getBusinessUnit(trim($data[4]));
				$companyId = $this->getCompany(trim($data[5]));
				$joinDate = $this->getJoinDate(trim($data[6]));
				$quitDate = $this->getQuitDate(trim($data[7]));
				$costCenterId = $this->getCostCenter(trim($data[8]));
				$contractStart = $this->getContractStart(trim($data[9]));
				$contractEnded = $this->getContractEnded(trim($data[10]));
				$email = $this->getEmail(trim($data[11]));
				$pangkat = $this->getPangkat(trim($data[12]));
				$golongan = $this->getGolongan(trim($data[13]));
				$orgUnitId = $this->getOrgUnit(trim($data[14]));
				$title = $this->getPosition(trim($data[15]));
				$level = $this->getLevel(trim($data[16]));
				$superordinateId = null;
				$superordinateNIK = $this->getSuperOrdinateNIK(trim($data[17]));

				$em = new Employee;
				$em->name = $name;
				$em->email = $email;
				$em->nik = $nik;
				$em->level = 1;
				$em->group_id = 1;
				$em->position_id = $title;
				$em->status = $status;
				$em->business_unit_id = $businessUnitId;
				$em->org_unit_id = $orgUnitId;
				$em->location_id = $locationId;
				$em->join_date = $joinDate;
				$em->quit_date = $quitDate;
				$em->contract_start = $contractStart;
				$em->contract_ended = $contractEnded;
				$em->title = $data[15];
				$em->company_id = $companyId;
				$em->costcenter_id = $costCenterId;
				$em->pangkat_id = $pangkat;
				$em->golongan_id = $golongan;
				$em->superordinate_nik = $superordinateNIK;
				$em->password = Hash::make(env('PASSWORD_DEFAULT_FOR_ALL_USERS'));
				$em->acl_assigned_id = env('ACL_ASSIGNED_ID_DEFAULT');
				$em->save();
			}
			fclose($handle);
		}
	}

	private function getKPIPosition($position) {
		if ($position == 'ALL POSITION') return null;

		$pos = Position::where('name', $position)->first();
		if ($pos != null) return $pos->getId();
		$newPos = new Position;
		$newPos->name = $position;
		$newPos->save();
		return $newPos->id;		
	}

	public function uploadKPI() {
		$filename = storage_path('app/kpi_data.csv');
		if (($handle = fopen($filename, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
				$bsc = $this->getBSC($data[0]);
				$kra = $this->getKRA($data[1]);
				$kpi = $this->getKPI($data[2]);
				$position = $this->getKPIPosition($data[3]);

				$kpiTemplate = new KpiTemplate;
				$kpiTemplate->location_id = 1;
				$kpiTemplate->business_unit_id = 1;
				$kpiTemplate->division_id = 1;
				$kpiTemplate->department_id = 1;
				$kpiTemplate->is_protected = false;
				$kpiTemplate->bsc_id = $bsc;
				$kpiTemplate->kra_id = $kra;
				$kpiTemplate->kpi_id = $kpi;
				$kpiTemplate->position_id = $position;
				$kpiTemplate->save();
			}
			fclose($handle);
		}
	}

	public function truncateAllTables($password) {
		if ($password == env('PASSWORD_FOR_TRUNCATE_ALL_TABLES')) {
			Bsc::truncate();
			BusinessUnits::truncate();
			Company::truncate();
			CostCenter::truncate();
			Division::truncate();
			Employee::truncate();
			EmployeeKpis::truncate();
			KpiHistory::truncate();
			Golongan::truncate();
			Kpi::truncate();
			Kra::truncate();
			Location::truncate();
			Pangkat::truncate();
			Position::truncate();
			KpiTemplate::truncate();
			ReviewSchedule::truncate();
			echo 'Done';
		} else {
			echo "Nothing to see here. Go.";
		}
    }
    
}