<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Base controller for the LERS project.
 *
 * Shared helpers live here so views can use URL and form helpers safely.
 */
abstract class BaseController extends Controller
{
    protected $helpers = ['url', 'form', 'text'];

    protected array $data = [];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->data['title'] = 'LERS';
    }
}
