<?php

function paymentStatuses() {

	return [
		['id' => 1, 'name'=>'Pending'],
		['id' => 2, 'name'=>'Paid'],	
	];
}


function findPaymentStatus($id) {

	$statusArr = paymentStatuses();		
	return collect($statusArr)->where('id',$id)->first()['name'] ?? '';
}

function defaultCountryCode(){
	return "+91";
}

function _superAdminUserTypeId(){
	return array_flip(config('constant.user_type'))['super_admin'] ?? '';
}

function _subAdminUserTypeId(){
	return array_flip(config('constant.user_type'))['sub_admin'] ?? '';
}

function _employeeUserTypeId(){
	return array_flip(config('constant.user_type'))['employee'] ?? '';
}

function _hudUserTypeId(){
	return array_flip(config('constant.user_type'))['hud'] ?? '';
}


function findUserType($id) {

	$user_types = config('constant.user_type');
	$user_type_label = $user_types[$id] ?? '';
	if ($user_type_label == 'employee') {
		$user_type_label = 'USER';
	}
	return strtoupper($user_type_label);
}


function isAdmin() {
	$user_type_id = auth()->user()->user_type_id ?? 0;
	$usertypes = array_flip(config('constant.user_type'));
	return in_array((int)$user_type_id, [$usertypes['super_admin'],$usertypes['sub_admin']]);
}

function isHud() {
	$user_type_id = auth()->user()->user_type_id ?? 0;
	return (int)$user_type_id == array_flip(config('constant.user_type'))['hud'];
}

function isEmployee() {
	$user_type_id = auth()->user()->user_type_id ?? 0;
	return (int)$user_type_id == array_flip(config('constant.user_type'))['employee'];
}

function _hudContactType()
{
	return array_flip(config('constant.contact_types'))['hud'] ?? '';
}

function _blockContactType()
{
	return array_flip(config('constant.contact_types'))['block'] ?? '';
}

function _phcContactType()
{
	return array_flip(config('constant.contact_types'))['phc'] ?? '';
}

function _hscContactType()
{
	return array_flip(config('constant.contact_types'))['hsc'] ?? '';
}