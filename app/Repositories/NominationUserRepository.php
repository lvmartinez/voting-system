<?php

namespace App\Repositories;

use App\Models\NominationUser;
use App\Repositories\BaseRepository;

/**
 * Class NominationUserRepository
 * @package App\Repositories
 * @version April 7, 2020, 12:19 am UTC
*/

class NominationUserRepository extends BaseRepository
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
        return NominationUser::class;
    }
}
