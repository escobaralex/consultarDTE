<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Testsoap extends CI_Controller {
	function __construct() {
        parent::__construct();        
        $this->load->helper("url");
		require_once(APPPATH.'libraries/nusoap/nusoap'.EXT); //includes nusoap
    }
    public function index(){   
         $client = new nusoap_client('http://www.imn.ac.cr/MeteorologicoWS/MeteorologicoWS.asmx?wsdl','wsdl');
         $result = $client->call('Efemerides');
         print_r( $result);        
/*
		$length = count($pdf);
		header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename=test');
		header("Content-Length: $length");	
		echo base64_decode($pdf);
*/
    }
}