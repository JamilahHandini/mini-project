<?php

namespace App\Controllers;

use App\Models\TaskModel;

class PageController extends BaseController
{
    public function index()
    {
        return view('pages/list');
    }

    public function insert()
    {
        return view('pages/form');
    }

    public function getTasks() //ambil semua data tasks dari database
    {

        $request = service('request');
        $response = array();

        $tasks = new TaskModel();
    
        $records = $tasks->getTasks();

        $data = array();

        foreach ($records as $record) {

            $data[] = array(
                "id" => $record['id'],
                "judul" => $record['judul'],
                "status" => $record['status'],
            );
        }

        $response = array(
            "data" => $data,
        );

        return $this->response->setJSON($response);
    }

    public function add() 
    {
    
        $judul = $this->request->getPost('judul');

        $taskModel = new TaskModel();
        $taskModel->insert([
            'judul' => $judul,
        ]);

        return $this->response->setJSON(['success' => true]);
    }

    public function getTaskDetail($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        // Perform any necessary data processing or additional queries for detailed data

        return $this->response->setJSON(['data' => $task]);
    }

    public function updateTask($id)
    {
        
        $updatedData = [
            'id' => $id,
            'judul' => $this->request->getPost('judul'),
            'status' => $this->request->getPost('status'),
        ];

        $taskModel = new TaskModel();
        $taskModel->updateData($updatedData);

        return $this->response->setJSON(['success' => true]);
    }

    public function updateStatusTask($id)
    {
        
        $updatedData = [
            'id' => $id,
            'status' => $this->request->getPost('status'),
        ];

        $taskModel = new TaskModel();
        $taskModel->updateStatus($updatedData);

        return $this->response->setJSON(['success' => true]);
    }

    public function deleteTask($id)
    {
        

        $taskModel = new TaskModel();
        $taskModel->delete($id);

        return $this->response->setJSON(['success' => true]);
    }
}
