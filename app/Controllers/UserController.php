<?php 
namespace App\Controllers;
// Gad-Iradufasha's coding -> @gadrawingz, @donnekt
use CodeIgniter\Controllers;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Libraries\Hashing;

class UserController extends BaseController {
    // Coding hand :https://github.com/Gadrawingz

    protected $db;
    public function __construct() {
        helper(['url', 'form']);
        $this->db = \Config\Database::connect();
    }

    public function index() {
        $adminModel = new AdminModel();
        $userModel  = new userModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        //$farmerFetch  = $userModel->where('status', 1)->orderBy('created_at', 'DESC')->findAll();

        $farmerFetch   = $this->db->table('farmer fa')->select('fa.farmer_id, fa.firstname, fa.lastname, fa.province, pr.province_name AS province, di.district_name AS district, fa.sector, fa.cell, fa.village, fa.gender, fa.telephone, fa.password, fa.status')->join('district di', 'di.district_id=fa.district', 'left')->join('province pr', 'pr.province_id=fa.province', 'left')->where(['fa.status'=>1])->orderBy('fa.created_at', 'DESC')->get()->getResultArray();

        $data = [
            'page_title' => 'View active farmers',
            'breadcrumb' => 'Farmer',
            'adminData'  => $adminData,
            'farmers'    => $farmerFetch,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_farmers', $data).
        view('template/footer', $data);
    }


    public function farmerInactive() {
        $adminModel = new AdminModel();
        $userModel  = new userModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);

        $farmerFetch   = $this->db->table('farmer fa')->select('fa.farmer_id, fa.firstname, fa.lastname, fa.province, pr.province_name AS province, di.district_name AS district, fa.sector, fa.cell, fa.village, fa.gender, fa.telephone, fa.password, fa.status')->join('district di', 'di.district_id=fa.district', 'left')->join('province pr', 'pr.province_id=fa.province', 'left')->where(['fa.status'=>0])->orderBy('fa.created_at', 'DESC')->get()->getResultArray();

        $data = [
            'page_title' => 'View inactive farmers',
            'breadcrumb' => 'Farmer',
            'adminData'  => $adminData,
            'farmers'    => $farmerFetch,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_farmers_o', $data).
        view('template/footer', $data);
    }

    public function enable($id = null) {
        $userModel = new userModel();
        $data = ['status'   => '1'];
        $userModel->update($id, $data);

        // SMS API Integration @gadrawingz
        $singleUser = $userModel->where('farmer_id', $id)->first();
        $fullName   = $singleUser['firstname']." ".$singleUser['lastname'];

        $data = array(
            "sender"=>'KIGALIGAS',
            "recipients"=>$singleUser['telephone'],
            "message"=>"CEREAL MIS: Muraho, (".$fullName."), Ubusabe bwa konti yanyu bwemewe ubu mwemerewe kwinjira kuri system, Murakoze!");

        $url = "https://www.intouchsms.co.rw/api/sendsms/.json";
        $data = http_build_query ($data);
        $username="benii"; 
        $password="Ben@1234";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
 

        return $this->response->redirect(site_url('farmer/active'));
    }

    public function disable($id = null) {
        $userModel = new userModel();
        $data = ['status'   => '0'];
        $userModel->update($id, $data); 
        return $this->response->redirect(site_url('farmer/inactive'));
    }


    public function changepass() {
        $userModel = new UserModel();
        $id = session()->get('activeUser');

        $current  = $this->request->getVar('current');
        $password = $this->request->getVar('password');
        
        $valid_current_ = $this->validate([
            'current' => [
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors'=> [
                    'required' => 'Current password is required!'
                ]
            ]
        ]);

        $valid_new_pass = $this->validate([
            'password'=> [
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors'=> [
                    'required' => 'Password is required!',
                    'min_length' => 'Password must have at least 5 in length!',
                    'max_length' => 'Password must have less than 20 in length!'
                ]
            ],

            'cpassword'=> [
                'rules' => 'required|min_length[5]|max_length[20]|matches[password]',
                'errors'=> [
                    'required' => 'You must confirm password!',
                    'min_length' => 'Confirm Password must have at least 5 in length!',
                    'max_length' => 'Confirm Password must have less than 15 in length!',
                    'matches' => "Confirm Password does not match to password!"
                ]
            ],
        ]);

        $data = ['password'=> Hashing::make($password)];

        $farmer = $userModel->where('farmer_id', $id)->first();
        $checkPassword = Hashing::checkPassword($current, $farmer['password']);

        if(!$valid_current_) {
            session()->setFlashdata('fail', "Please enter existing password!");
            return redirect()->to('farmer/profile')->withInput();
        }

        if(!$valid_new_pass) {
            session()->setFlashdata('fail', "Password is neither comfirmed well nor short!");
            return redirect()->to('farmer/profile')->withInput();
        }

        if(!$checkPassword) {
            session()->setFlashdata('fail', "Entered password does not exist!");
            return redirect()->to('farmer/profile')->withInput();
        } else {
            $userModel->update($id, $data);
            return $this->response->redirect(site_url('farmer/dashboard'));
        }

    }

}
?>