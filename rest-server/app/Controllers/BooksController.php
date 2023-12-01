<?php

namespace App\Controllers;

use App\Models\BooksModel;
use CodeIgniter\RESTful\ResourceController;

class BooksController extends ResourceController
{
    protected $modelName = 'App\Models\BooksModel';
    protected $format    = 'json';

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new BooksModel();
        $books = $model->findAll();

        return $this->respond($books);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new BooksModel();
        $data = [
            'books' => $model->find($id)
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    /**
     * Create a new book
     *
     * @return mixed
     */
    public function create()
    {
        $model = new BooksModel();

        // Get JSON data from the request
        $data = $this->request->getJSON();

        // Validation rules
        $validationRules = [
            'title'       => 'required|min_length[3]',
            'category_id' => 'required|numeric',
            'author_id'   => 'required|numeric',
            'description' => 'required',
        ];

        // Run validation
        if (!$this->validate($validationRules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        // Insert the book if validation passes
        if ($model->insert($data)) {
            return $this->respondCreated(['message' => 'Book created successfully']);
        } else {
            return $this->failValidationErrors($model->errors());
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new BooksModel();

        $data = $this->request->getJSON();

        // Validation rules
        $validationRules = [
            'title'       => 'required|min_length[3]',
            'category_id' => 'required|numeric',
            'author_id'   => 'required|numeric',
            'description' => 'required',
        ];

        // Run validation
        if (!$this->validate($validationRules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        if ($model->update($id, $data)) {
            return $this->respond(['message' => 'Book updated successfully']);
        } else {
            return $this->failValidationErrors($model->errors());
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new BooksModel();

        if ($model->delete($id)) {
            return $this->respond(['message' => 'Book deleted successfully']);
        } else {
            return $this->fail(['message' => 'Failed to delete book']);
        }
    }
}
