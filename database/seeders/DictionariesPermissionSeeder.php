<?php

namespace EscolaLms\Dictionaries\Database\Seeders;

use EscolaLms\Dictionaries\Enums\DictionariesPermissionEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DictionariesPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $student = Role::findOrCreate('student', 'api');
        $admin = Role::findOrCreate('admin', 'api');

        foreach (DictionariesPermissionEnum::getValues() as $permission) {
            Permission::findOrCreate($permission, 'api');
        }

        $admin->givePermissionTo(DictionariesPermissionEnum::getValues());

        $student->givePermissionTo([
            DictionariesPermissionEnum::DICTIONARY_LIST,
            DictionariesPermissionEnum::DICTIONARY_READ,
        ]);
    }
}
