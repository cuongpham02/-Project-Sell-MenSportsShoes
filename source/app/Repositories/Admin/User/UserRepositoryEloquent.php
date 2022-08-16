<?php

namespace App\Repositories\Admin\User;


use App\Models\User\User;
use App\Repositories\Admin\Role\RoleRepository;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories\User;
 */

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAllUsers($limit = null, $filter = null)
    {
        // TODO: Implement getAllUsers() method.
    }

    public function getSoftDeleteUsers()
    {
        // TODO: Implement getSoftDeleteUsers() method.
    }

    private function _withFilter($filter)
    {
        if (isset($filter['search_company_name'])) {
            $this->model = $this->model->where(function (Builder $query) use ($filter) {
                $query->where('company_name', 'LIKE', "%{$filter['search_company_name']}%");
            });
        }

        if (isset($filter['search_phone_number'])) {
            $this->model = $this->model->where(function (Builder $query) use ($filter) {
                $query->where('phone_number', 'LIKE', "%{$filter['search_phone_number']}%");
            });
        }

        if (isset($filter['sort_by']) && isset($filter['order_by'])) {
            $sort = ['desc', 'asc'];
            if (!in_array($filter['order_by'], $sort)) {
                $filter['order_by'] = 'asc';
            }

            $this->model = $this->model->orderBy($filter['sort_by'], $filter['order_by']);
        }

        return $this;
    }

}
