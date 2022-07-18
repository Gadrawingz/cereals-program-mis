<?php 
namespace App\Controllers;
// Gad-Iradufasha's coding -> @gadrawingz, @donnekt
use CodeIgniter\Controllers;
use App\Models\AdminModel;
use App\Libraries\Hashing;

class AdminController extends BaseController {
    // Coding hand :https://github.com/Gadrawingz

    public function __construct() {
        helper(['url', 'form']);
    }

    public function adminRegistration() {

        $adminModel = new AdminModel();
        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);

        $data = [
            'page_title' => 'Register Admin',
            'breadcrumb' => 'Admin',
            'adminData'  => $adminData,
            'validation' => $this->validator
        ];

        return 
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/register_admin', $data).
        view('template/footer', $data);
    }

    public function adminSave() {

        $adminModel = new AdminModel();
        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);

        $data = [
            'page_title' => 'Register Admin',
            'breadcrumb' => 'Admin',
            'adminData'  => $adminData,
            'validation' => $this->validator
        ];

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
                    'required' => 'Select geneder please!'
                ]
            ],

            'telephone'=> [
                'rules' => 'required|min_length[10]|is_unique[admin.telephone]',
                'errors'=> [
                    'required' => 'Telephone number is required!',
                    'is_unique' => 'This Phone number already used!',
                    'min_length' => 'Number should have at least 10 in length'
                ]
            ],

            'admin_role'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Select admin role!'
                ]
            ],

        ]);

        if(!$validation) {
            return 
            view('template/navbar', $data).
            view('template/sidebar', $data).
            view('pages/register_admin', ['validation'=>$this->validator]).
            view('template/footer', $data);
        } else {
            $firstname  = $this->request->getPost('firstname');
            $lastname   = $this->request->getPost('lastname');
            $province   = $this->request->getPost('province');
            $district   = $this->request->getPost('district');
            $sector     = $this->request->getPost('sector');
            $cell       = $this->request->getPost('cell');
            $village    = $this->request->getPost('village');
            $gender     = $this->request->getPost('gender');
            // TEL. GOTTA BE PWD BY DEFAULT: PLAY 2 ROLES
            $telephone  = $this->request->getPost('telephone');
            $admin_role = $this->request->getPost('admin_role');

            $values = [
                'firstname'  => $firstname,
                'lastname'   => $lastname,
                'province'   => $province,
                'district'   => $district,
                'sector'     => $sector,
                'cell'       => $cell,
                'village'    => $village,
                'gender'     => $gender,
                'telephone'  => $telephone,
                'password'   => Hashing::make($telephone),
                'admin_role' => $admin_role,
            ];


            $adminModel = new \App\Models\AdminModel();
            $query = $adminModel->insert($values);

            if(!$query) {
                return redirect()->back()->with('fail', 'Something went wrong!');
            } else {
                return redirect()->to('admin/register')->with('success', 'Registration is successful!');
            }
        }
    }

    public function adminViewAll() {
        $adminModel = new AdminModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        $adminFetch   = $adminModel->where('status', 1)->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'page_title' => 'View all admins',
            'breadcrumb' => 'Admin',
            'adminData'  => $adminData,
            'admins'     => $adminFetch,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_admins', $data).
        view('template/footer', $data);
    }

    public function adminViewDisabled() {
        $adminModel = new AdminModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        $adminFetch   = $adminModel->where('status', 0)->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'page_title' => 'View disabled admins',
            'breadcrumb' => 'Admin',
            'adminData'  => $adminData,
            'admins'     => $adminFetch,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).

        view('pages/view_admins_o', $data).
        view('template/footer', $data);
    }


    public function delete($id = null) {
        $adminModel = new AdminModel();
        $data['admin'] = $adminModel->where('admin_id', $id)->delete($id);
        return $this->response->redirect(site_url('admin/all'));
    }


    public function adminView($id = null) {

        $adminModel = new AdminModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        $singleAdmin  = $adminModel->where('admin_id', $id)->first();

        $data = [
            'page_title' => "View ".$singleAdmin['firstname']." information",
            'breadcrumb' => 'Admin',
            'adminData'  => $adminData,
            'admin'=> $singleAdmin,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_admin', $data).
        view('template/footer', $data);
    }


    public function enable($id = null) {
        $adminModel = new AdminModel();
        $data = ['status'   => '1'];
        $adminModel->update($id, $data); 
        return $this->response->redirect(site_url('admin/all'));
    }

    public function disable($id = null) {
        $adminModel = new AdminModel();
        $data = ['status'   => '0'];
        $adminModel->update($id, $data); 
        return $this->response->redirect(site_url('admin/all'));
    }


    public function changepass() {
        $adminModel = new AdminModel();
        $id = session()->get('activeAdmin');

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

        $admin = $adminModel->where('admin_id', $id)->first();
        $checkPassword = Hashing::checkPassword($current, $admin['password']);

        if(!$valid_current_) {
            session()->setFlashdata('fail', "Please enter existing password!");
            return redirect()->to('admin/profile')->withInput();
        }

        if(!$valid_new_pass) {
            session()->setFlashdata('fail', "Password is neither comfirmed well nor short!");
            return redirect()->to('admin/profile')->withInput();
        }

        if(!$checkPassword) {
            session()->setFlashdata('fail', "Entered password does not exist!");
            return redirect()->to('admin/profile')->withInput();
        } else {
            $adminModel->update($id, $data);
            return $this->response->redirect(site_url('admin/dashboard'));
        }
    }




    /////////////////////////////////////////////////////////////

}
?>