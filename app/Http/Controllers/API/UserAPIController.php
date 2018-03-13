<?php

namespace App\Http\Controllers\API;

use Auth;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;

/**
 * @resource User API
 *
 * User routes
 */
class UserAPIController extends AppBaseController
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * undocumented function.
     *
     * @return void
     */
    public function postAceiteContribuicao()
    {
        $user = Auth::user();
        $mensagem = '';

        if ($user->aceitou_contribuicao) {
            $mensagem = 'Aceite da contribuição realizado com sucesso!';
        } else {
            $mensagem = 'Cancelamento da contribuição realizado com sucesso!';
        }

        $this->userRepository->togglAceiteContribuicao($user);

        return $this->sendResponse([], $mensagem);
    }
}
