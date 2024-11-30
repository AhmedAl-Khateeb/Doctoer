<?php

namespace app\Enum;


use App\Models\User;

class UserTypeEnum
{
    const ADMIN = 0;

    const USER = 1;

    
    public static function availableTypes(): array
    {
        return [
            self::ADMIN,
            self::USER,
        ];
    }

    public static function getUserType(?User $user = null)
    {
        $user = ! is_null($user) ? $user : auth()->user();

        return $user?->type;
    }

    public static function alphaTypes(): array
    {
        return [
            self::ADMIN => 'admin',
            self::USER => 'user',
        ];
    }
}
