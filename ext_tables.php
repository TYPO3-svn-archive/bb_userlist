<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}


Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Bb_userlist_list',
	'Userlist'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_Bb_userlist_list';
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms//flexform_pi1.xml');

include_once(t3lib_extMgm::extPath($_EXTKEY).'/Configuration/FlexForms/class.tx_bbuserlist_addFieldsToFlexForm.php');
$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . 'bb_userlist_list';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .'bb_userlist_list'. '.xml');






t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'MM_Forum Userlist');


?>