<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller {
    public function __construct() {
        $this->middleware( 'guest' );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {

        return view( 'auth.login' );
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store( Request $request ): \Illuminate\Http\RedirectResponse {
        // validate user
        $this->validate( $request, [
            'email'    => 'required|email',
            'password' => 'required'
        ] );

        // sign user in
        if ( ! auth()->attempt( $request->only( 'email', 'password' ), $request->remember ) ) {
            return back()->with( 'status', 'Invalid login credentials' );
        }

        // redirect
        return redirect()->route( 'dashboard' );
    }
}

