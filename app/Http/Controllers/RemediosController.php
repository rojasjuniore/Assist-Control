<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRemediosRequest;
use App\Http\Requests\UpdateRemediosRequest;
use App\Models\Remedios;
use App\Repositories\RemediosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RemediosController extends AppBaseController
{
    /** @var  RemediosRepository */
    private $remediosRepository;

    public function __construct(RemediosRepository $remediosRepo)
    {
        $this->remediosRepository = $remediosRepo;
    }

    /**
     * Display a listing of the Remedios.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->remediosRepository->pushCriteria(new RequestCriteria($request));
        $remedios = $this->remediosRepository->all();

        return view('remedios.index')
            ->with('remedios', $remedios);
    }

    /**
     * Show the form for creating a new Remedios.
     *
     * @return Response
     */
    public function create()
    {
        return view('remedios.create');
    }

    /**
     * Store a newly created Remedios in storage.
     *
     * @param CreateRemediosRequest $request
     *
     * @return Response
     */
    public function store(CreateRemediosRequest $request)
    {
        $input = $request->all();

        $remedios = $this->remediosRepository->create($input);

        Flash::success('Remedios saved successfully.');

        return redirect(route('remedios.index'));
    }

    /**
     * Display the specified Remedios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $remedios = $this->remediosRepository->findWithoutFail($id);

        if (empty($remedios)) {
            Flash::error('Remedios not found');

            return redirect(route('remedios.index'));
        }

        return view('remedios.show')->with('remedios', $remedios);
    }

    /**
     * Show the form for editing the specified Remedios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $remedios = $this->remediosRepository->findWithoutFail($id);

        if (empty($remedios)) {
            Flash::error('Remedios not found');

            return redirect(route('remedios.index'));
        }

        return view('remedios.edit')->with('remedios', $remedios);
    }

    /**
     * Update the specified Remedios in storage.
     *
     * @param  int              $id
     * @param UpdateRemediosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRemediosRequest $request)
    {
        $remedios = $this->remediosRepository->findWithoutFail($id);

        if (empty($remedios)) {
            Flash::error('Remedios not found');

            return redirect(route('remedios.index'));
        }

        $remedios = $this->remediosRepository->update($request->all(), $id);

        Flash::success('Remedios updated successfully.');

        return redirect(route('remedios.index'));
    }

    /**
     * Remove the specified Remedios from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $remedios = $this->remediosRepository->findWithoutFail($id);

        if (empty($remedios)) {
            Flash::error('Remedios not found');

            return redirect(route('remedios.index'));
        }

        $this->remediosRepository->delete($id);

        Flash::success('Remedios deleted successfully.');

        return redirect(route('remedios.index'));
    }

    public function searchRemedio($remedio_id){

        $remedio = Remedios::where('id','=',$remedio_id)->first();
        return $remedio;
    }
}
