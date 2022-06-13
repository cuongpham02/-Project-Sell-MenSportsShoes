<?php

namespace App\Transformers\Permission;

use League\Fractal\TransformerAbstract;
use App\Entities\Permission\Permission;

/**
 * Class PermissionTransformer.
 *
 * @package namespace App\Transformers\Permission;
 */
class PermissionTransformer extends TransformerAbstract
{
    /**
     * Transform the Permission entity.
     *
     * @param \App\Entities\Permission\Permission $model
     *
     * @return array
     */
    public function transform(Permission $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
