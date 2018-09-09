<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Role;
use App\Models\Instituicao;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\DataTables\Scopes\PorRole;
use App\Repositories\UserRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

/**
 * @resource User
 *
 * User routes
 */
class UserController extends AppBaseController
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(UserDataTable $userDT)
    {
        return $userDT->render('users.index');
    }

    /**
     * Show the form for creating a new User do tipo super-admin.
     *
     * @return Response
     */
    public function createAdmin()
    {
        return view('users.create-admin');
    }

    /**
     * Show the form for creating a new User do tipo sindicalista.
     *
     * @return Response
     */
    public function createSindicalista()
    {
        return view('users.create-sindicalista');
    }

    /**
     * Show the form for creating a new User do tipo funcionario.
     *
     * @return Response
     */
    public function createFuncionario()
    {
        return view('users.create-funcionario');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($request->password);

        $user = $this->userRepository->create($input);
        $role = Role::where('name', $request->role)->first();

        if ($user && $role) {
            $user->attachRole($role);
        }

        Flash::success('Usuário salvo com sucesso.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuário não encontrado');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuário não encontrado');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuário não encontrado');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('Usuário atualizado com sucesso.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuário não encontrado');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('Usuário excluído com sucesso.');

        return redirect(route('users.index'));
    }

    /**
     * Rota para mostrar apenas usuarios com role de 'admin'.
     *
     * @param Request $request
     * @return Response
     */
    public function getAdmins(UserDataTable $userDT)
    {
        return $userDT
            ->addScope(new PorRole('superadmin'))
            ->render('users.lista-admins');
    }

    /**
     * Rota para mostrar apenas usuarios com role de 'sindicalista'.
     *
     * @param Request $request
     * @return Response
     */
    public function getSindicalistas(UserDataTable $userDT)
    {
        return $userDT
            ->addScope(new PorRole('sindicalista'))
            ->render('users.lista-sindicalistas');
    }

    /**
     * Rota para mostrar apenas usuarios com role de 'funcionario'.
     *
     * @param Request $request
     * @return Response
     */
    public function getFuncionarios(UserDataTable $userDT)
    {
        return $userDT
            ->addScope(new PorRole('funcionario'))
            ->render('users.lista-funcionarios');
    }

    /**
     * Rota para mostrar todos os usuarios.
     *
     * @param Request $request
     * @return Response
     */
    public function getAll(UserDataTable $userDT)
    {
        if (\Laratrust::hasRole('sindicalista')) {
            //@TODO aplicar scope para pegar apenas usuarios funcionarios
            $users = $this->userRepository->getUsuariosFuncionarios();
        } elseif (\Laratrust::hasRole('superadmin')) {
            $users = $this->userRepository->all();
        }

        return $userDT->render('users.index');
    }

    public function getCarteirinha($id)
    {
        $carteirinha = $this->userRepository->findWithoutFail($id);

        return $carteirinha;
    }
}
