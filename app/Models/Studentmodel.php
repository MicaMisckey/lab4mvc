<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table            = 'students';
    protected $primaryKey       = 'id';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['name', 'email', 'course'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';

    public function search($keyword)
    {
        return $this->like('name', $keyword)
                    ->orLike('email', $keyword)
                    ->orLike('course', $keyword)
                    ->findAll();
    }
}