<?php

namespace EscolaLms\Dictionaries\Dtos;

use EscolaLms\Core\Dtos\Contracts\DtoContract;
use EscolaLms\Core\Dtos\Contracts\InstantiateFromRequest;
use EscolaLms\Core\Dtos\CriteriaDto as BaseCriteriaDto;
use EscolaLms\Core\Repositories\Criteria\Primitives\EqualCriterion;
use EscolaLms\Core\Repositories\Criteria\Primitives\HasCriterion;
use EscolaLms\Core\Repositories\Criteria\Primitives\LikeCriterion;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DictionaryWordCriteriaDto  extends BaseCriteriaDto implements DtoContract, InstantiateFromRequest
{
    public static function instantiateFromRequest(Request $request): self
    {
        $criteria = new Collection();

        if ($request->get('word')) {
            $criteria->push(new LikeCriterion('word', $request->get('word')));
        }

        if ($request->get('dictionary_id')) {
            $criteria->push(new EqualCriterion('dictionary_id', $request->get('dictionary_id')));
        }

        if ($request->get('category_ids')) {
            $criteria->push(new HasCriterion('categories', fn ($query) => $query->whereIn('category_id', $request->get('category_ids'))));
        }

        return new self($criteria);
    }
}
