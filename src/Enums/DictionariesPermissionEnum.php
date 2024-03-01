<?php

namespace EscolaLms\Dictionaries\Enums;

use EscolaLms\Core\Enums\BasicEnum;

class DictionariesPermissionEnum extends BasicEnum
{
    public const DICTIONARY_LIST = 'dictionary_list';
    public const DICTIONARY_CREATE = 'dictionary_create';
    public const DICTIONARY_READ = 'dictionary_read';
    public const DICTIONARY_UPDATE = 'dictionary_update';
    public const DICTIONARY_DELETE = 'dictionary_delete';

    public const DICTIONARY_LIST_SELF = 'dictionary_list-self';
    public const DICTIONARY_READ_SELF = 'dictionary_read-self';

    public static function getAdminPermissions(): array
    {
        return [
            self::DICTIONARY_LIST,
            self::DICTIONARY_CREATE,
            self::DICTIONARY_READ,
            self::DICTIONARY_UPDATE,
            self::DICTIONARY_DELETE,
        ];
    }

    public static function getStudentPermissions(): array
    {
        return [
            self::DICTIONARY_LIST_SELF,
            self::DICTIONARY_READ_SELF,
        ];
    }
}
