<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
/*******************************************************************************************************/
/*Retornamos la vista que desplegará  en principal*/
	
	/*Get lista reportes del sistema Enid service */
	/*
	function getListrepo($list_repo_system )
	{
		$list ="";
		foreach ($list_repo_system as $key => $row) {
				
				$list .= "<tr>";
				$list.= get_td( $row["idreportesystema"] ,"" );
	            $list .=get_td( $row["reporte"] , "");
	            $list .=get_td( $row["descripcionreporte"], "");
	            
	            $update_text_status="update-text-status-". $row["idreportesystema"];                     

	            $list .= "<td class='update-status-repo' id='". $row["idreportesystema"] . "' data-toggle='modal' data-target='#basicModalupdatestatus'  >	            
	            			<div id='".$update_text_status."'> "  .$row["status_repo"] ." </div> </td>";

	            $list .= get_td( $row["tiporeporte"] , "");
	            $list .= get_td( getTimeFormat3( $row["fecha_registro"]) , "");
				$list .= "</tr>";

			}	
		return  $list;
	}
	*/

}/*Termina el helper*/