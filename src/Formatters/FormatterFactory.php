<?php

class FormatterFactory{

	public static function make($board){
		switch ($board){
			case _CSMB: {
				$formatter = new XMLFormatter();
			}
			break;
			case _CSM: {
				$formatter = new JSONFormatter();
			}
			break;
			default: {
				$formatter =  new JSONFormatter();
			}
		}
		return $formatter;
	}

}