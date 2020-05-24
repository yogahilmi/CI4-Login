<?php namespace App\Models;

use CodeIgniter\Model;

class Pagelogins extends Model {

    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['nama', 'email', 'level', 'password', 'dibuat'];
    protected $beforeInsert  = ['beforeInsert'];
    protected $beforeUpdate  = ['beforeUpdate'];

    protected function beforeInsert(array $data) {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function beforeUpdate(array $data) {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function passwordHash(array $data) {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}