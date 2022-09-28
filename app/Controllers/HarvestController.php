<?php namespace App\Controllers;
// Gad-Iradufasha's coding -> @gadrawingz, @donnekt
use CodeIgniter\Controllers;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\HarvestModel;
use App\Models\CerealModel;
use App\Models\DistrictModel;


class HarvestController extends BaseController {
    // Coding hand :https://github.com/Gadrawingz

    // Can be used at times
    protected $table ='harvest h';
    protected $db;

    public function __construct() {
        helper(['url', 'form']);

        $this->db = \Config\Database::connect();
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
                'farmer_id'     => session()->get('activeUser'),
                'district' 	=> session()->get('activeDist'),
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

        $viewHarvests  = $this->db->table($this->table)->select('c.cereal_name, c.cereal_type, c.land_type, h.harvest_id, h.quantity AS hquantity, h.season AS hseason, h.current_price, h.outcome AS result, h.status AS harvestatus, h.harvest_date')->join('cereal c', 'c.cereal_id=h.cereal_id', 'left')->where('h.farmer_id', $activeUserId)->orderBy('h.harvest_date', 'DESC')->get()->getResult();

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
        $distModel     = new DistrictModel();

        $activeAdminId = session()->get('activeAdmin');
        $activeDistId  = session()->get('activeDist');
        $adminData     = $adminModel->find($activeAdminId);

        $viewHarvests  = $this->db->table($this->table)->select('c.cereal_name, c.cereal_type, c.land_type, f.firstname, f.lastname, d.district_name, h.harvest_id, h.quantity AS hquantity, h.season AS hseason, h.current_price, h.outcome AS result, h.status AS harvestatus, h.harvest_date')->join('cereal c', 'c.cereal_id=h.cereal_id', 'left')->join('farmer f', 'f.farmer_id=h.farmer_id', 'left')->join('district d', 'd.district_id=f.district', 'left')->where(["h.status" => 0, "f.district"=> $activeDistId])->orderBy('h.harvest_date', 'DESC')->get()->getResult();

        $singleDist = $distModel->where('district_id', $activeDistId)->first();

        $data = [
            'page_title' => 'All pending harvests ('.$singleDist['district_name'].')',
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


    public function harvestsChecked() {
        $adminModel    = new AdminModel();
        $harvestModel  = new HarvestModel();
        $cerealModel   = new CerealModel();
        $distModel     = new DistrictModel();

        $activeAdminId = session()->get('activeAdmin');
        $activeDistId = session()->get('activeDist');
        $adminData     = $adminModel->find($activeAdminId);

        $viewHarvests  = $this->db->table($this->table)->select('c.cereal_name, c.cereal_type, c.land_type, f.firstname, f.lastname, d.district_name, h.harvest_id, h.quantity AS hquantity, h.season AS hseason, h.current_price, h.outcome AS result, h.status AS harvestatus, h.harvest_date')->join('cereal c', 'c.cereal_id=h.cereal_id', 'left')->join('farmer f', 'f.farmer_id=h.farmer_id', 'left')->join('district d', 'd.district_id=f.district', 'left')->where(["h.status" => 1, "f.district"=> $activeDistId])->orderBy('h.harvest_date', 'DESC')->get()->getResult();

        $singleDist = $distModel->where('district_id', $activeDistId)->first();

        $data = [
            'page_title' => 'All approved harvests ('.$singleDist['district_name'].')',
            'breadcrumb' => 'Harvest',
            'adminData'  => $adminData,
            'harvests'   => $viewHarvests,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_harvests_c', $data).
        view('template/footer', $data);
    }

    public function approve($id = null) {

        $harvestModel = new HarvestModel();
        $userModel    = new UserModel();

        $data = ['status'   => '1'];
        $harvestModel->update($id, $data);

        // SMS API Integration @gadrawingz
        $harvest    = $harvestModel->where('harvest_id', $id)->first();
        $farmer_id  = $harvest['farmer_id'];
        $singleUser  = $userModel->find($farmer_id);
        $fullName    = $singleUser['firstname']." ".$singleUser['lastname'];
        $harvestTotal = $harvest['current_price'] * $harvest['quantity'];

        $data = array(
            "sender"=>'KIGALIGAS',
            "recipients"=>$singleUser['telephone'],
            "message"=>"CEREAL MIS: Muraho, (".$fullName."), Umusaruro wanyu wibyo mwejeje bingana na ".$harvest['quantity']."kg(s) bihagaze agaciro kagana na ".$harvestTotal."rwf, Igihembwe cy'ihinga cya (".$harvest['season'].") Byemejwe, Murakoze!");

        $url = "https://www.intouchsms.co.rw/api/sendsms/.json";
        $data = http_build_query ($data);
        $username="benii"; 
        $password="SMS@123";
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
 

        return $this->response->redirect(site_url('harvest/checked'));
    }
}
?>