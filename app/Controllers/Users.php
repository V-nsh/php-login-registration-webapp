<?php 
namespace App\Controllers;
use Config\App;
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

    public function signinIndex() {
        helper('form');
        $baseURL = config('App')->baseURL;
        $data['baseURL'] = $baseURL;
        if (! $this->request->is('post')) {
            return view('templates/header', ['title' => 'Sign in here!'])
                . view('users/signin', $data)
                . view('templates/footer');
        }
    }

    public function loginAuth() {
        $session = session();
        $model = new UsersModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            if(password_verify($password, $pass)) {
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => true,
                ];
                $session->set($ses_data);
                return redirect()->to('/user//' . $data['id'])->with('success', 'Successfully logged in!');
            } else {
                return redirect()->to('/user/signin')->withInput('error', 'Email or Password is incorrect!');
            }
        } else{
            return redirect()->to('/user/signin')->withInput('error', 'Email does not exist!');
        }
    }

    public function editIndex() {
        helper('form');
        $session = session();
        $data['name'] = $session->get('name');
        $data['email'] = $session->get('email');
        if (! $this->request->is('post')) {
            return view('templates/header', ['title' => 'Edit Profile'])
                . view('users/edit', $data)
                . view('templates/footer');
        }
    }

    public function editAuth() {
        helper('form');
        $session = session();
        $model = new UsersModel();
        $id = $session->get('id');
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $data = $model->where('id', $id)->first();
        if ($data) {
            $model->update($id, [
                'name' => $name,
                'email' => $email,
            ]);
            $ses_data = [
                'id' => $data['id'],
                'name' => $name,
                'email' => $email,
                'isLoggedIn' => true,
            ];
            $session->set($ses_data);
            $session->session_cache_expire = '60'; 
            return redirect()->to('/user//' . $data['id'])->with('success', 'Successfully edited profile!');
        } else{
            return redirect()->to('/user/edit')->withInput('error', 'Something went wrong!');
        }
    }
}
?>