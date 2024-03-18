<?php

namespace EscolaLms\Dictionaries\Repositories\Criteria;


use EscolaLms\Core\Repositories\Criteria\Criterion;
use Illuminate\Database\Eloquent\Builder;

class ILikeCriterion extends Criterion
{
    public function apply(Builder $query): Builder
    {
        return $query->where($this->key, 'ILIKE', "%$this->value%");
    }
}
