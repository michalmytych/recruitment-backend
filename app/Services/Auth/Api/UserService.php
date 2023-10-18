<?php

namespace App\Services\Auth\Api;

use App\Contracts\Repositories\User\UserRepositoryContract;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

readonly class UserService
{
    public function __construct(private UserRepositoryContract $userRepository)
    {
    }

    public function register(array $data): array
    {
        $user = $this->userRepository->create($data);
        $token = $user->createToken('api_token')->plainTextToken;

        return [
            'user'  => $user,
            'token' => $token,
        ];
    }

    public function getOrCreateApiToken(User $user): string
    {
        return $user->currentAccessToken() ?? $user->createToken('api_token')->plainTextToken;
    }

    /**
     * @throws Exception
     */
    public function login(array $data): array
    {
        $user = $this->userRepository->firstWhere(['email' => $data['email']]);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            abort(401, 'Bad credentials.');
        }

        $token = $user->createToken('api_token')->plainTextToken;

        return [
            'user'  => $user,
            'token' => $token,
        ];
    }

    /** @noinspection PhpPossiblePolymorphicInvocationInspection */
    public function logout(Authenticatable $user): void
    {
        $user->tokens()->delete();
    }
}
