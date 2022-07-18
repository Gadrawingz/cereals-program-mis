<?php namespace App\Filters;
// Gadrawin's coding -> @gadrawingz, @donnekt
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

// A Filter class to prevent unauthorized access
class AdminNoAuthCheckFilter implements FilterInterface {

	public function before(RequestInterface $request, $arguments = null) {

		if(session()->has('activeAdmin')) {
			return redirect()->back();
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {

	}

}
?>