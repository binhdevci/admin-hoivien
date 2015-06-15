<?php
function format_date_view($date){
	 if(!empty($date)){
	 	return date('Y-m-d', strtotime($date));
	 }
	 return '';
}