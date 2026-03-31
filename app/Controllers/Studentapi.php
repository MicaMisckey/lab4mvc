<?php

namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\RESTful\ResourceController;

class StudentApi extends ResourceController
{
    protected $modelName = 'App\Models\StudentModel';
    protected $format    = 'json';

    // GET /api/students
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /api/students/{id}
    public function show($id = null)
    {
        $student = $this->model->find($id);
        if (!$student) {
            return $this->failNotFound('Student not found');
        }
        return $this->respond($student);
    }

    // POST /api/students
    public function create()
    {
        $data = $this->request->getJSON(true);
        if ($this->model->save($data)) {
            return $this->respondCreated(['message' => 'Student created']);
        }
        return $this->fail($this->model->errors());
    }

    // PUT /api/students/{id}
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        if ($this->model->update($id, $data)) {
            return $this->respond(['message' => 'Student updated']);
        }
        return $this->fail($this->model->errors());
    }

    // DELETE /api/students/{id}
    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Student deleted']);
    }
}