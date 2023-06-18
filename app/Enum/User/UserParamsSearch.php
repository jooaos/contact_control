<?php

namespace App\Enum\User;

final class UserParamsSearch
{
    public const LIKE_OPERATOR = 'like';
    public const EQUAL_OPERATOR = '=';
 
    public const NAME_PARAM = 'name';
    public const NAME_OPERATOR = self::LIKE_OPERATOR;
    public const NAME_DATABASE_FIELD = 'name';

    public const EMAIL_PARAM = 'email';
    public const EMAIL_OPERATOR = self::LIKE_OPERATOR;
    public const EMAIL_DATABASE_FIELD = 'email';

    public const BIRTH_DATE_PARAM = 'birth_date';
    public const BIRTH_DATE_OPERATOR = self::EQUAL_OPERATOR;
    public const BIRTH_DATE_DATABASE_FIELD = 'birth_date';

    public const COUNTRY_PARAM = 'country';
    public const COUNTRY_OPERATOR = self::LIKE_OPERATOR;
    public const COUNTRY_DATABASE_FIELD = 'country';

    public const CITY_PARAM = 'city';
    public const CITY_OPERATOR = self::LIKE_OPERATOR;
    public const CITY_DATABASE_FIELD = 'city';

    public const USER_TYPE_PARAM = 'user_type';
    public const USER_TYPE_OPERATOR = self::EQUAL_OPERATOR;
    public const USER_TYPE_DATABASE_FIELD = 'user_type_id';

    public static function getAvailableParams()
    {
        return [
            self::NAME_PARAM,
            self::EMAIL_PARAM,
            self::BIRTH_DATE_PARAM,
            self::COUNTRY_PARAM,
            self::CITY_PARAM,
            self::USER_TYPE_PARAM
        ];
    }

    public static function getDetailsFromAllParams()
    {
        return [
            self::NAME_PARAM => [
                'operator' => self::NAME_OPERATOR,
                'database_field' => self::NAME_DATABASE_FIELD
            ],
            self::EMAIL_PARAM => [
                'operator' => self::EMAIL_OPERATOR,
                'database_field' => self::EMAIL_DATABASE_FIELD
            ],
            self::BIRTH_DATE_PARAM => [
                'operator' => self::BIRTH_DATE_OPERATOR,
                'database_field' => self::BIRTH_DATE_DATABASE_FIELD
            ],
            self::COUNTRY_PARAM => [
                'operator' => self::COUNTRY_OPERATOR,
                'database_field' => self::COUNTRY_DATABASE_FIELD
            ],
            self::CITY_PARAM => [
                'operator' => self::CITY_OPERATOR,
                'database_field' => self::CITY_DATABASE_FIELD
            ],
            self::USER_TYPE_PARAM => [
                'operator' => self::USER_TYPE_OPERATOR,
                'database_field' => self::USER_TYPE_DATABASE_FIELD
            ]
        ];
    }

    public static function getDetailsFomParam(string $param)
    {
        return self::getDetailsFromAllParams()[$param] ?? [];
    }
}
