<?php
if(!defined('BASEPATH')){
	exit('No direct script acces allowed');
}
if(!function_exists('assets_url()')){
	function assets_url(){
	 return base_url().'assets';
	 echo base_url();
	 
	}
}

?>