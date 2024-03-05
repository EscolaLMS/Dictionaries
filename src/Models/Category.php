<?php

namespace EscolaLms\Dictionaries\Models;

use EscolaLms\Categories\Models\Category as BaseCategory;
use EscolaLms\Dictionaries\Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends BaseCategory
{
    use HasFactory;

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }
}
