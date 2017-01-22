<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{        
        $this->load->helper('url'); 
		
		$data['mensaje'] = "";
		$data['pdf'] = "";
		$data['rut'] = "";
		$data['folio'] = "";
		$data['tipodte'] = "";
		$data['emision'] = "";
		$data['monto'] = "";		
		
		if( $this->session->flashdata('pdf') )
			$data['pdf'] = $this->session->flashdata('pdf');
		
		if( $this->session->flashdata('rut') )
			$data['rut'] = $this->session->flashdata('rut');
		
		if( $this->session->flashdata('folio') )
			$data['folio'] = $this->session->flashdata('folio');
		
		if( $this->session->flashdata('tipodte') )
			$data['tipodte'] = $this->session->flashdata('tipodte');
		
		if( $this->session->flashdata('emision') )
			$data['emision'] = $this->session->flashdata('emision');
		
		if( $this->session->flashdata('monto') )
			$data['monto'] = $this->session->flashdata('monto');
		
		if( $this->session->flashdata('mensaje') ){
			
			$msg = $this->session->flashdata('mensaje');
			
			$data['mensaje'] = $msg;
        	$this->load->view('home',$data);
			
		}else{
			$data['mensaje'] = "";
			$this->load->view('home',$data);
		}              
        
	}
}