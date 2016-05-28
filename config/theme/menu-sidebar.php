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
                'lang' => 'backend.menus.users.title',
                'route' => 'backend.users.index'
            ),
            array(
                'title' => 'Create',
                'lang' => 'backend.menus.users.create',
                'route' => 'backend.users.create',
            ),
        )
    ),
    /*  array(
        'title'  => 'Danh mục',
        'icon'   => 'fa-tasks',
        'active' => 'categories*',
        'sub'    => array(
            array(
                'title' => 'Danh sách',
                'route' => 'backend.categories.index'
            ),
            array(
                'title' => 'Thêm mới',
                'route' => 'backend.categories.create',
            ),
        )
    ),
    array(
        'title'  => 'Phân quyền',
        'icon'   => 'fa-cogs',
        'active' => 'group*',
        'sub'    => array(
            array(
                'title' => 'Danh sách',
                'route' => 'backend.groups.index'
            ),
            array(
                'title' => 'Thêm mới',
                'route' => 'backend.groups.create',
            )
        )
    ),*/

);