<?php

namespace App\Repositories;

use App\Models\Voting;
use App\Repositories\BaseRepository;

/**
 * Class VotingRepository
 * @package App\Repositories
 * @version April 7, 2020, 12:20 am UTC
*/

class VotingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'nomination_id',
        'category_id'
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
        return Voting::class;
    }
}
