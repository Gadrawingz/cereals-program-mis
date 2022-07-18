<?php 
namespace App\Controllers;
// Gad-Iradufasha's coding -> @gadrawingz, @donnekt
use CodeIgniter\Controllers;
use App\Libraries\Hashing;

class AuthController extends BaseController {
    // Coding hand :https://github.com/Gadrawingz

    public function __construct() {
        helper(['url', 'form']);
    }

    public function registerFarmer() {
        return view('auth/register_farmer');
    }

    // Save Farmer
    public function saveFarmer() {
        $data = [
            'app_name' => "Cereal MIS",
            'page_title' => "Farmer Registration",
            'page_sub_title' => "Please enter your account info",
            'page_footer' => "Copyright ©".date('Y').". All rights reserved."
        ];

        // Validation
        $validation = $this->validate([
            'firstname'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Your firstname is required!'
                ]
            ],

            'lastname'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Your lastname is required!'
                ]
            ],

            'province'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Province is required!'
                ]
            ],

            'district'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'District is required!'
                ]
            ],

            'sector'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Sector is required!'
                ]
            ],

            'cell'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Cell is required!'
                ]
            ],

            'village'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Village is required!'
                ]
            ],

            'gender'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Gender is required!'
                ]
            ],

            'telephone'=> [
                'rules' => 'required|min_length[10]|is_unique[farmer.telephone]',
                'errors'=> [
                    'required' => 'Telephone number is required!',
                    'is_unique' => 'This Phone number already used!',
                    'min_length' => 'Number should have at least 10 in length'
                ]
            ],

            /*'email'=> [
                'rules' => 'required|valid_email|is_unique[tableName.email]',
                'errors'=> [
                    'required' => 'Your email is required!',
                    'valid_email' => 'Your email is invalid!',
                    'is_unique' => 'This email already taken!'
                ]
            ],*/

            'password'=> [
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors'=> [
                    'required' => 'Password is required!',
                    'min_length' => 'Password must have at least 5 in length!',
                    'max_length' => 'Password must have less than 20 in length!'
                ]
            ],

            'cpassword'=> [
                'rules'=> 'required|min_length[5]|max_length[20]|matches[password]',
                'errors'=> [
                    'required'  =>'You must confirm password!',
                    'min_length'=>'Confirm Password must have at least 5 in length',
                    'max_length'=>'Confirm Password must have less than 15 in length!',
                    'matches'   =>'Confirm Password does not match to password!'
                ]
            ],

        ]);


        if(!$validation) {
            return view('auth/register_farmer', ['validation'=>$this->validator, $data]);
        } else {
            // Done
            $firstname = $this->request->getPost('firstname');
            $lastname  = $this->request->getPost('lastname');
            $province  = $this->request->getPost('province');
            $district  = $this->request->getPost('district');
            $sector    = $this->request->getPost('sector');
            $cell      = $this->request->getPost('cell');
            $village   = $this->request->getPost('village');
            $gender    = $this->request->getPost('gender');
            $telephone = $this->request->getPost('telephone');
            $password  = $this->request->getPost('password');

            $values = [
                'firstname' => $firstname,
                'lastname'  => $lastname,
                'province'  => $province,
                'district'  => $district,
                'sector'    => $sector,
                'cell'    => $cell,
                'village'    => $village,
                'gender'    => $gender,
                'telephone'    => $telephone,
                'password'    => Hashing::make($password),
            ];

            $userModel = new \App\Models\UserModel();
            $query = $userModel->insert($values);

            if(!$query) {
                return redirect()->back()->with('fail', 'Something went wrong!');
            } else {
                return redirect()->to('farmer/register')->with('success', 'Registration is successful!', );
            }
        }
    }

    public function loginFarmer() {

        return view('auth/login_farmer');
    }

    public function checkFarmer() {

        // Lets validate 1st
        $validation = $this->validate([
            'telephone'=> [
                'rules' => 'required|is_not_unique[farmer.telephone]',
                'errors'=> [
                    'required' => 'Phone number is required!',
                    'is_not_unique' => 'Your Tel.number is not known!'
                ]
            ],

            'password'=> [
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors'=> [
                    'required' => 'Password is required!',
                    'min_length' => 'Password must have at least 5 in length!',
                    'max_length' => 'Password must have less than 20 in length!'
                ]
            ],
        ]);

        if(!$validation) {
            return view('auth/login_farmer', ['validation'=>$this->validator]);
        } else {
            // checkPassword

            $telephone = $this->request->getPost('telephone');
            $password  = $this->request->getPost('password');

            $userModel = new \App\Models\UserModel();
            $user = $userModel->where('telephone', $telephone)->first();
            $checkPassword = Hashing::checkPassword($password, $user['password']);

            if(!$checkPassword) {
                session()->setFlashdata('fail', "Invalid password!");
                return redirect()->to('farmer/login')->withInput();

            } else if($user['status']!=1) {
                session()->setFlashdata('fail', "Your account is not approved!");
                return redirect()->to('farmer/login')->withInput();
            } else {
                $farmer_id = $user['farmer_id'];
                session()->set('activeUser', $farmer_id);
                return redirect()->to('farmer/dashboard');
            }
        }
    }


    // [=========================================================] //

    public function loginAdmin() {

        return view('auth/login_admin');
    }

    public function checkAdmin() {

        // Lets validate 1st
        $validation = $this->validate([
            'telephone'=> [
                'rules' => 'required|is_not_unique[admin.telephone]',
                'errors'=> [
                    'required' => 'Phone number is required!',
                    'is_not_unique' => 'Your phone number is incorrect!'
                ]
            ],

            'password'=> [
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors'=> [
                    'required' => 'Password is required!',
                    'min_length' => 'Password must have at least 5 in length!',
                    'max_length' => 'Password must have less than 20 in length!'
                ]
            ],
        ]);

        if(!$validation) {
            return view('auth/login_admin', ['validation'=>$this->validator]);
        } else {
            // checkPassword
            $telephone = $this->request->getPost('telephone');
            $password  = $this->request->getPost('password');

            $adminModel = new \App\Models\AdminModel();
            $admin = $adminModel->where('telephone', $telephone)->first();
            $checkPassword = Hashing::checkPassword($password, $admin['password']);

            if(!$checkPassword) {
                session()->setFlashdata('fail', "Invalid password!");
                return redirect()->to('admin/login')->withInput();
            } else {
                $admin_id = $admin['admin_id'];
                $admin_role = $admin['admin_role'];
                session()->set('activeAdmin', $admin_id);
                session()->set('adminRole', $admin_role);
                return redirect()->to('admin/dashboard');
            }
        }
    }

}