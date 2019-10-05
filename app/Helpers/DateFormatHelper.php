<?php


namespace App\Helpers;


use Carbon\Carbon;

class DateFormatHelper
{
    CONST FORMAT_DATETIME_DEFAULT = 'Y-m-d H:i:s';
    CONST FORMAT_APPLICATION_DEFAULT = 'd/m/Y H:i:s';

    /**
     * Convertir fechas de SQL a formato especificado
     *
     * @param string|null $value
     * @param string $format
     * @return string|null
     */
    public static function convertFromSQLToSpecifiedFormat(string $value, $format = self::FORMAT_APPLICATION_DEFAULT): string {
        return Carbon::createFromFormat(self::FORMAT_DATETIME_DEFAULT, $value)
                    ->format(self::FORMAT_APPLICATION_DEFAULT);
    }
}
