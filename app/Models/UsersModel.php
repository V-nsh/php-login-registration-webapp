<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model {
    protected $table = 'interns';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'password', 'email'];

    public function getUser($id = false) {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function getUsers() {
        return $this->findAll();
    }
}
?>