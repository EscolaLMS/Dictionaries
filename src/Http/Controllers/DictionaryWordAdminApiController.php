<?php

namespace EscolaLms\Dictionaries\Http\Controllers;

use EscolaLms\Core\Http\Controllers\EscolaLmsBaseController;
use EscolaLms\Dictionaries\Http\Controllers\Swagger\DictionaryWordAdminApiControllerSwagger;
use EscolaLms\Dictionaries\Http\Requests\DictionaryWord\CreateDictionaryWordRequest;
use EscolaLms\Dictionaries\Http\Requests\DictionaryWord\DeleteDictionaryWordRequest;
use EscolaLms\Dictionaries\Http\Requests\DictionaryWord\ListDictionaryWordRequest;
use EscolaLms\Dictionaries\Http\Requests\DictionaryWord\ReadDictionaryWordRequest;
use EscolaLms\Dictionaries\Http\Requests\DictionaryWord\UpdateDictionaryWordRequest;
use EscolaLms\Dictionaries\Http\Resources\DictionaryWordResource;
use EscolaLms\Dictionaries\Http\Resources\DictionaryWordSimpleResource;
use EscolaLms\Dictionaries\Services\Contracts\DictionaryWordServiceContract;
use Illuminate\Http\JsonResponse;

class DictionaryWordAdminApiController extends EscolaLmsBaseController implements DictionaryWordAdminApiControllerSwagger
{

    public function __construct(private readonly DictionaryWordServiceContract $dictionaryWordService)
    {
    }

    public function index(ListDictionaryWordRequest $request): JsonResponse
    {
        $results = $this->dictionaryWordService->list($request->getCriteria(), $request->getPage(), $request->getOrder());

        return $this->sendResponseForResource(DictionaryWordSimpleResource::collection($results));    }

    public function store(CreateDictionaryWordRequest $request): JsonResponse
    {
        $dictionary = $this->dictionaryWordService->create($request->toDto());

        return $this->sendResponseForResource(DictionaryWordResource::make($dictionary));
    }

    public function show(ReadDictionaryWordRequest $request): JsonResponse
    {
        return $this->sendResponseForResource(DictionaryWordResource::make($request->getDictionaryWord()));
    }

    public function update(UpdateDictionaryWordRequest $request): JsonResponse
    {
        $dictionary = $this->dictionaryWordService->update($request->getId(), $request->toDto());

        return $this->sendResponseForResource(DictionaryWordResource::make($dictionary));
    }

    public function delete(DeleteDictionaryWordRequest $request): JsonResponse
    {
        $this->dictionaryWordService->delete($request->getDictionaryWord());

        return $this->sendSuccess(__('Dictionary word deleted successfully'));
    }
}
