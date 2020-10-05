<?php
	/*#### Security For Login ####*/
	if(!function_exists('session_check')) {
	function session_check(){
		$CI = &get_instance();
		if(!($CI->session->userdata('jwtTokenShop'))) {
				if(
					$CI->uri->segment(1) != "logins" && 
					$CI->uri->segment(1) != "shops" &&
					$CI->uri->segment(1) != "policies" &&
					$CI->uri->segment(1) != "terms" &&
					$CI->uri->segment(1) != "contacts" &&
					$CI->uri->segment(1) != "abouts" &&
					$CI->uri->segment(1) != "abouts" &&
					$CI->uri->segment(1) != "carts" &&
					$CI->uri->segment(1) != "checkouts" &&
					$CI->uri->segment(1) != "thank_you" &&
					$CI->uri->segment(1) != "gettingstarted" &&
					$CI->uri->segment(1) != "business" &&
					$CI->uri->segment(1) != "specials" &&
					$CI->uri->segment(1) != "stores" &&
					$CI->uri->segment(1) != "")	{
					return redirect('logins');
				}
			}
		}
	}
?>