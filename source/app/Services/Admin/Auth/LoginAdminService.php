<?php

namespace App\Services\Admin\Auth;

class LoginAdminService
{
    /**
     * Handle login
     * @param array $attrs
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function doLogin(array $attrs) {
        $login = auth()->guard('admins')->attempt($attrs);
        if(! $login) {
            $error = __('messages.fail.auth');

            return back()->withInput()->withErrors($error);
        }

        return redirect()->route('products.show-list-product');
    }
}
