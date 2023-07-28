<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\UserModel;
 
class Register extends BaseController
{
 
    public function __construct(){
        helper(['form']);
    }
 
    public function index()
    {
        $data = [];
        return view('pages/register', $data);
    }
   
    public function register()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[20]',
            'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
            'address' => 'required|min_length[10]|max_length[255]',
            'phone' => 'required|min_length[10]|max_length[14]',
            'role' => 'required',
            'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
            'confirm_password'  => [ 'label' => 'confirm password', 'rules' => 'matches[password]']
        ];
           
 
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'address'  => $this->request->getVar('address'),
                'phone'    => $this->request->getVar('phone'),
                'role'     => $this->request->getVar('role'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            return view('pages/register', $data);
        }
           
    }
}