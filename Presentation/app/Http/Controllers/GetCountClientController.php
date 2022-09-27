<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCountClientRequest;
use Illuminate\Http\JsonResponse;
use UseCase\Client\GetCountClientUseCase;

class GetCountClientController extends Controller
{
    public const COUNT = 'count';

    public function __construct(
        readonly private GetCountClientUseCase $getCountClientUseCase
    ) {}

    public function get(GetCountClientRequest $request): JsonResponse
    {
        return $this->successResponse([
            self::COUNT => $this->getCountClientUseCase->get($request->clubId)
        ]);
    }
}
