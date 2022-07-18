<?php 
namespace App\Controllers;
// Gad-Iradufasha's coding -> @gadrawingz, @donnekt
use CodeIgniter\Controllers;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\HarvestModel;
use App\Models\CerealModel;
use App\Models\ApplicationModel;

class DashController extends BaseController {
    // Coding hand :https://github.com/Gadrawingz

    public function __construct() {
        helper(['url', 'form']);
    }

    public function farmerDashboard() {

        $userModel = new UserModel();
        $appModel   = new ApplicationModel();
        $cerealModel= new CerealModel();
        $harvestModel= new HarvestModel();

        $activeUI= session()->get('activeUser');
        $userData = $userModel->find($activeUI);
    
        $c_req_yes = $appModel->where(['farmer_id'=> $activeUI, 'status'=> 1])->get()->getNumRows();
        $c_req_no  = $appModel->where(['farmer_id'=> $activeUI, 'status'=> 0])->get()->getNumRows();
        $h_req_yes = $harvestModel->where(['farmer_id'=> $activeUI, 'status'=> 1])->get()->getNumRows();
        $h_req_no  = $harvestModel->where(['farmer_id'=> $activeUI, 'status'=> 0])->get()->getNumRows();
        // Gad-Iradufasha's coding -> @gadrawingz, @donnekt

        $cardData = [
            'card1_a'   => 'Approved cereal requests',
            'card1_b'   => $c_req_yes.' request(s)',
            'card2_a'   => 'Unapproved cereal requests',
            'card2_b'   => $c_req_no.' request(s)',
            'card3_a'   => 'Approved harvests',
            'card3_b'   => $h_req_yes.' harvest(s)',
            'card4_a'   => 'Unapproved harvests',
            'card4_b'   => $h_req_no.' harvest(s)',
        ];

        $data = [
            'page_title' => 'Farmer Main Dashboard',
            'breadcrumb' => 'Farmer',
            'userData'=> $userData,
            'cardData'=> $cardData,
        ];

        return 
         view('template/navbar', $data)
        .view('template/sidebar', $data)
        .view('main/farmer_dash', $data)
        .view('template/footer', $data);
    }


    public function farmerProfile() {

        $userModel = new  \App\Models\UserModel();
        $activeUserId= session()->get('activeUser');
        $userData = $userModel->find($activeUserId);

        $data = [
            'page_title' => 'Farmer Profile',
            'userData'=> $userData,
        ];

        return 
         view('template/navbar', $data)
        .view('template/sidebar', $data)
        .view('main/farmer_profile', $data)
        .view('template/footer', $data);
    }

    public function farmerLogout() {
        if(session()->has('activeUser')) {
            session()->remove('activeUser');
            return redirect()->to('farmer/login?access=out')->with('fail', 'You are logged out!');
        }
        // Gad-Iradufasha's coding -> @gadrawingz, @donnekt
    }

    /////////////////////////////////////////////////////////////

    public function adminDashboard() {

        $userModel  = new UserModel();
        $adminModel = new AdminModel();
        $appModel   = new ApplicationModel();
        $cerealModel= new CerealModel();
        $harvestModel= new HarvestModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);
        
        $all_count = $adminModel->get()->getNumRows();
        $adm_count = $adminModel->where('admin_role', 'Admin')->get()->getNumRows();
        $agr_count = $adminModel->where('admin_role', 'Agronomist')->get()->getNumRows();
        $cer_count = $cerealModel->get()->getNumRows();
        $hrv_count = $harvestModel->get()->getNumRows();

        $cardData = [
            'admins_title'  => 'All super users',
            'admins_count'  => $adm_count,
            'agro_title'    => 'All agronomists',
            'agro_count'    => $agr_count,
            'cereals_title' => 'All registered cereals',
            'cereals_count' => $cer_count,
            'harvests_title'=> 'All reported harvests',
            'harvests_count'=> $hrv_count,
        ];
        // Gad-Iradufasha's coding -> @gadrawingz, @donnekt

        $page_title = session()->get('adminRole') =='Admin'?'Admin Dashboard':'Agronomist Dashboard';

        $data = [
            'page_title' => $page_title,
            'breadcrumb' => 'Dashboard',
            'adminData'  => $adminData,
            'cardData'   => $cardData,
        ];

        return 
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('main/admin_dash', $data).
        view('template/footer', $data);
    }

    public function adminProfile() {

        $adminModel = new  \App\Models\AdminModel();
        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);

        $data = [
            'page_title' => 'Admin Profile',
            'adminData'=> $adminData
        ];

        return 
         view('template/navbar', $data)
        .view('template/sidebar', $data)
        .view('main/admin_profile', $data)
        .view('template/footer', $data);
    }

    // Gad-Iradufasha's coding -> @gadrawingz, @donnekt
    public function adminLogout() {
        if(session()->has('activeAdmin')) {
            // OR session()->destroy();
            session()->remove('activeAdmin');
            return redirect()->to('admin/login?access=out')->with('fail', 'You are logged out!');
        }
    }




}
?>