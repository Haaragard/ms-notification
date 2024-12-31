<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller\User;

use App\Application\UseCase\_Shared\BusinessException;
use App\Application\UseCase\User\Create\UserCreateInput;
use App\Application\UseCase\User\Create\UserCreateUseCaseInterface;
use App\Infrastructure\Http\Controller\_Shared\AbstractController;
use App\Infrastructure\Http\Request\User\CreateUserRequest;
use App\Infrastructure\Http\Resource\_Shared\Error\BusinessErrorResource;
use App\Infrastructure\Http\Resource\_Shared\Error\UnexpectedErrorResource;
use App\Infrastructure\Http\Resource\_Shared\Success\CreatedSuccessfullyResource;
use Hyperf\Collection\Arr;
use Hyperf\Di\Annotation\Inject;
use Psr\Http\Message\ResponseInterface;
use Swoole\Http\Status;
use Throwable;

class CreateUserController extends AbstractController
{
    #[Inject]
    protected UserCreateUseCaseInterface $useCase;

    public function __invoke(CreateUserRequest $request): ResponseInterface
    {
        try {
            $data = $request->validated();

            $input = new UserCreateInput(
                Arr::get($data, 'name'),
                Arr::get($data, 'email'),
                Arr::get($data, 'password')
            );

            $this->useCase->execute($input);

            return $this->response->json(
                (new CreatedSuccessfullyResource())->toArray()
            )
                ->withStatus(Status::CREATED);
        } catch (BusinessException $exception) {
            return $this->response->json(
                (new BusinessErrorResource($exception->getMessage()))->toArray()
            )->withStatus(Status::UNPROCESSABLE_ENTITY);
        } catch (Throwable) {
            return $this->response->json(
                (new UnexpectedErrorResource())->toArray()
            )->withStatus(Status::INTERNAL_SERVER_ERROR);
        }
    }
}
