<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\RegionModel;
use App\Models\CerealModel;
use App\Models\AdminModel;
use App\Models\FertilizerModel;

class Fertilizer extends BaseController {
    protected $table  ='fertilizer f';
    protected $fc_tbl ='fert_company fc';
    protected $db;

    public function __construct() {
        $this->db = \Config\Database::connect();
    }

    public function fertilizerRegister() {

        $adminModel = new AdminModel();
        $cerealModel = new CerealModel();
        $fertilizer = new FertilizerModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);

        // Fetch fertilizer companies & push to table
        $sellers  = $this->db->table($this->fc_tbl)->select('fc.comp_id, fc.name, fc.telephone, fc.telephone, fc.email')->orderBy('fc.name', 'ASC')->get()->getResult();

        $data = [
            'page_title' => 'Register new fertilizer via MOPA',
            'breadcrumb' => 'Fertilizer',
            'adminData'  => $adminData,
            'sellers'    => $sellers
        ];

        return 
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/register_fertilizer', $data).
        view('template/footer', $data);
    }


    public function fertilizerSave() {
        
        $adminModel  = new AdminModel();
        $cerealModel = new CerealModel();
        $fertilizer  = new FertilizerModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);

        // Fetch fertilizer companies & push to table
        $sellers  = $this->db->table($this->fc_tbl)->select('fc.comp_id, fc.name, fc.telephone, fc.telephone, fc.email')->orderBy('fc.name', 'ASC')->get()->getResult();

        $data = [
            'page_title' => 'Register new fertilizer via MOPA',
            'breadcrumb' => 'Fertilizer',
            'adminData'  => $adminData,
            'sellers'    => $sellers,
            'validation' => $this->validator
        ];

        $validation = $this->validate([
            'category'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Category is required!',
                ]
            ],

            'type'=> [
                'rules' => 'required|is_unique[fertilizer.item_type]',
                'errors'=> [
                    'required' => 'Fertilizer type is required!',
                    'is_unique'=> 'This fertilizer type exists in system!',
                ]
            ],

            'price'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Add unit price!',
                ]
            ],

            'quantity'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'You must add quantity!'
                ]
            ],

            'subsidy_value'=> [
                'rules' => "required",
                'errors'=> [
                    'required'  => 'Add Subsidy value!',
                ]
            ],

            'seller'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Select seller please!'
                ]
            ],
        ]);

        if(!$validation) {
            return 
            view('template/navbar', $data).
            view('template/sidebar', $data).
            view('pages/register_fertilizer', ['validation'=>$this->validator]).
            view('template/footer', $data);
        } else {
            $ct  = $this->request->getVar('category');
            $ty  = $this->request->getVar('type');
            $pr  = $this->request->getVar('price');
            $qt  = $this->request->getVar('quantity');
            $sv  = $this->request->getVar('subsidy_value');
            $sl  = $this->request->getVar('seller');

            $values = [
                'item_type'    => $ty,
                'category'     => $ct,
                'quantity'     => $qt,
                'price_per_kg' => $pr,
                'subsidy_value'=> $sv,
                'comp_id'      => $sl,
            ];

            $query = $fertilizer->insert($values);

            if(!$query) {
                return redirect()->back()->with('fail', 'Something went wrong!');
            } else {
                return redirect()->to('fertilizer/register')->with('success', 'Record is added successfully!');
            }
        }
    }

    public function fertilizerViewAll() {
        $adminModel  = new AdminModel();
        $cerealModel = new CerealModel();
        $fertilizer  = new FertilizerModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);

        $viewFerts = $this->db->table($this->table)->select('f.item_id, f.category, f.item_type, f.quantity, f.price_per_kg, f.subsidy_value, f.comp_id, f.created_at, fc.name, fc.telephone')->join($this->fc_tbl, 'f.comp_id=fc.comp_id', 'left')->orderBy('f.created_at', 'DESC')->get()->getResultArray();

        $data = [
            'page_title' => 'All registered fertilizers',
            'breadcrumb' => 'Fertilizer',
            'adminData'  => $adminData,
            'ferts'   => $viewFerts,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_fertilizers', $data).
        view('template/footer', $data);
    }


    public function fertilizerView($id = null) {
        
        $adminModel  = new AdminModel();
        $cerealModel = new CerealModel();
        $fertilizer  = new FertilizerModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);
        $viewFert = $fertilizer->where('item_id', $id)->first();

        // Fetch fertilizer companies & push to table
        $sellers  = $this->db->table($this->fc_tbl)->select('fc.comp_id, fc.name, fc.telephone, fc.telephone, fc.email')->orderBy('fc.name', 'ASC')->get()->getResult();
        
        $data = [
            'page_title' => "Update ".$viewFert['item_type']." info",
            'breadcrumb' => 'Fertilizer',
            'adminData'  => $adminData,
            'fert'       => $viewFert,
            'sellers'    => $sellers,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_fertilizer', $data).
        view('template/footer', $data);
    }

    public function fertilizerUpdate($id = null) {

        $adminModel  = new AdminModel();
        $cerealModel = new CerealModel();
        $fertilizer  = new FertilizerModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        $fertItem     = $fertilizer->where('item_id', $id)->first();

        // Fetch fertilizer companies & push to table
        $sellers  = $this->db->table($this->fc_tbl)->select('fc.comp_id, fc.name, fc.telephone, fc.telephone, fc.email')->orderBy('fc.name', 'ASC')->get()->getResult();

        $data = [
            'page_title' => "Update ".$fertItem['item_type']." info",
            'breadcrumb' => 'Fertilizer',
            'adminData'  => $adminData,
            'sellers'    => $sellers,
            'fert'       => $fertItem,
            'validation' => $this->validator
        ];

        $validation = $this->validate([
            'category'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Category is required!',
                ]
            ],

            'type'=> [
                'rules' => 'required|is_unique[fertilizer.item_type]',
                'errors'=> [
                    'required' => 'Fertilizer type is required!',
                    'is_unique'=> 'This fertilizer type exists in system!',
                ]
            ],

            'price'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Add unit price!',
                ]
            ],

            'quantity'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'You must add quantity!'
                ]
            ],

            'subsidy_value'=> [
                'rules' => "required",
                'errors'=> [
                    'required'  => 'Add Subsidy value!',
                ]
            ],

            'seller'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Select seller please!'
                ]
            ],
        ]);

        if(!$validation) {
            return 
            view('template/navbar', $data).
            view('template/sidebar', $data).
            view('pages/view_fertilizer', ['validation'=>$this->validator]).
            view('template/footer', $data);
        } else {

            $ct  = $this->request->getVar('category');
            $ty  = $this->request->getVar('type');
            $pr  = $this->request->getVar('price');
            $qt  = $this->request->getVar('quantity');
            $sv  = $this->request->getVar('subsidy_value');
            $sl  = $this->request->getVar('seller');

            $values = [
                'item_type'    => $ty,
                'category'     => $ct,
                'quantity'     => $qt,
                'price_per_kg' => $pr,
                'subsidy_value'=> $sv,
                'comp_id'      => $sl,
            ];

            $query = $fertilizer->update($id, $values);

            if(!$query) {
                return redirect()->back()->with('fail', 'Something went wrong!');
            } else {
                return redirect()->to('fertilizer/all')->with('success', 'Updated successfully!');
            }
        }
    }
}
