<?php

namespace App\Constants;

final class UserTypes
{
    const CLIENT = 0; // client user
    const ADMIN = 1; // admin user

    public static function getList()
    {
        return [
            UserTypes::CLIENT => trans('translation.client'),
            UserTypes::ADMIN => trans('translation.admin')
        ];
    }

}
