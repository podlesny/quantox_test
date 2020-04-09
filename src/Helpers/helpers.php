<?php

function getContentTypeHeader($board){
	switch($board){
		case _CSMB:{
			return 'Content-Type: text/xml';
		}
		break;
		case _CSM:{
			return 'Content-Type: application/json';
		}
		break;
		default :{
			return 'Content-Type: text/plain';
		}
	}
}