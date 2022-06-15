<?php

namespace App\Services\Admin\Auth;

use Illuminate\Support\Facades\Auth;

class LoginAdminService
{
    /**
     * Handle login Admin
     * @param array $attrs
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function doLogin(array $attrs) {
        $login = Auth::guard('admins')->attempt($attrs);

        if(!$login) {
            $error = __('messages.fail.auth');
            return back()->withInput()->withErrors($error);
        }

      return redirect()->route('admin.dashboard.index');

    }
}
