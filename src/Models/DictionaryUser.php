<?php

namespace EscolaLms\Dictionaries\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;

/**
 * Class DictionaryUser
 *
 * @property int $dictionary_id
 * @property int $user_id
 * @property Carbon|null $end_date
 */
class DictionaryUser extends Pivot
{
}
