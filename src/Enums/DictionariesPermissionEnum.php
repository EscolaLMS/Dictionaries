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
}
