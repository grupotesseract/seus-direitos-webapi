<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Repositories\UserRepository;
use Auth;
use Illuminate\Http\Request;
use Response;
use Validator;

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
        if (filter_var(request('email'), FILTER_VALIDATE_EMAIL)) {
            $arrayAuth = ['email' => request('email'), 'password' => request('password')];
        } else {
            $arrayAuth = ['rg' => request('email'), 'password' => request('password')];
        }

        if (Auth::attempt($arrayAuth)) {
            $user = Auth::user();
            $user->load('sindicato');
            $success['token'] = $user->createToken(env('AUTH_API_TOKEN'))->accessToken;

            return response()->json(['success' => $success, 'data' => $user], $this->successStatus);
        } else {
            return response()->json(['error'=>'Unauthorized'], 401);
        }
    }

    /**
     * Metodo para fazer register via API.
     *
     * @param Request
     */
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
