<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks'; // Nama tabel tasks di database
    protected $allowedFields = ['judul', 'status'];

    public function getTasks()
    {
        return $this->select('*')->findAll();
    }

    public function updateData($updatedData)
    {
        $this->where('id', $updatedData['id']);

        $this->set([
            'judul' => $updatedData['judul'],
            'status' => $updatedData['status'],
        ]);

        $this->update();
    }

    public function updateStatus($updatedData)
    {
        $this->where('id', $updatedData['id']);

        $this->set([
            'status' => $updatedData['status'],
        ]);

        $this->update();
    }

}
