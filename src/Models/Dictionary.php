<?php

namespace EscolaLms\Dictionaries\Models;

use EscolaLms\Dictionaries\Database\Factories\DictionaryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Dictionary
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property integer|null $free_views_count
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Dictionary extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory(): DictionaryFactory
    {
        return DictionaryFactory::new();
    }
}
