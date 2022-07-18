<?php 
namespace App\Controllers;
// Gad-Iradufasha's coding -> @gadrawingz, @donnekt
use CodeIgniter\Controllers;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Libraries\Hashing;

class UserController extends BaseController {
    // Coding hand :https://github.com/Gadrawingz

    public function __construct() {
        helper(['url', 'form']);
    }

    public function index() {
        $adminModel = new AdminModel();
        $userModel  = new userModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        $farmerFetch  = $userModel->where('status', 1)->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'page_title' => 'View active farmers',
            'breadcrumb' => 'Farmer',
            'adminData'  => $adminData,
            'farmers'    => $farmerFetch,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_farmers', $data).
        view('template/footer', $data);
    }


    public function farmerInactive() {
        $adminModel = new AdminModel();
        $userModel  = new userModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        $farmerFetch  = $userModel->where('status', 0)->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'page_title' => 'View inactive farmers',
            'breadcrumb' => 'Farmer',
            'adminData'  => $adminData,
            'farmers'    => $farmerFetch,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_farmers_o', $data).
        view('template/footer', $data);
    }

    public function enable($id = null) {
        $userModel = new userModel();
        $data = ['status'   => '1'];
        $userModel->update($id, $data); 
        return $this->response->redirect(site_url('farmer/active'));
    }

    public function disable($id = null) {
        $userModel = new userModel();
        $data = ['status'   => '0'];
        $userModel->update($id, $data); 
        return $this->response->redirect(site_url('farmer/inactive'));
    }


    public function changepass() {
        $userModel = new UserModel();
        $id = session()->get('activeUser');

        $current  = $this->request->getVar('current');
        $password = $this->request->getVar('password');
        
        $valid_current_ = $this->validate([
            'current' => [
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors'=> [
                    'required' => 'Current password is required!'
                ]
            ]
        ]);

        $valid_new_pass = $this->validate([
            'password'=> [
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors'=> [
                    'required' => 'Password is required!',
                    'min_length' => 'Password must have at least 5 in length!',
                    'max_length' => 'Password must have less than 20 in length!'
                ]
            ],

            'cpassword'=> [
                'rules' => 'required|min_length[5]|max_length[20]|matches[password]',
                'errors'=> [
                    'required' => 'You must confirm password!',
                    'min_length' => 'Confirm Password must have at least 5 in length!',
                    'max_length' => 'Confirm Password must have less than 15 in length!',
                    'matches' => "Confirm Password does not match to password!"
                ]
            ],
        ]);

        $data = ['password'=> Hashing::make($password)];

        $farmer = $userModel->where('farmer_id', $id)->first();
        $checkPassword = Hashing::checkPassword($current, $farmer['password']);

        if(!$valid_current_) {
            session()->setFlashdata('fail', "Please enter existing password!");
            return redirect()->to('farmer/profile')->withInput();
        }

        if(!$valid_new_pass) {
            session()->setFlashdata('fail', "Password is neither comfirmed well nor short!");
            return redirect()->to('farmer/profile')->withInput();
        }

        if(!$checkPassword) {
            session()->setFlashdata('fail', "Entered password does not exist!");
            return redirect()->to('farmer/profile')->withInput();
        } else {
            $userModel->update($id, $data);
            return $this->response->redirect(site_url('farmer/dashboard'));
        }

    }

}
?>