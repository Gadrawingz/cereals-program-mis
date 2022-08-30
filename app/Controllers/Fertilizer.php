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

        $data = [
            'page_title' => 'Register new fertilizer via MOPA',
            'breadcrumb' => 'Fertilizer',
            'adminData'  => $adminData,
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
                'rules' => 'required|is_unique[fert_company.item_type]',
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
                'item_price'   => $pr,
                'category'     => $ct,
                'quantity'     => $qt,
                'price_per_kg' => $pr,
                'subsidy_value'=> $sv,
                'comp_id'      => $sl,
            ];

            $query = $cerealModel->insert($values);

            if(!$query) {
                return redirect()->back()->with('fail', 'Something went wrong!');
            } else {
                return redirect()->to('cereal/register')->with('success', 'Cereal is registered successfully!');
            }
        }
    }
}
