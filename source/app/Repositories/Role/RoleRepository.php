<?php

namespace App\Repositories\Role;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RoleRepository.
 *
 * @package namespace App\Repositories\Role;
 */
interface RoleRepository extends RepositoryInterface
{
    public function getAllRoles(array $attributes = null);
    public function getSoftDeleteRoles();
}
