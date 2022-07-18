<?php namespace App\Filters;
// Gadrawin's coding -> @gadrawingz, @donnekt
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

// A Filter class to prevent unauthorized access
class AdminAuthCheckFilter implements FilterInterface {

	public function before(RequestInterface $request, $arguments = null) {
		
		if(!session()->get('activeAdmin')) {
			return redirect()->to('admin/login')->with('fail', 'Access Denied, You must login first!');
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {

	}

}
?>