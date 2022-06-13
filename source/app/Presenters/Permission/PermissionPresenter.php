<?php

namespace App\Presenters\Permission;

use App\Transformers\Permission\PermissionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PermissionPresenter.
 *
 * @package namespace App\Presenters\Permission;
 */
class PermissionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PermissionTransformer();
    }
}
