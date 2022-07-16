<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\HarvestModel;
use App\Models\CerealModel;


class HarvestController extends BaseController {
    // Coding hand :https://github.com/Gadrawingz

    public function __construct() {
        helper(['url', 'form']);
    }

    public function index() {}

    public function harvestRegister() {
        $userModel  = new UserModel();
        $cerealModel= new CerealModel();
        
        $activeUserId= session()->get('activeUser');
        $userData    = $userModel->find($activeUserId);
        $viewCereals = $cerealModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'page_title' => 'Register harvest you acquired',
            'breadcrumb' => 'Harvest',
            'userData'   => $userData,
            'cereals'    => $viewCereals,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/register_harvest', $data).
        view('template/footer', $data);
    }

    public function harvestSubmit() {

        $userModel    = new userModel();
        $cerealModel  = new CerealModel();
        $harvestModel = new HarvestModel();
        
        $activeUserId= session()->get('activeUser');
        $userData    = $userModel->find($activeUserId);
        $viewCereals   = $cerealModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'page_title' => 'Register harvest you acquired',
            'breadcrumb' => 'Harvest',
            'userData'   => $userData,
            'cereals'    => $viewCereals,
        ];

        $validation = $this->validate([
            'price'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Add current price!',
                ]
            ],

            'cereal_id'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Select cereal please!',
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
            ], 

            'outcome'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Add harvest outcome(result)!'
                ]
            ], 
        ]);

        if(!$validation) {
            return 
            view('template/navbar', $data).
            view('template/sidebar', $data).
            view('pages/register_harvest', ['validation'=>$this->validator]).
            view('template/footer', $data);

        } else {
            $values = [
                'farmer_id' 	=> $activeUserId,
                'cereal_id'		=> $this->request->getVar('cereal_id'),
                'season' 		=> $this->request->getVar('season'),
                'quantity'		=> $this->request->getVar('quantity'),
                'current_price' => $this->request->getVar('price'),
                'outcome' 		=> $this->request->getVar('outcome'),
            ];
            $query = $harvestModel->insert($values);

            if($query) {
                return redirect()->to('farmer/dashboard')->with('success', 'Your harvest is successfully registered!');
            } else {
                return redirect()->back()->with('fail', 'Error occurred!');
            }
        }
    }

    public function harvestFarmerView() {

        $harvestModel  = new HarvestModel();
        $cerealModel   = new CerealModel();
        $userModel 	   = new UserModel();

        $activeUserId= session()->get('activeUser');
        $userData    = $userModel->find($activeUserId);
        $viewHarvests = $harvestModel->join('cereal c', 'c.cereal_id=h.harvest_id', 'left')->where('h.farmer_id', $activeUserId)->orderBy('h.harvest_date', 'DESC')->findAll();

        $data = [
            'page_title' => 'All harvests you registered',
            'breadcrumb' => 'Harvest',
            'userData'   => $userData,
            'harvests'   => $viewHarvests,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_harvests_f', $data).
        view('template/footer', $data);
    }


    public function harvestsUnchecked() {

        $adminModel    = new AdminModel();
        $harvestModel  = new HarvestModel();
        $cerealModel   = new CerealModel();

        $activeAdminId = session()->get('activeAdmin');
        $adminData     = $adminModel->find($activeAdminId);
        $viewHarvests  = $harvestModel->join('cereal c', 'c.cereal_id=h.harvest_id', 'left')->orderBy('h.harvest_date', 'DESC')->findAll();
        // ->where('status', 0)

        $data = [
            'page_title' => 'All pending harvests',
            'breadcrumb' => 'Harvest',
            'adminData'  => $adminData,
            'harvests'   => $viewHarvests,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_harvests_n', $data).
        view('template/footer', $data);
    }
}
?>