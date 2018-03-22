<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservationsRequest;
use App\Http\Requests\UpdateReservationsRequest;
use App\Repositories\ReservationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ReservationsController extends AppBaseController
{
    /** @var  ReservationsRepository */
    private $reservationsRepository;

    public function __construct(ReservationsRepository $reservationsRepo)
    {
        $this->reservationsRepository = $reservationsRepo;
    }

    /**
     * Display a listing of the Reservations.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->reservationsRepository->pushCriteria(new RequestCriteria($request));
        $reservations = $this->reservationsRepository->all();

        return view('reservations.index')
            ->with('reservations', $reservations);
    }

    /**
     * Show the form for creating a new Reservations.
     *
     * @return Response
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created Reservations in storage.
     *
     * @param CreateReservationsRequest $request
     *
     * @return Response
     */
    public function store(CreateReservationsRequest $request)
    {
        $input = $request->all();

        $reservations = $this->reservationsRepository->create($input);

        Flash::success('Reservations saved successfully.');

        return redirect(route('reservations.index'));
    }

    /**
     * Display the specified Reservations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reservations = $this->reservationsRepository->findWithoutFail($id);

        if (empty($reservations)) {
            Flash::error('Reservations not found');

            return redirect(route('reservations.index'));
        }

        return view('reservations.show')->with('reservations', $reservations);
    }

    /**
     * Show the form for editing the specified Reservations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reservations = $this->reservationsRepository->findWithoutFail($id);

        if (empty($reservations)) {
            Flash::error('Reservations not found');

            return redirect(route('reservations.index'));
        }

        return view('reservations.edit')->with('reservations', $reservations);
    }

    /**
     * Update the specified Reservations in storage.
     *
     * @param  int $id
     * @param UpdateReservationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReservationsRequest $request)
    {
        $reservations = $this->reservationsRepository->findWithoutFail($id);

        if (empty($reservations)) {
            Flash::error('Reservations not found');

            return redirect(route('reservations.index'));
        }

        $reservations = $this->reservationsRepository->update($request->all(), $id);

        Flash::success('Reservations updated successfully.');

        return redirect(route('reservations.index'));
    }

    /**
     * Remove the specified Reservations from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reservations = $this->reservationsRepository->findWithoutFail($id);

        if (empty($reservations)) {
            Flash::error('Reservations not found');

            return redirect(route('reservations.index'));
        }

        $this->reservationsRepository->delete($id);

        Flash::success('Reservations deleted successfully.');

        return redirect(route('reservations.index'));
    }
}
