<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\BaseController;

class BooksController extends BaseController
{
    public function index()
    {
        // Get the request instance
        $request = service('request');

        // Initialize HTTP client
        $client = service('curlrequest');

        // Send a GET request to the REST server endpoint
        $response = $client->request('GET', 'http://localhost:8080/api/books');

        // Check if the request was successful
        if ($response->getStatusCode() === 200) {
            // Parse the JSON response
            $data = [
                'books' => json_decode($response->getBody(), false)
            ];

            return view('books/index', $data);
        } else {
            // Handle the error, for example:
            return 'Error fetching data from REST server';
        }
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
