<?php

namespace App\Repositories;

use App\Models\Restaurant;
use App\Repositories\BaseRepository;

/**
 * Class RestaurantRepository
 * @package App\Repositories
 * @version March 12, 2022, 5:21 pm UTC
*/

class RestaurantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Restaurant::class;
    }
}
