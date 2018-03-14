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
     * Metodo para dar Toggl no Aceite da Contribuição sindical.
     *
     * @return json
     */
    public function postTogglContribuicaoSindical()
    {
        $user = Auth::user();
        $mensagem = '';

        if ($user->aceitou_contribuicao) {
            $mensagem = 'Cancelamento da contribuição realizado com sucesso!';
        } else {
            $mensagem = 'Aceite da contribuição realizado com sucesso!';
        }

        $this->userRepository->togglAceiteContribuicao($user);

        return $this->sendResponse([], $mensagem);
    }
}
