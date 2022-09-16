<?php 
namespace App\Controllers;
// Gad-Iradufasha's coding -> @gadrawingz, @donnekt
use CodeIgniter\Controllers;
use App\Models\AdminModel;
use App\Models\CerealModel;
use App\Models\UserModel;
use App\Models\FFarmerModel;
use App\Models\FertilizerModel;
use App\Models\ApplicationModel;

class CerealController extends BaseController {
    // Coding hand :https://github.com/Gadrawingz

    protected $table ='application app';
    protected $db;

    public function __construct() {
        helper(['url', 'form']);

        $this->db = \Config\Database::connect();
    }

    public function cerealRegister() {

        $adminModel = new AdminModel();
        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);
        
        $cerealModel = new CerealModel();

        $data = [
            'page_title' => 'Register cereal seed',
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
        ];

        return 
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/register_cereal', $data).
        view('template/footer', $data);
    }

    public function cerealSave() {

        $adminModel  = new AdminModel();
        $cerealModel = new CerealModel();
        $activeAdminId= session()->get('activeAdmin');
        $adminData = $adminModel->find($activeAdminId);

        $data = [
            'page_title' => 'Register Cereal',
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
            'validation' => $this->validator
        ];

        $validation = $this->validate([
            'cereal_name'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Cereal name is required!',
                ]
            ],

            'cereal_type'=> [
                'rules' => 'required|is_unique[cereal.cereal_type]',
                'errors'=> [
                    'required' => 'Cereal type is required!',
                    'is_unique' => 'This cereal type exists in system!',
                ]
            ],

            'cereal_price'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Add cereal price !',
                ]
            ],

            'quantity'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'You must add cereal quantity!'
                ]
            ],

            'land_type'=> [
                'rules' => "required",
                'errors'=> [
                    'required'  => 'Land type is required!',
                ]
            ],

            'season'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Select season please!'
                ]
            ],

            'rainy'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Choose one please!'
                ]
            ],

            'sunny'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Choose one please!'
                ]
            ],
        ]);

        if(!$validation) {
            return 
            view('template/navbar', $data).
            view('template/sidebar', $data).
            view('pages/register_cereal', ['validation'=>$this->validator]).
            view('template/footer', $data);
        } else {
            $cn  = ucfirst($this->request->getVar('cereal_name'));
            $ct  = ucfirst($this->request->getVar('cereal_type'));
            $cp  = $this->request->getVar('cereal_price');
            $cq  = $this->request->getVar('quantity');
            $lt  = $this->request->getVar('land_type');
            $ss  = $this->request->getVar('season');
            $rn  = $this->request->getVar('rainy');
            $sn  = $this->request->getVar('sunny');

            $values = [
                'cereal_name'  => $cn,
                'cereal_type'  => $ct,
                'cereal_price' => $cp,
                'quantity'     => $cq,
                'land_type'    => $lt,
                'season'       => $ss,
                'rainy'        => $rn,
                'sunny'        => $sn,
            ];

            $query = $cerealModel->insert($values);

            if(!$query) {
                return redirect()->back()->with('fail', 'Something went wrong!');
            } else {
                return redirect()->to('cereal/register')->with('success', 'Cereal is registered successfully!');
            }
        }
    }


    public function cerealViewAll() {
        $adminModel  = new AdminModel();
        $cerealModel = new CerealModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        $cerealFetch  = $cerealModel->orderBy('cereal_type', 'ASC')->findAll();

        $page_title = session()->get('adminRole') =='Admin'?'View all registered cereals':'Cereal list for Agro-dealer';

        $data = [
            'page_title' => $page_title,
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
            'cereals'     => $cerealFetch,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_cereals', $data).
        view('template/footer', $data);
    }

    public function cerealView($id = null) {

        $adminModel = new AdminModel();
        $cerealModel= new CerealModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        $cerealItem   = $cerealModel->where('cereal_id', $id)->first();

        $data = [
            'page_title' => "Update ".$cerealItem['cereal_name']." info",
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
            'cereal'     => $cerealItem,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/view_cereal', $data).
        view('template/footer', $data);
    }

    public function cerealUpdate($id = null) {

        $adminModel = new AdminModel();
        $cerealModel= new CerealModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);
        $cerealItem   = $cerealModel->where('cereal_id', $id)->first();

        $data = [
            'page_title' => "Update ".$cerealItem['cereal_name']." info",
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
            'cereal'     => $cerealItem,
        ];

        $validation = $this->validate([
            'cereal_name'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Cereal name is required!',
                ]
            ],

            'cereal_type'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Cereal type is required!',
                ]
            ],

            'cereal_price'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Add cereal price !',
                ]
            ],

            'quantity'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'You must add cereal quantity!'
                ]
            ],

            'land_type'=> [
                'rules' => "required",
                'errors'=> [
                    'required'  => 'Land type is required!',
                ]
            ],

            'season'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Select season please!'
                ]
            ],

            'rainy'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Choose one please!'
                ]
            ],

            'sunny'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Choose one please!'
                ]
            ],
        ]);

        if(!$validation) {
            return 
            view('template/navbar', $data).
            view('template/sidebar', $data).
            view('pages/view_cereal', ['validation'=>$this->validator]).
            view('template/footer', $data);
        } else {
            $values = [
                'cereal_name'  => ucfirst($this->request->getVar('cereal_name')),
                'cereal_type'  => ucfirst($this->request->getVar('cereal_type')),
                'cereal_price' => $this->request->getVar('cereal_price'),
                'quantity'     => $this->request->getVar('quantity'),
                'land_type'    => $this->request->getVar('land_type'),
                'season'       => $this->request->getVar('season'),
                'rainy'        => $this->request->getVar('rainy'),
                'sunny'        => $this->request->getVar('sunny'),
            ];
            $cerealModel->update($id, $values);
            return $this->response->redirect(site_url('cereal/all'));
        }
    }

    public function cerealDelete($id = null) {
        $cerealModel = new CerealModel();
        $cerealModel->where('cereal_id', $id)->delete($id);
        return $this->response->redirect(site_url('cereal/all'));
    }

    public function cerealApplication() {
        $userModel  = new UserModel();
        $cerealModel= new CerealModel();
        
        $activeUserId= session()->get('activeUser');
        $userData    = $userModel->find($activeUserId);
        $viewCereals   = $cerealModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'page_title' => 'Apply for Cereal',
            'breadcrumb' => 'Cereal',
            'userData'   => $userData,
            'cereals'    => $viewCereals,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/applying', $data).
        view('template/footer', $data);
    }

    public function cerealAppSubmit() {

        $userModel  = new UserModel();
        $cerealModel= new CerealModel();
        $appModel   = new ApplicationModel();
        
        $activeUserId= session()->get('activeUser');
        $activeDistId= session()->get('activeDist');

        $userData    = $userModel->find($activeUserId);
        $viewCereals   = $cerealModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'page_title' => 'Apply for Cereal',
            'breadcrumb' => 'Cereal',
            'userData'   => $userData,
            'cereals'    => $viewCereals,
        ];

        $validation = $this->validate([
            'cereal_id'=> [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Select Cereal Please!',
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
            ]
        ]);

        if(!$validation) {
            return 
            view('template/navbar', $data).
            view('template/sidebar', $data).
            view('pages/applying', ['validation'=>$this->validator]).
            view('template/footer', $data);

        } else {
            $cid = $this->request->getVar('cereal_id');
            $qty = $this->request->getVar('quantity');

            // retrieve one cereal::gadiradufasha: to update the remaining Q
            $cereal     = $cerealModel->where('cereal_id', $cid)->first();
            $remained_q = $cereal['quantity'] - $qty;
            $updatable  = ['quantity' => $remained_q];

            if($qty <= $cereal['quantity']) {
                $cerealModel->update($cid, $updatable);
            } else {
                return redirect()->to('farmer/dashboard')->with('fail', 'You applied for too much cereal, Only('.$cereal['quantity'].') kg(s) left in store, Try below '.$cereal['quantity'].')kgs please!');
            }

            $values = [
                'farmer_id'   => $activeUserId,
                'district'    => $activeDistId,
                'cereal_id'   => $cid,
                'quantity'    => $qty,
                'season'      => $this->request->getVar('season'),
            ];
            $query = $appModel->insert($values);

            if($query) {
                return redirect()->to('farmer/dashboard')->with('success', 'Cereal application of ('.$cereal['cereal_type'].') is successful!');
            } else {
                return redirect()->back()->with('fail', 'Application is not successful!');
            }
        }
    }


    public function cerealAllApplied() {

        $appModel  = new ApplicationModel();
        $userModel = new UserModel();

        $activeUserId= session()->get('activeUser');
        $activeDistId= session()->get('activeDist');
        $userData    = $userModel->find($activeUserId);

        $viewCereals  = $this->db->table($this->table)->select('c.cereal_name, c.cereal_type, c.land_type, app.app_id, app.farmer_id, app.cereal_id, app.quantity, app.season, app.status AS appstatus, app.app_date')->join('cereal c', 'c.cereal_id=app.cereal_id', 'left')->where('app.farmer_id', $activeUserId)->orderBy('app.app_date', 'DESC')->get()->getResult();

        $data = [
            'page_title' => 'All cereals you applied for previously',
            'breadcrumb' => 'Application',
            'userData'   => $userData,
            'cereals'    => $viewCereals,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/applied_cereals', $data).
        view('template/footer', $data);
    }

    // At Admin side
    public function cerealAppRequests() {

        $appModel   = new ApplicationModel();
        $adminModel = new AdminModel();

        $activeAdminId = session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);

        $viewCereals  = $this->db->table($this->table)->select('c.cereal_name, c.cereal_type, c.land_type, app.app_id, app.farmer_id, app.cereal_id, app.quantity, app.season, app.status AS appstatus, app.app_date, f.firstname, f.lastname, f.telephone')->join('cereal c', 'c.cereal_id=app.cereal_id', 'left')->join('farmer f', 'f.farmer_id=app.farmer_id', 'left')->orderBy('app.app_date', 'DESC')->get()->getResult();

        $data = [
            'page_title' => 'All cereals requests from farmers',
            'breadcrumb' => 'Application',
            'adminData'  => $adminData,
            'cereals'    => $viewCereals,
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/applied_cer_req', $data).
        view('template/footer', $data);
    }

    public function cerealAppReview($id = null) {

        $adminModel = new AdminModel();
        $appModel   = new ApplicationModel();
        $cerealModel= new CerealModel();
        $userModel  = new UserModel();

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);

        // Getting & carry data to view separately
        $appDataX      = $appModel->find($id);
        $cerealDataX   = $cerealModel->find($appDataX['cereal_id']);
        $farmerDataX   = $userModel->find($appDataX['farmer_id']);

        // Fetch fertilizer to check for before submission @gadrawingz
        $fertilizers  = $this->db->table('fertilizer')->orderBy('item_type', 'ASC')->get()->getResult();

        $data = [
            'page_title' => "View & add fertilizers to (".$cerealDataX['cereal_type'].") cereal",
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
            'app'        => $appDataX,
            'cereal'     => $cerealDataX,
            'farmer'     => $farmerDataX,
            'ferts'      => $fertilizers
        ];

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/applied_cer_review', $data).
        view('template/footer', $data);
    }



    // SUBMISSION TO SERVER @DONNEKT IT
    public function cerealApproval() {
        $f_f_model  = new FFarmerModel();
        $fert_Model = new FertilizerModel();
        $adminModel = new AdminModel();
        $appModel   = new ApplicationModel();
        $cerealModel= new CerealModel();
        $userModel  = new UserModel();

        // From hidden input type
        $app_id     = $this->request->getVar('app_id');
        $cereal_id  = $this->request->getVar('cereal_id');
        $cereal_type= $this->request->getVar('cereal_type');
        $cereal_price= $this->request->getVar('cereal_price');
        $farmer_id  = $this->request->getVar('farmer_id');
        $quantity   = $this->request->getVar('quantity');
        $firstname  = $this->request->getVar('firstname');
        $lastname   = $this->request->getVar('lastname');
        $telephone  = $this->request->getVar('telephone');
        $fert1      = $this->request->getVar('fert1');
        $fert2      = $this->request->getVar('fert2');
        $fert3      = $this->request->getVar('fert3');
        $f_quantity = $this->request->getVar('f_quantity');
        $c_quantity = $this->request->getVar('c_quantity');
        $cq_untouch = $this->request->getVar('c_quantity_untouch'); // Untouched quantity

        $totalPrice = $cereal_price * $quantity;

        $activeAdminId= session()->get('activeAdmin');
        $adminData    = $adminModel->find($activeAdminId);

        // Getting & carry data to view separately
        $appDataX      = $appModel->find($app_id);
        $cerealDataX   = $cerealModel->find($appDataX['cereal_id']);
        $farmerDataX   = $userModel->find($appDataX['farmer_id']);

        // Fetch fertilizer to check for before submission @gadrawingz
        $fertilizers  = $this->db->table('fertilizer')->orderBy('item_type', 'ASC')->get()->getResult();

        $data = [
            'page_title' => "View & add fertilizers to (".$cerealDataX['cereal_type'].") cereal",
            'breadcrumb' => 'Cereal',
            'adminData'  => $adminData,
            'app'        => $appDataX,
            'cereal'     => $cerealDataX,
            'farmer'     => $farmerDataX,
            'ferts'      => $fertilizers
        ];

        $validation = $this->validate([
            'f_quantity' => [
                'rules' => 'required|min_length[1]',
                'errors'=> [
                    'required' => 'Fertilizer quantity is required please!',
                    'min_length' => 'Fertilizer quantity is not allowed to be under 1 kg!',
                ]
            ],

            'c_quantity' => [
                'rules' => 'required|min_length[1]',
                'errors'=> [
                    'required' => 'Cereal quantity is required please!',
                    'min_length' => 'Cereal quantity is not allowed to be under 1 kg!',
                ]
            ],

            'fert1' => [
                'rules' => 'required',
                'errors'=> [
                    'required' => 'First fertilizer is required!',
                ]
            ],
        ]);

        if(!$validation) {
            return 
            view('template/navbar', $data).
            view('template/sidebar', $data).
            view('pages/applied_cer_review', ['validation'=>$this->validator]).
            view('template/footer', $data);
        } else {
            
            $values = [
                'farmer_id' => $farmer_id,
                'cereal_id' => $cereal_id,
                'quantity'  => $quantity,
                'fert1'     => $fert1,
                'fert2'     => $fert2,
                'fert3'     => $fert3,
            ];

            // Transfer data to fert_farmer table
            $query = $f_f_model->insert($values);

            if(!$query) {
                return redirect()->back()->with('fail', 'Something went wrong!');
            } else {
                // And go to update status for approval mark @donnekt 
                $data_5 = ['status'   => '1'];
                $appModel->update($app_id, $data_5);

                // SMS API Integration @gadrawingz
                $names = $firstname." ".$lastname;
                $data = array(
                    "sender"=>'KIGALIGAS',
                    "recipients"=>$telephone,
                    "message"=>"CEREAL MIS: Mwiriwe, Ubusabe bwanyu (".$names."), Ubu mwemerewe imbuto mwasabye ya (".$cereal_type."), ibiro ".$quantity."kgs, hamwe n'ifumbire ingana na (".$f_quantity.") kgs, Byose bifite agaciro kangana na (".$totalPrice.") rwf, Murakoze!");

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

                // by giving away fert, update the remaining quantity - this 1
                $singleFert = $fert_Model->where('item_id', $fert1)->first();
                $remained_f = $singleFert['quantity'] - $f_quantity;
                $upd_fertis = ['quantity' => $remained_f];
                $fert_Model->update($fert1, $upd_fertis);

                // If Agro changed cereal quantity at his side:(NB)
                $appModel->update($app_id, ['quantity' => $c_quantity]);

                // If farmer given quantity is on-fly edited by agrodealer
                // Update quantity again; // .valid @gadrawingz see!
                
                if ($c_quantity>$cq_untouch) {
                    
                    // Get last quantity data by this id (1)
                    $singleC1 = $cerealModel->where('cereal_id', $cereal_id)->first();
                    $lastInQuantity = $singleC1['quantity'];

                    // Get the difference between the quantity added by farmer 
                    // (cq_untouch) & the quantity modified by agro(c_quantity) (2)
                    $new_cereal_quantity = $c_quantity - $cq_untouch;

                    // Get final result to push as update(3)
                    $updates = ['quantity' => $lastInQuantity-$new_cereal_quantity];
                    
                    // Update final data (4)
                    $cerealModel->update($cereal_id, $updates);

                } else if ($c_quantity<$cq_untouch) {
                    
                    // Get last quantity data by this id (1)
                    $singleC1 = $cerealModel->where('cereal_id', $cereal_id)->first();
                    $lastInQuantity = $singleC1['quantity'];

                    // Get the difference between the quantity added by farmer 
                    // (cq_untouch) & the quantity modified by agro(c_quantity) (2)
                    $new_cereal_quantity = $cq_untouch - $c_quantity;

                    // Get final result to push as update(3)
                    $updates = ['quantity' => $lastInQuantity+$new_cereal_quantity];
                    
                    // Update final data (4)
                    $cerealModel->update($cereal_id, $updates);

                    //PUSH MESSAGE: QUANTITY LOWERED BY AGRO:
                    $data = array(
                        "sender"=>'KIGALIGAS',
                        "recipients"=>$telephone,
                        "message"=>"CEREAL MIS: Mwiriwe (".$names."), Kubera imbuto(cereal) mwasabye ari nyinshi ingano yibyo mwasabye yagabanijwe kuva ku biro (".$cq_untouch.") kg(s) kugera ku biro (".$c_quantity." kgs) Bitewe n'ingano(quantity) nkeya y'ibisigaye mu bubiko bw'izi mbuto, Murakoze!");
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

                } else {
                    // Do nothing; Means No modification's done on quantity
                }

                return redirect()->to('cereal/requests')->with('success', 'Approval is successful!');
            }
        }

        return
        view('template/navbar', $data).
        view('template/sidebar', $data).
        view('pages/applied_cer_review', $data).
        view('template/footer', $data);
    }


}
?>