<?php

return array(
    array(
        'title'  => 'Dashboard',
        'icon'   => 'fa fa-dashboard',
        'route'  => 'backend.dashboard.index',
        'active' => '/',
    ),
    array(
        'title'  => 'Users',
        'lang'   => 'backend.menus.users.title',
        'icon'   => 'fa fa-user',
        'active' => 'users*',
        'sub'    => array(
            array(
                'title' => 'Lists',
                'lang'  => 'backend.menus.users.title',
                'route' => 'backend.users.index',
            ),
            array(
                'title' => 'Create',
                'lang'  => 'backend.menus.users.create',
                'route' => 'backend.users.create',
            ),
        ),
    ),
    array(
        'title'  => 'Post',
        'lang'   => 'backend.menus.posts.title',
        'icon'   => 'glyphicon glyphicon-list-alt',
        'active' => 'posts*',
        'sub'    => array(
            array(
                'title' => 'Lists',
                'lang'  => 'backend.menus.posts.title',
                'route' => 'backend.posts.index',
            ),
            array(
                'title' => 'Create',
                'lang'  => 'backend.menus.posts.create',
                'route' => 'backend.posts.create',
            ),
        ),
    ),
    array(
        'title'  => 'Logs',
        'lang'   => 'backend.menus.logs.title',
        'route' => 'backend.posts.index',
        'icon'   => 'fa fa-bug',
        'active' => 'logs*',
    ),
);