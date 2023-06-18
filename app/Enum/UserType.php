<?php

namespace App\Enum;

class UserType
{
    public const ID_SUPER_ADMIN = 1;
    public const ID_ADMIN = 2;
    public const ID_MEMBER = 3;

    public const LABEL_SUPER_ADMIN = 'Super Admin';
    public const LABEL_ADMIN = 'Admin';
    public const LABEL_MEMBER = 'Member';

    public static function allUserTypes()
    {
        return [
            self::ID_SUPER_ADMIN => self::LABEL_SUPER_ADMIN,
            self::ID_ADMIN => self::LABEL_ADMIN,
            self::ID_MEMBER => self::LABEL_MEMBER
        ];
    }
}
