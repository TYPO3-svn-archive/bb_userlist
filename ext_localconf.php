<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Bb_userlist_list',
	array(
		'Group' => 'show'
	),
	// non-cacheable actions
	array(
		'Group' => ''
	)
);

?>