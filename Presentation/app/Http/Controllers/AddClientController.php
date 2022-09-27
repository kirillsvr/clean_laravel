<?php

namespace App\Http\Controllers;

use App\Http\Model\Client\ClientModel;
use App\Http\Requests\AddClientRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use UseCase\Client\AddClientUseCase;

class AddClientController extends Controller
{
    public function __construct(
        private readonly ClientModel $clientModel,
        private readonly AddClientUseCase $addClientUseCase
    ) {}

    public function add(AddClientRequest $request): JsonResponse
    {
        try {
            $this->addClientUseCase->add(
                $this->clientModel->fromRequestToDomain(
                    $request->name,
                    $request->lastname,
                    $request->phone,
                    $request->birthday,
                    $request->clubId
                )
            );
        } catch (Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }

        return $this->defaultSuccessResponse();
    }
}
