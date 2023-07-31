<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\UserModel;
 
class Login extends BaseController
{
    public function index()
    {
        return view('pages/login');
    } 
   
    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();
 
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
         
        $user = $userModel->where('email', $email)->first();
 
        if(is_null($user)) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }
 
        $pwd_verify = password_verify($password, $user['password']);
 
        if(!$pwd_verify) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }
 
        $ses_data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'name' => $user['name'],
            'role' => $user['role'],
            'isLoggedIn' => TRUE
        ];
 
        $session->set($ses_data);
        return redirect()->to('/dashboard');
         
        
    }
 
    public function logout() {
        session_destroy();
        return redirect()->to('/');
    }
}