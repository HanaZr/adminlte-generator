<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatalogueRequest;
use App\Http\Requests\UpdateCatalogueRequest;
use App\Repositories\CatalogueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CatalogueController extends AppBaseController
{
    /** @var  CatalogueRepository */
    private $catalogueRepository;

    public function __construct(CatalogueRepository $catalogueRepo)
    {
        $this->catalogueRepository = $catalogueRepo;
    }

    /**
     * Display a listing of the Catalogue.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catalogueRepository->pushCriteria(new RequestCriteria($request));
        $catalogues = $this->catalogueRepository->all();

        return view('catalogues.index')
            ->with('catalogues', $catalogues);
    }

    /**
     * Show the form for creating a new Catalogue.
     *
     * @return Response
     */
    public function create()
    {
        return view('catalogues.create');
    }

    /**
     * Store a newly created Catalogue in storage.
     *
     * @param CreateCatalogueRequest $request
     *
     * @return Response
     */
    public function store(CreateCatalogueRequest $request)
    {
        $input = $request->all();

        $catalogue = $this->catalogueRepository->create($input);

        Flash::success('Catalogue saved successfully.');

        return redirect(route('catalogues.index'));
    }

    /**
     * Display the specified Catalogue.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catalogue = $this->catalogueRepository->findWithoutFail($id);

        if (empty($catalogue)) {
            Flash::error('Catalogue not found');

            return redirect(route('catalogues.index'));
        }

        return view('catalogues.show')->with('catalogue', $catalogue);
    }

    /**
     * Show the form for editing the specified Catalogue.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catalogue = $this->catalogueRepository->findWithoutFail($id);

        if (empty($catalogue)) {
            Flash::error('Catalogue not found');

            return redirect(route('catalogues.index'));
        }

        return view('catalogues.edit')->with('catalogue', $catalogue);
    }

    /**
     * Update the specified Catalogue in storage.
     *
     * @param  int $id
     * @param UpdateCatalogueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatalogueRequest $request)
    {
        $catalogue = $this->catalogueRepository->findWithoutFail($id);

        if (empty($catalogue)) {
            Flash::error('Catalogue not found');

            return redirect(route('catalogues.index'));
        }

        $catalogue = $this->catalogueRepository->update($request->all(), $id);

        Flash::success('Catalogue updated successfully.');

        return redirect(route('catalogues.index'));
    }

    /**
     * Remove the specified Catalogue from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catalogue = $this->catalogueRepository->findWithoutFail($id);

        if (empty($catalogue)) {
            Flash::error('Catalogue not found');

            return redirect(route('catalogues.index'));
        }

        $this->catalogueRepository->delete($id);

        Flash::success('Catalogue deleted successfully.');

        return redirect(route('catalogues.index'));
    }
}
