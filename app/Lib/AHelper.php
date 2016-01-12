<?php namespace App\Lib;
use DB;
class AHelper {
	public static function format_message($message,$type){
        
		//success | info | warning | danger
  
        $alert = '';
        $alert .= '<div class="alert alert-'.$type.' alert-dismissable">';
        $alert .= '<button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>';
		$alert .= $message;	            
		$alert .= '</div>';
		return $alert;
    }


    public function RoleSelect($lvl=''){
    	$role = DB::table('roles')->orderBy('id','asc')->get();
    	$a ='';
    	$a .= '<select name="role" class="form-control m-b">';
    	$a .= '<option value="0">----</option>';
    	foreach ($role as $key => $value) {
	  		$sl = ($lvl != $value->id) ? '' : 'selected';
	  		
            $a .= '<option value="'.$value->id.'" '.$sl.'>'.$value->name.'</option>';
	  	}
	  	$a .= '</select>'; 
	  	return $a;
    }

  

   
}