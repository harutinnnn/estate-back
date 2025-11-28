<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class AdminMenu extends BaseConfig
{

    public array $menu = [
        [
            'link' => '/',
            'title' => 'Dashboard',
            'icon' => 'nav-icon fas fa-tachometer-alt',
            'nodes' => null
        ],
        [
            'link' => '/menu',
            'title' => 'Menu',
            'icon' => 'nav-icon fas fa-list',
            'nodes' => null
        ],
        [
            'link' => '/content',
            'title' => 'Content',
            'icon' => 'nav-icon fas fa-file-alt',
            'nodes' => null
        ],
        [
            'link' => '/posts',
            'title' => 'Posts',
            'icon' => 'nav-icon fas fa-newspaper',
            'nodes' => null
        ],
        [
            'link' => null,
            'title' => 'News',
            'icon' => 'nav-icon fas fa-newspaper',
            'nodes' => [
                [
                    'link' => '/news',
                    'title' => 'News',
                    'icon' => 'far fa-circle nav-icon',
                    'nodes' => null
                ],
                [
                    'link' => '/news_categories',
                    'title' => 'News categories',
                    'icon' => 'far fa-circle nav-icon',
                    'nodes' => null
                ],
            ]
        ],
        [
            'link' => '/tags',
            'title' => 'Tags',
            'icon' => 'nav-icon fas fa-tags',
            'nodes' => null
        ],
        [
            'link' => null,
            'title' => 'Language tools',
            'icon' => 'nav-icon fas fa-language',
            'nodes' => [
                [
                    'link' => '/frontend_labels',
                    'title' => 'Frontend labels',
                    'icon' => 'far fa-circle nav-icon',
                    'nodes' => null
                ],
                [
                    'link' => '/admin_labels',
                    'title' => 'Admin labels',
                    'icon' => 'far fa-circle nav-icon',
                    'nodes' => null
                ],
            ]
        ],
        [
            'link' => null,
            'title' => 'Settings',
            'icon' => 'nav-icon fas fa-cogs',
            'nodes' => [
                [
                    'link' => '/website_settings',
                    'title' => 'Website settings',
                    'icon' => 'far fa-circle nav-icon',
                    'nodes' => null
                ]
            ]
        ],


    ];


}