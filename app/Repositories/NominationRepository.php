<?php

namespace App\Repositories;

use App\Models\Nomination;
use App\Repositories\BaseRepository;

/**
 * Class NominationRepository
 * @package App\Repositories
 * @version April 7, 2020, 12:07 am UTC
*/

class NominationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'gender',
        'linkedin_url',
        'bio',
        'business_name',
        'reason_for_nomination',
        'no_of_nominations',
        'is_admin_selected',
        'has_won',
        'user_id',
        'image',
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
        return Nomination::class;
    }
}
