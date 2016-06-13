<?php

namespace App\Http\Controllers\Backend;

use App\Smile\Accounts\AccountFormRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;

class AuthController extends BackendController
{
    public $loginView = 'backend.accounts.login';
    protected $redirectTo, $redirectAfterLogout;
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct()
    {
        parent::__construct();
        $this->redirectTo = route('backend.dashboard.index');
        $this->redirectAfterLogout = route('backend.login');
    }

    public function getLogin(){
        return view('backend.accounts.login');
    }

    public function postLogin(AccountFormRequest $request){
        return $this->login($request);
    }

    public function login(Request $request)
    {


        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles && ! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $throttles
     * @return \Illuminate\Http\Response
     */
    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }
        if(empty($user = Auth::user()) || $user->status != STATUS_ACTIVATED){
            return redirect()->back()->with(['error' => trans('auth.status_deactivate')]);
        }
        return redirect()->intended($this->redirectPath());
    }
    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => trans('auth.failed_msg'),
            ])->with(['error' => [
                'title' => trans('auth.failed_title'),
                'msg' => trans('auth.failed_msg')
            ]]);
    }
    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        $data = $request->only('password');
        $username = $request->input($this->loginUsername());
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $data['username'] = $username;
        }else{
            $data['email'] = $username;
        }
        return $data;
    }


    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard($this->getGuard())->logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function loginUsername()
    {
        return 'username';
    }

}