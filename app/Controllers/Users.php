<?php 
namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController {

    
    // might be used to get all users but we don't need that for now
    public function index() {
        $model = new UsersModel();
        $data['users'] = $model->getUsers();
    }

    public function view($id=null) {
        $model = new UsersModel();
        $data = [
            'user' => $model->getUser($id)->getRow(),
            'title' => 'User Profile',
        ];

        if (empty($data['user'])) {
            throw new PageNotFoundException('Cannot find the user with id: ' . $id);
        }

        return view('templates/header', $data) 
            . view('users/profile', $data)
            . view('templates/footer', $data);
    }

    public function create(){
        helper('form');
        if (! $this->request->is('post')) {
            return view('templates/header', ['title' => 'Register here!'])
                . view('users/register')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['name', 'email', 'password', 'password_confirm']);
        
        if ($post['password'] !== $post['password_confirm']) {
            return redirect()->back()->withInput()->with('error', 'Passwords do not match');
        }

        if (! $this->validateData($post, [
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[interns.email]',
        ])) {
            return redirect()->back()->withInput();
        }

        $model = new UsersModel();
        $model->save([
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/')->with('success', 'Successfully registered!');
    }
}
?>