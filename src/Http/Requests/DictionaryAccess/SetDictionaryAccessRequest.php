<?php

namespace EscolaLms\Dictionaries\Http\Requests\DictionaryAccess;

use EscolaLms\Dictionaries\Dtos\DictionaryAccessDto;

/**
 * @OA\Schema(
 *      schema="SetDictionaryAccessRequest",
 *      required={"users"},
 *      @OA\Property(
 *          property="users",
 *          type="array",
 *          @OA\Items(
 *              @OA\Property(
 *                  property="user_id",
 *                  type="integer"
 *              ),
 *              @OA\Property(
 *                  property="end_date",
 *                  type="string",
 *                  format="date-time"
 *             ),
 *          )
 *      )
 * )
 */
class SetDictionaryAccessRequest extends ListDictionaryAccessRequest
{
    public function rules(): array
    {
        return [
            'users' => ['array'],
            'users.*.user_id' => ['required', 'integer', 'exists:users,id'],
            'users.*.end_date' => ['nullable', 'date'],
        ];
    }

    public function toDto(): DictionaryAccessDto
    {
        return DictionaryAccessDto::instantiateFromRequest($this);
    }
}
