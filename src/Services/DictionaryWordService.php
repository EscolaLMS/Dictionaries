<?php

namespace EscolaLms\Dictionaries\Services;

use EscolaLms\Core\Dtos\OrderDto;
use EscolaLms\Dictionaries\Dtos\DictionaryWordCriteriaDto;
use EscolaLms\Dictionaries\Dtos\DictionaryWordDto;
use EscolaLms\Dictionaries\Dtos\PageDto;
use EscolaLms\Dictionaries\Models\DictionaryWord;
use EscolaLms\Dictionaries\Repositories\Contracts\CategoryRepositoryContract;
use EscolaLms\Dictionaries\Repositories\Contracts\DictionaryWordRepositoryContract;
use EscolaLms\Dictionaries\Services\Contracts\DictionaryWordServiceContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DictionaryWordService implements DictionaryWordServiceContract
{

    public function __construct(
        private readonly DictionaryWordRepositoryContract $dictionaryWordRepository,
        private readonly CategoryRepositoryContract $categoryRepository
    )
    {
    }

    public function list(DictionaryWordCriteriaDto $criteriaDto, PageDto $pageDto, OrderDto $orderDto): LengthAwarePaginator
    {
        return $this->dictionaryWordRepository->findAll(
            $criteriaDto->toArray(),
            $pageDto->getPerPage(),
            $orderDto->getOrder() ?? 'desc',
            $orderDto->getOrderBy() ?? 'id'
        );
    }

    public function create(DictionaryWordDto $dto): DictionaryWord
    {
        /** @var DictionaryWord $dictionaryWord */
        $dictionaryWord = $this->dictionaryWordRepository->create($dto->toArray());
        $this->syncCategories($dictionaryWord, $dto->getCategories());

        return $dictionaryWord;
    }

    public function update(int $id, DictionaryWordDto $dto): DictionaryWord
    {
        /** @var DictionaryWord $dictionaryWord */
        $dictionaryWord = $this->dictionaryWordRepository->update($dto->toArray(), $id);
        $this->syncCategories($dictionaryWord, $dto->getCategories());

        return $dictionaryWord;
    }

    public function delete(DictionaryWord $dictionary): void
    {
        $this->dictionaryWordRepository->remove($dictionary);
    }

    public function categories(DictionaryWordCriteriaDto $criteriaDto): Collection
    {
        return $this->categoryRepository->getCategoriesFilteredByDictionaryWord($criteriaDto->toArray());
    }

    private function syncCategories(DictionaryWord $dictionaryWord, array $categoryIds): void
    {
        $dictionaryWord->categories()->sync($categoryIds);
    }
}
