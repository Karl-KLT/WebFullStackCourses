<?php

namespace App\Constants;

final class GenderTypes
{
    const MALE = 'male'; // client user
    const FEMALE = 'female'; // admin user

    public static function getList()
    {
        return [
            GenderTypes::MALE => trans('translation.male'),
            GenderTypes::FEMALE => trans('translation.female')
        ];
    }

}
