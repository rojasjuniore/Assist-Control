<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateestudioRequest;
use App\Http\Requests\UpdateestudioRequest;
use App\Repositories\estudioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class estudioController extends AppBaseController
{
    /** @var  estudioRepository */
    private $estudioRepository;

    public function __construct(estudioRepository $estudioRepo)
    {
        $this->estudioRepository = $estudioRepo;
    }

    /**
     * Display a listing of the estudio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estudioRepository->pushCriteria(new RequestCriteria($request));
        $estudios = $this->estudioRepository->all();

        return view('estudios.index')
            ->with('estudios', $estudios);
    }

    /**
     * Show the form for creating a new estudio.
     *
     * @return Response
     */
    public function create()
    {
        return view('estudios.create');
    }

    /**
     * Store a newly created estudio in storage.
     *
     * @param CreateestudioRequest $request
     *
     * @return Response
     */
    public function store(CreateestudioRequest $request)
    {
        $input = $request->all();

        $estudio = $this->estudioRepository->create($input);

        Flash::success('Estudio saved successfully.');

        return redirect(route('estudios.index'));
    }

    /**
     * Display the specified estudio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estudio = $this->estudioRepository->findWithoutFail($id);

        if (empty($estudio)) {
            Flash::error('Estudio not found');

            return redirect(route('estudios.index'));
        }

        return view('estudios.show')->with('estudio', $estudio);
    }

    /**
     * Show the form for editing the specified estudio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estudio = $this->estudioRepository->findWithoutFail($id);

        if (empty($estudio)) {
            Flash::error('Estudio not found');

            return redirect(route('estudios.index'));
        }

        return view('estudios.edit')->with('estudio', $estudio);
    }

    /**
     * Update the specified estudio in storage.
     *
     * @param  int              $id
     * @param UpdateestudioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateestudioRequest $request)
    {
        $estudio = $this->estudioRepository->findWithoutFail($id);

        if (empty($estudio)) {
            Flash::error('Estudio not found');

            return redirect(route('estudios.index'));
        }

        $estudio = $this->estudioRepository->update($request->all(), $id);

        Flash::success('Estudio updated successfully.');

        return redirect(route('estudios.index'));
    }

    /**
     * Remove the specified estudio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estudio = $this->estudioRepository->findWithoutFail($id);

        if (empty($estudio)) {
            Flash::error('Estudio not found');

            return redirect(route('estudios.index'));
        }

        $this->estudioRepository->delete($id);

        Flash::success('Estudio deleted successfully.');

        return redirect(route('estudios.index'));
    }
}
