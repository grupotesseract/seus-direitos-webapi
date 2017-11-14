<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Role;

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
    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->all();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User do tipo super-admin
     *
     * @return Response
     */
    public function createAdmin()
    {
        return view('users.create-admin');
    }

    /**
     * Show the form for creating a new User do tipo sindicalista
     *
     * @return Response
     */
    public function createSindicalista()
    {
        return view('users.create-sindicalista');
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


        Flash::success('User saved successfully.');

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
            Flash::error('User not found');

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
            Flash::error('User not found');

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
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

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
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }


    /**
     * Rota para mostrar apenas usuarios com role de 'admin'
     *
     * @param Request $request
     * @return Response
     */
    public function getAdmins(Request $request)
    {
        
        $users = $this->userRepository->getUsuariosAdmins();

        return view('users.lista-admins')
            ->with('users', $users);
    }

    /**
     * Rota para mostrar apenas usuarios com role de 'sindicalista'
     *
     * @param Request $request
     * @return Response
     */
    public function getSindicalistas(Request $request)
    {
        
        $users = $this->userRepository->getUsuariosSindicalistas();

        return view('users.lista-sindicalistas')
            ->with('users', $users);
    }

    /**
     * Rota para mostrar apenas usuarios com role de 'funcionario'
     *
     * @param Request $request
     * @return Response
     */
    public function getFuncionarios(Request $request)
    {
        
        $users = $this->userRepository->getUsuariosFuncionarios();

        return view('users.lista-funcionarios')
            ->with('users', $users);
    }

    /**
     * Rota para mostrar todos os usuarios
     *
     * @param Request $request
     * @return Response
     */
    public function getAll(Request $request)
    {
        $users = $this->userRepository->all();

        return view('users.index')
            ->with('users', $users);
    }
    
}
