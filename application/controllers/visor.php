<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visor extends CI_Controller {
	function __construct() {
        parent::__construct();        
        $this->load->helper("url");
		require_once(APPPATH.'libraries/nusoap/nusoap'.EXT); //includes nusoap
    }
    public function index()
    {      
        $this->load->helper('url');     
        $result ="";
        try {                 
            if( $_POST['txtFolio'] && $_POST['ddlTipoDTE'] &&  $_POST['txtEmi'] &&  $_POST['txtMto'] && $_POST['txtRut']){                    
                $txtRut = $_POST['txtRut'];
                $txtFolio = $_POST['txtFolio'];
                $ddlTipoDTE = $_POST['ddlTipoDTE'];
                $txtEmis = $_POST['txtEmi'];
                $txtMto = $_POST['txtMto'];
                $ExistDoc = FALSE;
                
				$client = new nusoap_client('http://www.imn.ac.cr/MeteorologicoWS/MeteorologicoWS.asmx?wsdl','wsdl');
				$response = $client->call('Efemerides');
				//print_r( $result);        

                
                if(ISSET($response)){
                    try{
	            
						$this->session->set_flashdata('pdf',$response);
						
                        
                    } catch (Exception $ex) {
                    }
                }else{
                	$this->session->set_flashdata('pdf',$result);
					$this->session->set_flashdata('rut',$txtRut);
					$this->session->set_flashdata('folio',$txtFolio);
					$this->session->set_flashdata('tipodte',$ddlTipoDTE);
					$this->session->set_flashdata('emision',$txtEmis);
					$this->session->set_flashdata('monto',$txtMto);
					$this->session->set_flashdata('mensaje', 'No existe documento para los criterios proporcionados');                    
                    redirect( base_url() );
                }                
            }else{              
                $this->session->set_flashdata('mensaje', '* Error: Debe llenar todos los campos');
                redirect( base_url() );
            } 
        } catch (Exception $ex) {                                   
                echo $ex;
        }
    }
}