<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRestaurantAPIRequest;
use App\Http\Requests\API\UpdateRestaurantAPIRequest;
use App\Models\Restaurant;
use App\Repositories\RestaurantRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RestaurantController
 * @package App\Http\Controllers\API
 */

class RestaurantAPIController extends AppBaseController
{
    /** @var  RestaurantRepository */
    private $restaurantRepository;

    public function __construct(RestaurantRepository $restaurantRepo)
    {
        $this->restaurantRepository = $restaurantRepo;
    }

    /**
     * Display a listing of the Restaurant.
     * GET|HEAD /restaurants
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $restaurants = $this->restaurantRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($restaurants->toArray(), 'Restaurants retrieved successfully');
    }

    /**
     * Store a newly created Restaurant in storage.
     * POST /restaurants
     *
     * @param CreateRestaurantAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRestaurantAPIRequest $request)
    {
        $input = $request->all();

        $restaurant = $this->restaurantRepository->create($input);

        return $this->sendResponse($restaurant->toArray(), 'Restaurant saved successfully');
    }

    /**
     * Display the specified Restaurant.
     * GET|HEAD /restaurants/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Restaurant $restaurant */
        $restaurant = $this->restaurantRepository->find($id);

        if (empty($restaurant)) {
            return $this->sendError('Restaurant not found');
        }

        return $this->sendResponse($restaurant->toArray(), 'Restaurant retrieved successfully');
    }

    /**
     * Update the specified Restaurant in storage.
     * PUT/PATCH /restaurants/{id}
     *
     * @param int $id
     * @param UpdateRestaurantAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRestaurantAPIRequest $request)
    {
        $input = $request->all();

        /** @var Restaurant $restaurant */
        $restaurant = $this->restaurantRepository->find($id);

        if (empty($restaurant)) {
            return $this->sendError('Restaurant not found');
        }

        $restaurant = $this->restaurantRepository->update($input, $id);

        return $this->sendResponse($restaurant->toArray(), 'Restaurant updated successfully');
    }

    /**
     * Remove the specified Restaurant from storage.
     * DELETE /restaurants/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Restaurant $restaurant */
        $restaurant = $this->restaurantRepository->find($id);

        if (empty($restaurant)) {
            return $this->sendError('Restaurant not found');
        }

        $restaurant->delete();

        return $this->sendSuccess('Restaurant deleted successfully');
    }
}
