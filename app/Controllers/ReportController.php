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

use App\Controllers\BaseController;

class ReportController extends BaseController
{

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
        ];

        return 
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/report_full_agro', $data).
        view('template/footer', $data);
    }

}
