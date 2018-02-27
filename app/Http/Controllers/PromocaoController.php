<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePromocaoRequest;
use App\Http\Requests\UpdatePromocaoRequest;
use App\Repositories\PromocaoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PromocaoController extends AppBaseController
{
    /** @var  PromocaoRepository */
    private $promocaoRepository;

    public function __construct(PromocaoRepository $promocaoRepo)
    {
        $this->promocaoRepository = $promocaoRepo;
    }

    /**
     * Display a listing of the Promocao.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->promocaoRepository->pushCriteria(new RequestCriteria($request));
        $promocaos = $this->promocaoRepository->all();

        return view('promocaos.index')
            ->with('promocaos', $promocaos);
    }

    /**
     * Show the form for creating a new Promocao.
     *
     * @return Response
     */
    public function create()
    {
        return view('promocaos.create');
    }

    /**
     * Store a newly created Promocao in storage.
     *
     * @param CreatePromocaoRequest $request
     *
     * @return Response
     */
    public function store(CreatePromocaoRequest $request)
    {
        $input = $request->all();

        $promocao = $this->promocaoRepository->create($input);

        Flash::success('Promocao saved successfully.');

        return redirect(route('promocaos.index'));
    }

    /**
     * Display the specified Promocao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $promocao = $this->promocaoRepository->findWithoutFail($id);

        if (empty($promocao)) {
            Flash::error('Promocao not found');

            return redirect(route('promocaos.index'));
        }

        return view('promocaos.show')->with('promocao', $promocao);
    }

    /**
     * Show the form for editing the specified Promocao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $promocao = $this->promocaoRepository->findWithoutFail($id);

        if (empty($promocao)) {
            Flash::error('Promocao not found');

            return redirect(route('promocaos.index'));
        }

        return view('promocaos.edit')->with('promocao', $promocao);
    }

    /**
     * Update the specified Promocao in storage.
     *
     * @param  int              $id
     * @param UpdatePromocaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePromocaoRequest $request)
    {
        $promocao = $this->promocaoRepository->findWithoutFail($id);

        if (empty($promocao)) {
            Flash::error('Promocao not found');

            return redirect(route('promocaos.index'));
        }

        $promocao = $this->promocaoRepository->update($request->all(), $id);

        Flash::success('Promocao updated successfully.');

        return redirect(route('promocaos.index'));
    }

    /**
     * Remove the specified Promocao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $promocao = $this->promocaoRepository->findWithoutFail($id);

        if (empty($promocao)) {
            Flash::error('Promocao not found');

            return redirect(route('promocaos.index'));
        }

        $this->promocaoRepository->delete($id);

        Flash::success('Promocao deleted successfully.');

        return redirect(route('promocaos.index'));
    }
}
