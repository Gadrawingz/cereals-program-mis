<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\AdminModel;
use App\Models\CerealModel;
use App\Models\UserModel;
use App\Models\FFarmerModel;
use App\Models\FertilizerModel;
use App\Models\ApplicationModel;
use App\Models\HarvestModel;
use App\Models\DistrictModel;

use App\Controllers\BaseController;

class ReportController extends BaseController {
    
    protected $db;
    public function __construct() {
        $this->db = \Config\Database::connect();
    }

    public function index() {}

    public function viewGeneralReport() {

        $userModel   = new UserModel();
        $adminModel  = new AdminModel();
        $appModel    = new ApplicationModel();
        $cerealModel = new CerealModel();
        $harvestModel= new HarvestModel();
        $fert_Model  = new FertilizerModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);
        
        $all_count = $adminModel->get()->getNumRows();
        $ferts_count= $fert_Model->get()->getNumRows();
        $adm_count = $adminModel->where('admin_role', 'Admin')->get()->getNumRows();
        $agr_count = $adminModel->where('admin_role', 'Agrodealer')->get()->getNumRows();
        $hrv_count = $harvestModel->get()->getNumRows();

        // farmer's Donee(s)
        $active_fc  = $userModel->where('status', 1)->get()->getNumRows();
        $inactive_fc= $userModel->where('status', 0)->get()->getNumRows();

        // Cereals 
        $cer_count = $cerealModel->get()->getNumRows();
        $app_cer_0 = $appModel->where('status', 0)->get()->getNumRows();
        $app_cer_1 = $appModel->where('status', 1)->get()->getNumRows();


        $cardData = [
            'all_title'     => 'All admins',
            'all_count'     => $all_count,
            'ferts_title'   => 'All fertilizers',
            'ferts_count'   => $ferts_count,
            'admins_title'  => 'All super users',
            'admins_count'  => $adm_count,
            'agro_title'    => 'All agro-dealers',
            'agro_count'    => $agr_count,
            'cereals_title' => 'All registered cereals',
            'cereals_count' => $cer_count,
            'harvests_title'=> 'All reported harvests',
            'harvests_count'=> $hrv_count,
            'active_fc_title'   => 'All active farmers',
            'active_fc_count'   => $active_fc,
            'inactive_fc_title' => 'All inactive farmers',
            'inactive_fc_count' => $inactive_fc,
            'app_cer_0'         => $app_cer_0,
            'app_cer_1'         => $app_cer_1,


        ];

        // Gad-Iradufasha's coding -> @gadrawingz, @donnekt

        $page_title = session()->get('adminRole') =='Admin'?'Admin Dashboard':'Agro-dealear Dashboard';

        $data = [
            'page_title' => $page_title,
            'breadcrumb' => 'General Report',
            'adminData'  => $adminData,
            'cardData'   => $cardData,
        ];

