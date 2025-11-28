<?php

namespace Config;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class Localization implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get locale from URI (e.g., /en, /ru, /hy)
        $locale = $request->getLocale();

        // Set the locale for the system
        Services::language()->setLocale($locale);

        // Optional: set system-wide locale
        service('request')->setLocale($locale);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nothing needed after
    }
}
