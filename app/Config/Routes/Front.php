<?php

use CodeIgniter\Router\RouteCollection;
use Config\Database;

/**
 * @var RouteCollection $routes
 */


$db = Database::connect();
$query = $db->table('lang')->select('lang')->get();
$locales = array_column($query->getResultArray(), 'lang');

$categoriesQuery = $db->table('news_categories')->select('news_categories.slug,news_categories.id')
    ->join('news_categories_ml', "news_categories_ml.parent_id = news_categories.id")
    ->get()->getResultArray();
$categories = array_column($categoriesQuery, 'slug', 'id');


$routes->get('/', 'Home::index');

$routes->get('/email-send', 'Content::emailSend');



//Category page
$routes->get('(' . implode('|', $locales) . ')/posts/(' . implode('|', $categories) . ')', 'Post::index/$2');

//Post page
$routes->get('(' . implode('|', $locales) . ')/(' . implode('|', $categories) . ')/(:segment)/(:num)', 'Post::view/$3/$4');



$routes->get('(' . implode('|', $locales) . ')/news/(:num)', 'News::view/$2');
$routes->get('/news/(:num)', 'News::view/$1');

$routes->get('(' . implode('|', $locales) . ')/news', 'News::index');
$routes->get('/news', 'News::index');

$routes->get('(' . implode('|', $locales) . ')', 'Home::index/$1');


// With language prefix
$routes->get('(' . implode('|', $locales) . ')/(:segment)', 'Content::index/$1/$lang');
// Without language prefix
$routes->get('(:segment)', 'Content::index/$1');

