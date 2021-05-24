<?php

namespace App;

use App\EmployeeKpis;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KPIExport implements FromView
{
    private $user = null;
    private $year = null;

    public function __construct($user, $year) {
        $this->user = $user;
        $this->year = $year;
    }

	public function view(): View
    {
        return view('downloads.kpi', [
            'user' => $this->user,
            'kpis' => EmployeeKpis::where('year', $this->year)->where('employee_id', $this->user->getId())->get(),
            'totalWeight' => 0,
            'totalScore' => 0,
            'year' => $this->year
        ]);
    }


}