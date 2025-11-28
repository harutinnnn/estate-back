<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


/*Admin part*/

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

    /*Elfinder*/
    $routes->match(['get', 'post'], 'elfinder/connector', 'Elfinder::connector');
    $routes->get('elfinder/popup', 'Elfinder::popup');

    $routes->get('/', 'Admin::index'); // /admin

    /*Admin::login*/
    $routes->get('login', 'Admin::login'); // /admin
    $routes->post('login', 'Admin::login'); // /admin
    $routes->get('logout', 'Admin::logout'); // /admin

    /*Ajax calls*/
    $routes->post('ajax/delete-image', 'Ajax::deleteImage'); // /deleteImage
    $routes->post('ajax/post-image', 'Ajax::postImageUpload'); // /deleteImage

    /*Menu*/
    $routes->get('menu', 'Menu::index');
    $routes->post('menu/edit/(:segment)/(:segment)', 'Menu::edit/$1/$2');
    $routes->post('menu/edit/(:segment)', 'Menu::edit/$1');
    $routes->post('menu/edit_menu/(:segment)/(:segment)', 'Menu::edit_menu/$1/$2');
    $routes->post('menu/edit_menu/(:segment)', 'Menu::edit_menu/$1');
    $routes->post('menu/sort_menu/(:segment)', 'Menu::sort_menu/$1');
    $routes->post('menu/slugify/', 'Menu::slugify');
    $routes->get('menu/(:segment)/(:segment)/(:segment)', 'Menu::$1/$2/$3');
    $routes->get('menu/(:segment)/(:segment)', 'Menu::$1/$2');
    $routes->get('menu/(:segment)', 'Menu::$1');

    /*Content*/
    $routes->get('content', 'Content::index');
    $routes->post('content/edit/(:segment)/(:segment)', 'Content::edit/$1/$2');
    $routes->post('content/edit/(:segment)', 'Content::edit/$1');
    $routes->get('content/(:segment)/(:segment)/(:segment)', 'Content::$1/$2/$3');
    $routes->get('content/(:segment)/(:segment)', 'Content::$1/$2');
    $routes->get('content/(:segment)', 'Content::$1');

    /*Posts*/
    $routes->get('posts', 'Posts::index');
    $routes->post('posts/edit/(:segment)/(:segment)', 'Posts::edit/$1/$2');
    $routes->post('posts/edit/(:segment)', 'Posts::edit/$1');
    $routes->get('posts/(:segment)/(:segment)/(:segment)', 'Posts::$1/$2/$3');
    $routes->get('posts/(:segment)/(:segment)', 'Posts::$1/$2');
    $routes->get('posts/(:segment)', 'Posts::$1');

    /*News*/
    $routes->get('news', 'News::index');
    $routes->post('news/edit/(:segment)/(:segment)', 'News::edit/$1/$2');
    $routes->post('news/edit/(:segment)', 'News::edit/$1');
    $routes->get('news/(:segment)/(:segment)/(:segment)', 'News::$1/$2/$3');
    $routes->get('news/(:segment)/(:segment)', 'News::$1/$2');
    $routes->get('news/(:segment)', 'News::$1');

    /*News*/
    $routes->get('news_categories', 'NewsCategory::index');
    $routes->post('news_categories/edit/(:segment)/(:segment)', 'NewsCategory::edit/$1/$2');
    $routes->post('news_categories/edit/(:segment)', 'NewsCategory::edit/$1');
    $routes->get('news_categories/(:segment)/(:segment)/(:segment)', 'NewsCategory::$1/$2/$3');
    $routes->get('news_categories/(:segment)/(:segment)', 'NewsCategory::$1/$2');
    $routes->get('news_categories/(:segment)', 'NewsCategory::$1');

    /*AdminLabels*/
    $routes->get('admin_labels', 'AdminLabels::index');
    $routes->post('admin_labels/edit/(:segment)', 'AdminLabels::edit/$1');
    $routes->get('admin_labels/(:segment)/(:segment)/(:segment)', 'AdminLabels::$1/$2/$3');
    $routes->get('admin_labels/(:segment)/(:segment)', 'AdminLabels::$1/$2');
    $routes->get('admin_labels/(:segment)', 'AdminLabels::$1');

    /*FrontendLabels*/
    $routes->get('frontend_labels', 'FrontendLabels::index');
    $routes->post('frontend_labels/edit/(:segment)', 'FrontendLabels::edit/$1');
    $routes->get('frontend_labels/(:segment)/(:segment)/(:segment)', 'FrontendLabels::$1/$2/$3');
    $routes->get('frontend_labels/(:segment)/(:segment)', 'FrontendLabels::$1/$2');
    $routes->get('frontend_labels/(:segment)', 'FrontendLabels::$1');

    /*WebsiteSettings*/
    $routes->get('website_settings', 'WebsiteSettings::index');
    $routes->post('website_settings/edit/(:segment)', 'WebsiteSettings::edit/$1');
    $routes->get('website_settings/(:segment)/(:segment)/(:segment)', 'WebsiteSettings::$1/$2/$3');
    $routes->get('website_settings/(:segment)/(:segment)', 'WebsiteSettings::$1/$2');
    $routes->get('website_settings/(:segment)', 'WebsiteSettings::$1');

    /*Tags*/
    $routes->get('tags', 'Tags::index');
    $routes->post('tags/edit/(:segment)', 'Tags::edit/$1');
    $routes->get('tags/(:segment)/(:segment)/(:segment)', 'Tags::$1/$2/$3');
    $routes->get('tags/(:segment)/(:segment)', 'Tags::$1/$2');
    $routes->get('tags/(:segment)', 'Tags::$1');


});