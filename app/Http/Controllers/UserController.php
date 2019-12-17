<?php

namespace App\Http\Controllers;

use App\DataTables\Scopes\PorInstituicaoId;
use App\DataTables\Scopes\PorRole;
use App\DataTables\Scopes\PorSindicato;
use App\DataTables\Scopes\PorSindicatoId;
use App\DataTables\Scopes\Trashed;
use App\DataTables\UserDataTable;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Categoria;
use App\Models\Instituicao;
use App\Models\Role;
use App\Models\Sindicato;
use App\Models\User;
use App\Repositories\InstituicaoRepository;
use App\Repositories\SindicatoRepository;
use App\Repositories\UserRepository;
use Auth;
use Flash;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Response;

/**
 * @resource User
 *
 * User routes
 */
class UserController extends AppBaseController
{
    /** @var UserRepository */
    private $userRepository;
    private $teveErro;

    public function __construct(
        UserRepository $userRepo,
        SindicatoRepository $sindicatoRepo,
        InstituicaoRepository $instituicaoRepo
    ) {
        $this->userRepository = $userRepo;
        $this->sindicatoRepository = $sindicatoRepo;
        $this->instituicaoRepository = $instituicaoRepo;
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
     * Form para importação de usuários.
     *
     * @return Response
     */
    public function importarUsuarios()
    {
        return view('users.importacao');
    }

    /**
     * Método para importação de usuários.
     *
     * @return Response
     */
    public function postAssociadosImportacao(Request $request)
    {
        $this->teveErro = false;

        $arquivo = \Storage::putFile('importacoes', $request->file('excel'));

        Excel::filter('chunk')->load('storage/app/'.$arquivo)->chunk(100, function ($results) {
            foreach ($results as $row) {
                $sindicato = Sindicato::where('nome', $row['sindicato'])->first();

                if (! is_null($row['instituicao']) || $row['instituicao'] != '') {
                    $instituicao = Instituicao::firstOrCreate(
                        [
                            'nome' => $row['instituicao'],
                            'nomecompleto' => $row['instituicao'],
                            'sindicato_id' => $sindicato->id,
                        ]
                    );
                }

                if (! is_null($row['categoria']) || $row['categoria'] != '') {
                    $categoria = Categoria::firstOrCreate(
                                                [
                                                        'nome' => $row['categoria'],
                                                        'sindicato_id' => $sindicato->id,
                                                ]
                                        );
                }

                if ($sindicato->count() > 0) {
                    $input['name'] = strtoupper($row['nome']);
                    $input['email'] = $row['email'];
                    $rg_formatado = str_replace('.', '', $row['rg']);
                    $rg_formatado = str_replace('-', '', $rg_formatado);
                    $input['password'] = bcrypt($rg_formatado);
                    $input['sindicato_id'] = $sindicato->id;

                    if (isset($instituicao)) {
                        $input['instituicao_id'] = $instituicao->id;
                    }

                    if (isset($categoria)) {
                        $input['categoria_id'] = $categoria->id;
                    }

                    $input['rg'] = $rg_formatado;
                    $input['matricula'] = $row['matricula'];

                    if (isset($row['validade'])) {
                        $input['validade_carteirinha'] = $row['validade'];
                    }

                    $user = User::firstOrNew(
                        [
                            'email' => $input['email'],
                            'rg' => $input['rg'],
                        ]
                    );

                    $user->fill($input);
                    $user->save();
                    $role = Role::where('name', 'funcionario')->first();

                    if ($user && $role && ! $user->hasRole('funcionario')) {
                        $user->attachRole($role);
                    }
                }
            }
        });

        if (! $this->teveErro) {
            Flash::success('Planilha importada com sucesso.');
        } else {
            Flash::success('Planilha importada com sucesso, porém alguns registros possuem erros! Verifique se os sindicatos e instituições estão cadastrados');
        }

        return redirect('usuarios/funcionarios');
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
        $redirect = $user->rotaListagem;

        return redirect($redirect);
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

        //Se vier password precisa encryptar antes de salvar no BD
        if ($request->password) {
            $request->request->add(['password'=> bcrypt($request->password)]);
        }
        //Se nao vier, remover o field da request
        else {
            $request->request->remove('password');
        }

        $user = $this->userRepository->update($request->all(), $id);
        Flash::success('Usuário atualizado com sucesso.');
        $redirect = $user->rotaListagem;

        return redirect($redirect);
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
        $userWithTrashed = User::withTrashed()->find($id);

        $redirect = $userWithTrashed->rotaListagem;

        if ($userWithTrashed->trashed()) {
            $userWithTrashed->restore();
            Flash::success('Usuário restaurado com successo.');

            return redirect($redirect);
        }

        $redirect = $user->rotaListagem;

        if (empty($user)) {
            Flash::error('Usuário não encontrado');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('Usuário excluído com sucesso.');

        return redirect($redirect);
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
            ->addScope(new PorSindicato(Auth::user()))
            ->render('users.lista-funcionarios');
    }

    /**
     * Rota para mostrar apenas usuarios com role de 'funcionario'.
     *
     * @param Request $request
     * @return Response
     */
    public function getFuncionariosSindicato(UserDataTable $userDT, $idSindicato)
    {
        return $userDT
            ->addScope(new PorRole('funcionario'))
            ->addScope(new PorSindicatoId($idSindicato))
            ->render('users.lista-funcionarios');
    }

    /**
     * Rota para mostrar apenas usuarios com role de 'funcionario'.
     *
     * @param Request $request
     * @return Response
     */
    public function getFuncionariosInstituicao(UserDataTable $userDT, $idInstituicao)
    {
        return $userDT
            ->addScope(new PorRole('funcionario'))
            ->addScope(new PorInstituicaoId($idInstituicao))
            ->render('users.lista-funcionarios');
    }

    /**
     * Rota para mostrar apenas usuarios com role de 'funcionario'.
     *
     * @param Request $request
     * @return Response
     */
    public function getFuncionariosTrashed(UserDataTable $userDT)
    {
        return $userDT
                        ->addScope(new Trashed())
            ->addScope(new PorRole('funcionario'))
            ->addScope(new PorSindicato(Auth::user()))
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
        $user = $this->userRepository->findWithoutFail($id);
        $carteirinha = [
            'logoSindicato' => $user->linkLogoSindicato,
            'nomeSindicato' => $user->nomeSindicato,
            'nomeAssociado' => $user->name,
            'rgAssociado' => $user->rg,
            'nomeInstituicao' => $user->nomeInstituicao,
            'matricula' => $user->matricula,
            'validade_carteirinha' => $user->validade_carteirinha,
        ];

        return view('carteirinha.index')->with('carteirinha', $carteirinha);
    }
}
