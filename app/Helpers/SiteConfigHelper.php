<?php


function siteName() {	
    return "DPH-ADMIN";
}

function logo() {
	return asset('packa/logo/logo.png');
	
}

function headerLogo() {
	return asset('packa/logo/header.gif');

}

function authBanner() {
	return asset('packa/auth-banner/banner.jpg');

}

function favicon() {
	
    return  asset('packa/logo/favicon.png');
}

function userimage() {
	return asset('packa/theme/images/users/noimage.jpg');
	
}

function fileLink($filename) {
	if($filename) {
		return asset("tndphpmfiles/$filename");
	}
	return $filename;

}


