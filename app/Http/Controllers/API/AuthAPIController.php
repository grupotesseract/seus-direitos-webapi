<?php

namespace App\Http\Controllers\API;

use Auth;
use Response;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;

/**
 * @resource Auth API
 *
 * Auth API
 */
class AuthAPIController extends AppBaseController
{
    /** @var UserRepository */
    private $userRepository;
    private $successStatus = 200;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * login api.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken(env('AUTH_API_TOKEN'))->accessToken;

            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'sindicato_id' => 'required|exists:sindicatos,id',
            'cidade_id' => 'required|exists:cidades,id',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ],
        [
            'cidade_id.required' => 'O campo cidade é obrigatório',
            'sindicato_id.required' => 'O campo sindicato é obrigatório',
            'password_confirm.same' => 'Os campos senha não estão iguais',
            'required'=>'O campo :attribute é obrigatório',
            'email.unique'=>'Já existe um usuário com esse endereço de e-mail!',
            'sindicato_id.exists'=>'Sindicato não encontrado',
            'cidade_id.exists'=>'Cidade não encontrada',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = $this->userRepository->create($input);
        $success['token'] = $user->createToken(env('AUTH_API_TOKEN'))->accessToken;
        $success['name'] = $user->name;

        //Adicionando role de funcionario a todos os usuarios criados via api
        $this->userRepository->addRole($user, 'funcionario');

        return response()->json(['success'=>$success], $this->successStatus);
    }
}
