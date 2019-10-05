<?php

namespace App\Traits;

use App\Helpers\DateFormatHelper;

Trait BaseModelTrait
{

    /**
     * Aplicar formato a campo "created_at"
     *
     * @param string $value
     * @return string
     */
    protected function getCreatedAtAttribute(string $value): string {
        return DateFormatHelper::convertFromSQLToSpecifiedFormat($value);
    }

    /**
     * Aplicar formato a campo "updated_at"
     *
     * @param string|null $value
     * @return string|null
     */
    protected function getUpdatedAtAttribute(?string $value): ?string {
        if($value){
            return DateFormatHelper::convertFromSQLToSpecifiedFormat($value);
        }

        return NULL;
    }

    /**
     * Aplicar formato a campo "deleted_at"
     *
     * @param string|null $value
     * @return string|null
     */
    protected function getDeletedAtAttribute(?string $value): ?string {
        if($value){
            return DateFormatHelper::convertFromSQLToSpecifiedFormat($value);
        }

        return NULL;
    }
}
