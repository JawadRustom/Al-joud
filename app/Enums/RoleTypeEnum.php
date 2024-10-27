<?php

namespace App\Enums;

enum RoleTypeEnum: string
{
    case Admin = 'admin';
    case User = 'user';

    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $enum) {
            $array[$enum->value] = $enum->name;
        }
        return $array;
    }


    public function isAdmin(): bool
    {
        return $this == static::Admin;
    }
    public function isUser(): bool
    {
        return $this == static::User;
    }
}
