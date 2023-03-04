<?php

namespace App\Constants;

final class GenderTypes
{
    const MALE = 0; // client user
    const FEMALE = 1; // admin user

    public static function getList()
    {
        return [
            GenderTypes::MALE => trans('translation.male'),
            GenderTypes::FEMALE => trans('translation.female')
        ];
    }

}
