<?php

namespace App\Controllers;
use App\Models\RegionModel;
use App\Models\CerealModel;
use App\Models\AdminModel;

class RegionController extends BaseController
{
    protected $db;
    protected $table ='region r';

    public function __construct() {
        $this->db = \Config\Database::connect(); // db instance
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function regionViewAll() {
        $regionModel = new RegionModel();
        $cerealModel = new CerealModel();
        $adminModel  = new AdminModel();

        $activeAdmin = session()->get('activeAdmin');
        $adminData   = $adminModel->find($activeAdmin);

        $viewRegions = $this->db->table($this->table)->select('r.place_id, r.district_id, d.district_name, p.province_name, r.supplier_name, r.telephone, r.created_at')->join('district d', 'r.district_id=d.district_id', 'left')->join('province p', 'd.province_id=p.province_id', 'left')->orderBy('d.district_name', 'ASC')->get()->getResult();

        $data = [
            'page_title' => 'All regions and corresponding cereals',
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
            'regions'   => $viewRegions,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_regions', $data).
        view('template/footer', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
