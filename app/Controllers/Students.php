<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Students extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new StudentModel();
    }

    // LIST with search + pagination
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $students = $this->model->search($keyword);
            $pager    = null;
        } else {
            $students = $this->model->paginate(5);
            $pager    = $this->model->pager;
        }

        return view('students/index', [
            'students' => $students,
            'pager'    => $pager,
            'keyword'  => $keyword,
        ]);
    }

    // SHOW create form
    public function create()
    {
        return view('students/create');
    }

    // STORE new student
    public function store()
    {
        $this->model->save([
            'name'   => $this->request->getPost('name'),
            'email'  => $this->request->getPost('email'),
            'course' => $this->request->getPost('course'),
        ]);

        return redirect()->to('/students')->with('success', 'Student added!');
    }

    // SHOW edit form
    public function edit($id)
    {
        $student = $this->model->find($id);
        return view('students/edit', ['student' => $student]);
    }

    // UPDATE student
    public function update($id)
    {
        $this->model->update($id, [
            'name'   => $this->request->getPost('name'),
            'email'  => $this->request->getPost('email'),
            'course' => $this->request->getPost('course'),
        ]);

        return redirect()->to('/students')->with('success', 'Student updated!');
    }

    // SOFT DELETE student
    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/students')->with('success', 'Student deleted!');
    }
}