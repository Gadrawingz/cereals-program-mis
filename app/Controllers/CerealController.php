<?php 
namespace App\Controllers;
// Gad-Iradufasha's coding -> @gadrawingz, @donnekt
use CodeIgniter\Controllers;
use App\Models\AdminModel;
use App\Models\CerealModel;
use App\Models\UserModel;
use App\Models\ApplicationModel;

class CerealController extends BaseController {
    // Coding hand :https://github.com/Gadrawingz

    protected $table ='application app';
    protected $db;

    public function __construct() {
        helper(['url', 'form']);

        $this->db = \Config\Database::connect();
    }

    public function cerealRegister() {

        $adminModel = new AdminModel();
        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);
        
        $cerealModel = new CerealModel();

        $data = [
            'page_title' => 'Register cereal seed',
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
        ];

        return 
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/register_cereal', $data).
        view('template/footer', $data);
    }

    public function cerealSave() {

        $adminModel  = new AdminModel();
        $cerealModel = new CerealModel();
        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);

        $data = [
            'page_title' => 'Register Cereal',
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
            'validation' => $this->validator
        ];

        $validation = $this->validate([
            'cereal_name'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Cereal name is required!',
                ]
            ],

            'cereal_type'=> [
                'rules' => 'required|is_unique[cereal.cereal_type]',
                'errors'=> [
                    'required' => 'Cereal type is required!',
                    'is_unique' => 'This cereal type exists in system!',
                ]
            ],

            'cereal_price'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Add cereal price !',
                ]
            ],

            'quantity'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'You must add cereal quantity!'
                ]
            ],

            'land_type'=> [
                'rules' => "required",
                'errors'=> [
                    'required'  => 'Land type is required!',
                ]
            ],

            'season'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Select season please!'
                ]
            ],

            'rainy'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Choose one please!'
                ]
            ],

            'sunny'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Choose one please!'
                ]
            ],
        ]);

        if(!$validation) {
            return 
            view('template/navbar', $data).
            view('template/sidebar', $data).
            view('pages/register_cereal', ['validation'=>$this->validator]).
            view('template/footer', $data);
        } else {
            $cn  = ucfirst($this->request->getVar('cereal_name'));
            $ct  = ucfirst($this->request->getVar('cereal_type'));
            $cp  = $this->request->getVar('cereal_price');
            $cq  = $this->request->getVar('quantity');
            $lt  = $this->request->getVar('land_type');
            $ss  = $this->request->getVar('season');
            $rn  = $this->request->getVar('rainy');
            $sn  = $this->request->getVar('sunny');

            $values = [
                'cereal_name'  => $cn,
                'cereal_type'  => $ct,
                'cereal_price' => $cp,
                'quantity'     => $cq,
                'land_type'    => $lt,
                'season'       => $ss,
                'rainy'        => $rn,
                'sunny'        => $sn,
            ];

            $query = $cerealModel->insert($values);

            if(!$query) {
                return redirect()->back()->with('fail', 'Something went wrong!');
            } else {
                return redirect()->to('cereal/register')->with('success', 'Cereal is registered successfully!');
            }
        }
    }


    public function cerealViewAll() {
        $adminModel  = new AdminModel();
        $cerealModel = new CerealModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        $cerealFetch  = $cerealModel->orderBy('cereal_type', 'ASC')->findAll();

        $page_title = session()->get('adminRole') =='Admin'?'View all registered cereals':'Cereal list for Agro-dealer';

        $data = [
            'page_title' => $page_title,
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
            'cereals'     => $cerealFetch,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_cereals', $data).
        view('template/footer', $data);
    }

    public function cerealView($id = null) {

        $adminModel = new AdminModel();
        $cerealModel= new CerealModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        $cerealItem   = $cerealModel->where('cereal_id', $id)->first();

        $data = [
            'page_title' => "Update ".$cerealItem['cereal_name']." info",
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
            'cereal'     => $cerealItem,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_cereal', $data).
        view('template/footer', $data);
    }

    public function cerealUpdate($id = null) {

        $adminModel = new AdminModel();
        $cerealModel= new CerealModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        $cerealItem   = $cerealModel->where('cereal_id', $id)->first();

        $data = [
            'page_title' => "Update ".$cerealItem['cereal_name']." info",
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
            'cereal'     => $cerealItem,
        ];

        $validation = $this->validate([
            'cereal_name'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Cereal name is required!',
                ]
            ],

            'cereal_type'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Cereal type is required!',
                ]
            ],

            'cereal_price'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Add cereal price !',
                ]
            ],

            'quantity'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'You must add cereal quantity!'
                ]
            ],

            'land_type'=> [
                'rules' => "required",
                'errors'=> [
                    'required'  => 'Land type is required!',
                ]
            ],

            'season'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Select season please!'
                ]
            ],

            'rainy'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Choose one please!'
                ]
            ],

            'sunny'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Choose one please!'
                ]
            ],
        ]);

        if(!$validation) {
            return 
            view('template/navbar', $data).
            view('template/sidebar', $data).
            view('pages/view_cereal', ['validation'=>$this->validator]).
            view('template/footer', $data);
        } else {
            $values = [
                'cereal_name'  => ucfirst($this->request->getVar('cereal_name')),
                'cereal_type'  => ucfirst($this->request->getVar('cereal_type')),
                'cereal_price' => $this->request->getVar('cereal_price'),
                'quantity'     => $this->request->getVar('quantity'),
                'land_type'    => $this->request->getVar('land_type'),
                'season'       => $this->request->getVar('season'),
                'rainy'        => $this->request->getVar('rainy'),
                'sunny'        => $this->request->getVar('sunny'),
            ];
            $cerealModel->update($id, $values);
            return $this->response->redirect(site_url('cereal/all'));
        }
    }

    public function cerealDelete($id = null) {
        $cerealModel = new CerealModel();
        $cerealModel->where('cereal_id', $id)->delete($id);
        return $this->response->redirect(site_url('cereal/all'));
    }

    public function cerealApplication() {
        $userModel  = new UserModel();
        $cerealModel= new CerealModel();
        
        $activeUserId= session()->get('activeUser');
        $userData    = $userModel->find($activeUserId);
        $viewCereals   = $cerealModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'page_title' => 'Apply for Cereal',
            'breadcrumb' => 'Cereal',
            'userData'   => $userData,
            'cereals'    => $viewCereals,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/applying', $data).
        view('template/footer', $data);
    }

    public function cerealAppSubmit() {

        $userModel  = new UserModel();
        $cerealModel= new CerealModel();
        $appModel   = new ApplicationModel();
        
        $activeUserId= session()->get('activeUser');
        $userData    = $userModel->find($activeUserId);
        $viewCereals   = $cerealModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'page_title' => 'Apply for Cereal',
            'breadcrumb' => 'Cereal',
            'userData'   => $userData,
            'cereals'    => $viewCereals,
        ];

        $validation = $this->validate([
            'cereal_id'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Select Cereal Please!',
                ]
            ],

            'quantity'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'You must add quantity you want!'
                ]
            ],

            'season'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Select season please!'
                ]
            ]
        ]);

        if(!$validation) {
            return 
            view('template/navbar', $data).
            view('template/sidebar', $data).
            view('pages/applying', ['validation'=>$this->validator]).
            view('template/footer', $data);

        } else {
            $cid = $this->request->getVar('cereal_id');
            $qty = $this->request->getVar('quantity');

            // retrieve one cereal::gadiradufasha: to update the remaining Q
            $cereal     = $cerealModel->where('cereal_id', $cid)->first();
            $remained_q = $cereal['quantity'] - $qty;
            $updatable  = ['quantity' => $remained_q];
            $cerealModel->update($cid, $updatable);

            $values = [
                'farmer_id' => $activeUserId,
                'cereal_id' => $cid,
                'quantity'  => $qty,
                'season'    => $this->request->getVar('season'),
            ];

            $query = $appModel->insert($values);

            if($query) {
                return redirect()->to('farmer/dashboard')->with('success', 'Cereal application of ('.$cereal['cereal_type'].') is successful!');
            } else {
                return redirect()->back()->with('fail', 'Application is not successful!');
            }
        }
    }


    public function cerealAllApplied() {

        $appModel  = new ApplicationModel();
        $userModel = new UserModel();

        $activeUserId= session()->get('activeUser');
        $userData    = $userModel->find($activeUserId);

        $viewCereals  = $this->db->table($this->table)->select('c.cereal_name, c.cereal_type, c.land_type, app.app_id, app.farmer_id, app.cereal_id, app.quantity, app.season, app.status AS appstatus, app.app_date')->join('cereal c', 'c.cereal_id=app.cereal_id', 'left')->where('app.farmer_id', $activeUserId)->orderBy('app.app_date', 'DESC')->get()->getResult();

        $data = [
            'page_title' => 'All cereals you applied for previously',
            'breadcrumb' => 'Application',
            'userData'   => $userData,
            'cereals'    => $viewCereals,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/applied_cereals', $data).
        view('template/footer', $data);
    }

    // At Admin side
    public function cerealAppRequests() {

        $appModel   = new ApplicationModel();
        $adminModel = new AdminModel();

        $activeAdminId = session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);

        $viewCereals  = $this->db->table($this->table)->select('c.cereal_name, c.cereal_type, c.land_type, app.app_id, app.farmer_id, app.cereal_id, app.quantity, app.season, app.status AS appstatus, app.app_date')->join('cereal c', 'c.cereal_id=app.cereal_id', 'left')->orderBy('app.app_date', 'DESC')->get()->getResult();

        $data = [
            'page_title' => 'All submitted requests for cereals',
            'breadcrumb' => 'Application',
            'adminData'  => $adminData,
            'cereals'    => $viewCereals,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/applied_cer_req', $data).
        view('template/footer', $data);
    }

    public function approve($id = null) {
        $appModel = new ApplicationModel();
        $data = ['status'   => '1'];
        $appModel->update($id, $data); 
        return $this->response->redirect(site_url('cereal/requests'));
    }


}
?>