        return 
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/report_general', $data).
        view('template/footer', $data);
    }


    public function viewAgroReport() {

        $userModel   = new UserModel();
        $adminModel  = new AdminModel();
        $appModel    = new ApplicationModel();
        $cerealModel = new CerealModel();
        $harvestModel= new HarvestModel();
        $fert_Model  = new FertilizerModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);

        // farmer's Donee(s)
        $active_fc   = $userModel->where('status', 1)->get()->getNumRows();
        $inactive_fc = $userModel->where('status', 0)->get()->getNumRows();
        $all_fc_count= $userModel->get()->getNumRows();

        // Cereals count;
        $all_c_count = $cerealModel->get()->getNumRows();
        $c_req_count = $appModel->get()->getNumRows();

        // Harvest and fertilizers counts
        $all_h_count = $harvestModel->get()->getNumRows();
        $all_ft_title= $fert_Model->get()->getNumRows();

        $cardData = [
            'all_far_title'     => 'All farmers in general',
            'all_far_count'     => $all_fc_count,
            'active_fc_title'   => 'All active farmers',
            'active_fc_count'   => $active_fc,
            'inactive_fc_title' => 'All inactive farmers',
            'inactive_fc_count' => $inactive_fc,
            'all_c_title'       => "All cereals in store",
            'all_c_count'       => $all_c_count,
            'c_req_title'       => "All cereal requests",
            'c_req_count'       => $c_req_count,

            'all_h_title'       => "All farmer harvests",
            'all_h_count'       => $all_h_count,

            'all_ft_title'      => "Available fertilizer types",
            'all_ft_count'      => $all_ft_title,
        ];


        // Coding -> @gadrawingz, @donnekt
        $page_title = session()->get('adminRole') =='Admin'?'Admin Dashboard':'Agro-dealear Dashboard';

        $data = [
            'page_title' => $page_title,
            'breadcrumb' => 'General Report',
            'adminData'  => $adminData,
            'cardData'   => $cardData,
        ];

        return 
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/report_agros', $data).
        view('template/footer', $data);
        // https://github.com/Gadrawingz
    }

    public function viewAgroFullReport() {

        $userModel   = new UserModel();
        $adminModel  = new AdminModel();
        $appModel    = new ApplicationModel();
        $cerealModel = new CerealModel();
        $harvestModel= new HarvestModel();
        $fert_Model  = new FertilizerModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);

        // farmer's Donee(s)
        $active_fc   = $userModel->where('status', 1)->get()->getNumRows();
        $inactive_fc = $userModel->where('status', 0)->get()->getNumRows();
        $all_fc_count= $userModel->get()->getNumRows();

        // Cereals count;
        $all_c_count = $cerealModel->get()->getNumRows();
        $c_req_count = $appModel->get()->getNumRows();

        // Harvest and fertilizers counts
        $all_h_count = $harvestModel->get()->getNumRows();
        $all_ft_title= $fert_Model->get()->getNumRows();

        // Harvests Retrieval!
        $viewHarvests  = $this->db->table('harvest h')->select('c.cereal_name, c.cereal_type, c.land_type, h.harvest_id, h.quantity AS hquantity, h.season AS hseason, h.current_price, h.outcome AS result, h.status AS harvestatus, h.harvest_date')->join('cereal c', 'c.cereal_id=h.cereal_id', 'left')->orderBy('h.harvest_date', 'DESC')->get()->getResult();

        $viewCereals  = $this->db->table('application app')->select('c.cereal_name, c.cereal_type, c.land_type, app.app_id, app.farmer_id, app.cereal_id, app.quantity, app.season, app.status AS appstatus, app.app_date, f.firstname, f.lastname, f.telephone')->join('cereal c', 'c.cereal_id=app.cereal_id', 'left')->join('farmer f', 'f.farmer_id=app.farmer_id', 'left')->orderBy('app.app_date', 'DESC')->get()->getResult();

        // Fetch fertilizer to check for before submission @gadrawingz
        $agro_dealers = $this->db->query("SELECT ad.admin_id, ad.firstname, ad.lastname, ad.district, di.district_name, ad.sector, ad.cell, ad.village, ad.gender, ad.telephone, ad.password, ad.admin_role, ad.status FROM admin ad LEFT JOIN district di ON di.district_id=ad.district WHERE ad.admin_role='Agrodealer'")->getResult();

        $cardData = [
            'all_far_title'     => 'All farmers in general',
            'all_far_count'     => $all_fc_count,
            'active_fc_title'   => 'All active farmers',
            'active_fc_count'   => $active_fc,
            'inactive_fc_title' => 'All inactive farmers',
            'inactive_fc_count' => $inactive_fc,
            'all_c_title'       => "All cereals in store",
            'all_c_count'       => $all_c_count,
            'c_req_title'       => "All cereal requests",
            'c_req_count'       => $c_req_count,

            'all_h_title'       => "All farmer harvests",
            'all_h_count'       => $all_h_count,

            'all_ft_title'      => "Available fertilizer types",
            'all_ft_count'      => $all_ft_title,
        ];

        // Coding -> @gadrawingz, @donnekt
        $page_title = session()->get('adminRole') =='Admin'?'Admin Dashboard':'Agro-dealear Dashboard';

        $data = [
            'page_title' => $page_title,
            'breadcrumb' => 'General Report',
            'adminData'  => $adminData,
            'cardData'   => $cardData,
            'harvests'   => $viewHarvests, // Harvests summary
            'cereals'    => $viewCereals, // Cereals summary
            'agro_dealers'  => $agro_dealers,
        ];

        return 
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/report_full_agro', $data).
        view('template/footer', $data);
    }

    public function viewFullStats() {
        $userModel   = new UserModel();
        $adminModel  = new AdminModel();
        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);

        $dataStats  = $this->db->query("SELECT MONTHNAME(app_date) AS month_name, COUNT(farmer_id) as requests FROM application GROUP BY month_name")->getResultArray();

        $data = [
            'page_title' => 'Statistics Using Bar Chart',
            'breadcrumb' => 'General Report',
            'adminData'  => $adminData,
            'dataStats'  => $dataStats,
        ];

        return 
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_stats', $data).
        view('template/footer', $data);
    }

    // Go to harvest report (fullRepoHarvest) to search for good report
    public function findHReport() {
        // Fetch the district id after button pressed then Boom!
        $id = $this->request->getVar('harvest_repo');
        return $this->response->redirect(site_url('report/harvest/'.$id.''));
    }

    // Go to cereal report (fullRepoCereal) to search for good report
    public function findCReport() {
        // Fetch the district id after button pressed then Boom!
        $id = $this->request->getVar('cereal_repo');
        return $this->response->redirect(site_url('report/cereal/'.$id.''));
    }

    public function fullRepoHarvest($id = null) {
        // https://github.com/Gadrawingz
        $adminModel    = new AdminModel();
        $harvestModel  = new HarvestModel();
        $cerealModel   = new CerealModel();
        $distModel     = new DistrictModel();
        $activeAdminId = session()->get('activeAdmin');

        $adminData     = $adminModel->find($activeAdminId);

        $viewHarvests  = $this->db->table('harvest h')->select('c.cereal_name, c.cereal_type, c.land_type, f.firstname, f.lastname, d.district_name, h.harvest_id, h.quantity AS hquantity, h.season AS hseason, h.current_price, h.outcome AS result, h.status AS harvestatus, h.harvest_date')->join('cereal c', 'c.cereal_id=h.cereal_id', 'left')->join('farmer f', 'f.farmer_id=h.farmer_id', 'left')->join('district d', 'd.district_id=f.district', 'left')->where(["f.district"=> $id])->orderBy('h.harvest_date', 'DESC')->get()->getResult();

        $singleDist = $distModel->where('district_id', $id)->first();

        $data = [
            'page_title' => 'Harvests Report in ('.$singleDist['district_name'].')',
            'adminData'  => $adminData,
            'harvests'   => $viewHarvests,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/report_full_harvest', $data).
        view('template/footer', $data);
    }

    public function fullRepoCereal($id = null) {
        // https://github.com/Gadrawingz
        $appModel      = new ApplicationModel();
        $adminModel    = new AdminModel();
        $cerealModel   = new CerealModel();
        $distModel     = new DistrictModel();
        $activeAdminId = session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);

        $viewCereals  = $this->db->table('application app')->select('c.cereal_name, c.cereal_type, c.land_type, app.app_id, app.farmer_id, app.cereal_id, app.quantity, app.season, app.status AS appstatus, app.app_date, f.firstname, f.lastname, f.telephone, d.district_name')->join('cereal c', 'c.cereal_id=app.cereal_id', 'left')->join('farmer f', 'f.farmer_id=app.farmer_id', 'left')->join('district d', 'd.district_id=f.district', 'left')->where(["f.district"=> $id])->orderBy('app.app_date', 'DESC')->get()->getResult();

        $singleDist = $distModel->where('district_id', $id)->first();
        $data = [
            'page_title' => 'Cereal requests report ('.$singleDist['district_name'].')',
            'adminData'  => $adminData,
            'cereals'    => $viewCereals,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/report_full_cereal', $data).
        view('template/footer', $data);
    }
}