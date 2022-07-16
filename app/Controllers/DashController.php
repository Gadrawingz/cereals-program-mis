<?php 
namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\UserModel;

class DashController extends BaseController {
    // Coding hand :https://github.com/Gadrawingz

    public function __construct() {
        helper(['url', 'form']);
    }

    public function farmerDashboard() {

        $userModel = new UserModel();
        $activeUserId= session()->get('activeUser');
        $userData = $userModel->find($activeUserId);

        $cardData = [
            'card1_a'   => 'All requested cereals',
            'card1_b'   => 50,
            'card2_a'   => 'All harvests',
            'card2_b'   => 74,
            'card3_a'   => 'Total cereals',
            'card3_b'   => '29 rwf',
            'card4_a'   => 'Total harvests',
            'card4_b'   => '70 rwf',
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
    }

    /////////////////////////////////////////////////////////////

    public function adminDashboard() {

        $adminModel = new  \App\Models\AdminModel();
        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);

        $admin_count = "55";

        $cardData = [
            'admins_title'  => 'All super users',
            'admins_count'  => $admin_count,
            'agro_title'    => 'All agronomists',
            'agro_count'    => '74',
            'cereals_title'=> 'All registered cereals',
            'cereals_count'  => '29',
            'harvests_title'=> 'All reported harvests',
            'harvests_count'  => '200',
        ];

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

    public function adminLogout() {
        if(session()->has('activeAdmin')) {
            // OR session()->destroy();
            session()->remove('activeAdmin');
            return redirect()->to('admin/login?access=out')->with('fail', 'You are logged out!');
        }
    }




}
?>