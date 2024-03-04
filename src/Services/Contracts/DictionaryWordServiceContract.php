<?php

namespace EscolaLms\Dictionaries\Services\Contracts;

use EscolaLms\Core\Dtos\OrderDto;
use EscolaLms\Dictionaries\Dtos\DictionaryWordCriteriaDto;
use EscolaLms\Dictionaries\Dtos\DictionaryWordDto;
use EscolaLms\Dictionaries\Dtos\PageDto;
use EscolaLms\Dictionaries\Models\DictionaryWord;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface DictionaryWordServiceContract
{
    public function list(DictionaryWordCriteriaDto $criteriaDto, PageDto $pageDto, OrderDto $orderDto): LengthAwarePaginator;
    public function create(DictionaryWordDto $dto): DictionaryWord;
    public function update(int $id, DictionaryWordDto $dto): DictionaryWord;
    public function delete(DictionaryWord $dictionary): void;
}
