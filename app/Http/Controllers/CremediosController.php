<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCremediosRequest;
use App\Http\Requests\UpdateCremediosRequest;
use App\Repositories\CremediosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CremediosController extends AppBaseController
{
    /** @var  CremediosRepository */
    private $cremediosRepository;

    public function __construct(CremediosRepository $cremediosRepo)
    {
        $this->cremediosRepository = $cremediosRepo;
    }

    /**
     * Display a listing of the Cremedios.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cremediosRepository->pushCriteria(new RequestCriteria($request));
        $cremedios = $this->cremediosRepository->all();

        return view('cremedios.index')
            ->with('cremedios', $cremedios);
    }

    /**
     * Show the form for creating a new Cremedios.
     *
     * @return Response
     */
    public function create()
    {
        return view('cremedios.create');
    }

    /**
     * Store a newly created Cremedios in storage.
     *
     * @param CreateCremediosRequest $request
     *
     * @return Response
     */
    public function store(CreateCremediosRequest $request)
    {
        $input = $request->all();

        $cremedios = $this->cremediosRepository->create($input);

        Flash::success('Cremedios saved successfully.');

        return redirect(route('cremedios.index'));
    }

    /**
     * Display the specified Cremedios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cremedios = $this->cremediosRepository->findWithoutFail($id);

        if (empty($cremedios)) {
            Flash::error('Cremedios not found');

            return redirect(route('cremedios.index'));
        }

        return view('cremedios.show')->with('cremedios', $cremedios);
    }

    /**
     * Show the form for editing the specified Cremedios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cremedios = $this->cremediosRepository->findWithoutFail($id);

        if (empty($cremedios)) {
            Flash::error('Cremedios not found');

            return redirect(route('cremedios.index'));
        }

        return view('cremedios.edit')->with('cremedios', $cremedios);
    }

    /**
     * Update the specified Cremedios in storage.
     *
     * @param  int              $id
     * @param UpdateCremediosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCremediosRequest $request)
    {
        $cremedios = $this->cremediosRepository->findWithoutFail($id);

        if (empty($cremedios)) {
            Flash::error('Cremedios not found');

            return redirect(route('cremedios.index'));
        }

        $cremedios = $this->cremediosRepository->update($request->all(), $id);

        Flash::success('Cremedios updated successfully.');

        return redirect(route('cremedios.index'));
    }

    /**
     * Remove the specified Cremedios from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cremedios = $this->cremediosRepository->findWithoutFail($id);

        if (empty($cremedios)) {
            Flash::error('Cremedios not found');

            return redirect(route('cremedios.index'));
        }

        $this->cremediosRepository->delete($id);

        Flash::success('Cremedios deleted successfully.');

        return redirect(route('cremedios.index'));
    }
}
