<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class ProfileComposer
{
    protected $users;

    public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('_user', \Auth::user());
        $view->with('_sidebarMenu', config('theme.menu-sidebar', []));
    }
}