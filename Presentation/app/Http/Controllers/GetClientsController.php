<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetClientsRequest;
use App\Http\View\Client\GetClientsView;
use Illuminate\Http\JsonResponse;
use UseCase\Client\GetClientsUseCase;

class GetClientsController extends Controller
{
    public function __construct(
        readonly private GetClientsUseCase $getClientsUseCase,
        readonly private GetClientsView $getClientsView
    ) {}

    public function get(GetClientsRequest $request): JsonResponse
    {
        return $this->successResponse(
            $this->getClientsView->fromDomainToArray(
                $this->getClientsUseCase->get(
                    $request->clubId,
                    $request->page ?? null,
                    $request->count ?? null
                )
            )
        );
    }
}
