<?php 
namespace App\Controllers;

use CodeIgniter\Controllers;

class DashController extends BaseController {
    // Coding hand :https://github.com/Gadrawingz

    public function __construct() {
        helper(['url', 'form']);
    }

    public function farmerDashboard() {

        $userModel = new  \App\Models\UserModel();
        $activeUserId= session()->get('activeUser');
        $userData = $userModel->find($activeUserId);

        $data = [
            'page_title' => 'Farmer Dashboard',
            'userData'=> $userData
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
            'userData'=> $userData
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

        $data = [
            'page_title' => 'Admin Dashboard',
            'adminData'=> $adminData
        ];

        return 
         view('template/navbar', $data)
        .view('template/sidebar', $data)
        .view('main/admin_dash', $data)
        .view('template/footer', $data);
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
            session()->destroy();
            return redirect()->to('admin/login?access=out')->with('fail', 'You are logged out!');
        }
    }




}
?>