<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AdminSidebareMenuViewComposer
{
    public function compose(View $view)
    {
        $menu = [
            [
                'name'   => 'Dashboard',
                'slug'   => 'admin/users/dashboard',
                'route'  => 'user.dashboard',
                'params' => [],
                'roles'  => []
            ],
            [
                'name'   => 'write post',
                'slug'   => 'admin/post/store',
                'route'  => 'post.store',
                'params' => [],
                'roles'  => []
            ],
            [
                'name'   => 'manage posts',
                'slug'   => 'admin/post/manage',
                'route'  => 'post.index',
                'params' => [],
                'roles'  => []
            ],
            [
                'name'   => 'update profile',
                'slug'   => 'admin/users/update',
                'route'  => 'user.update',
                'params' => [],
                'roles'  => []
            ],
            [
                'name'   => 'pages',
                'slug'   => 'admin/pages/manage',
                'route'  => 'page.manage',
                'params' => [],
                'roles'  => ['admin']
            ],
            [
                'name'   => 'users',
                'slug'   => 'admin/users/manage',
                'route'  => 'user.manage',
                'params' => [],
                'roles'  => ['admin']
            ],
            [
                'name'   => 'images',
                'slug'   => 'admin/images/manage',
                'route'  => 'image.manage',
                'params' => [],
                'roles'  => ['admin', 'user']
            ],
            [
                'name'   => 'categories',
                'slug'   => 'admin/categories/manage',
                'route'  => 'category.manage',
                'params' => [],
                'roles'  => ['admin']
            ],
            [
                'name'   => 'projects',
                'slug'   => 'admin/projects/manage',
                'route'  => 'project.manage',
                'params' => [],
                'roles'  => ['admin', 'user']
            ],
            [
                'name'   => 'tracking',
                'slug'   => 'admin/tracking/manage',
                'route'  => 'track.manage',
                'params' => [],
                'roles'  => ['admin']
            ],
            [
                'name'   => 'messages',
                'slug'   => 'admin/messages/manage',
                'route'  => 'message.manage',
                'params' => [],
                'roles'  => ['admin']
            ],
            [
                'name'   => 'schedule',
                'slug'   => 'admin/schedule/manage',
                'route'  => 'schedule.manage',
                'params' => [],
                'roles'  => ['admin', 'user']
            ],
            [
                'name'   => 'career',
                'slug'   => 'admin/jobs/manage',
                'route'  => 'job.manage',
                'params' => [],
                'roles'  => ['admin', 'user']
            ],
        ];
        $view->with([
            'sidebar_nav' => $menu,
        ]);
    }
}
