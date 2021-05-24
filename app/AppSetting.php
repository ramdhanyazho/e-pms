<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $table = 'appsettings';

    private const CURRENT_ACTIVE_KPI_YEAR = 'CURRENT_ACTIVE_KPI_YEAR';

    private static function GetSetting($settingName) {
        $setting = self::where('settings', $settingName)->first();
        if ($setting == null) {
            return '';
        }
        return $setting->setting_value;
    }

    public static function GetCurrentActiveKPIYear() {
        return self::GetSetting(self::CURRENT_ACTIVE_KPI_YEAR);
    }
}
