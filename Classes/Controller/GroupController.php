<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Bastian Bringenberg <mail@bastian-bringenberg.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 3 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Controller for the Kategorie object
 */
class Tx_BbUserlist_Controller_GroupController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_BbUserlist_Domain_Repository_UserGroupRepository
	*/
	protected $frontendUserGroupRepository;
	public function injectFrontendUserGroupRepository(Tx_BbUserlist_Domain_Repository_UserGroupRepository $frontendUserGroupRepository) {
		$this->frontendUserGroupRepository = $frontendUserGroupRepository;
	}

	/**
	 * @var Tx_BbUserlist_Domain_Repository_UserRepository
	 */
	protected $frontendUserRepository;
	public function injectFrontendUserRepository(Tx_BbUserlist_Domain_Repository_UserRepository $frontendUserRepository) {
		$this->frontendUserRepository = $frontendUserRepository;
	}	
	
	/**
	 * @param Tx_BbReisen_Domain_Repository_ReiseRepository $reiseRepository
 	 * @return void
	 */
//	public function injectReiseRepository(Tx_BbReisen_Domain_Repository_ReiseRepository $reiseRepository) {
//		$this->reiseRepository = $reiseRepository;
//	}
	
	
	/**
	 * Displays The Plugin
	 *
	 * @param string Pagenumber
	 * @return void
	 */
	 public function showAction() {
		/**$cat=intval($this->settings['flexform']['kategorie']);
		$start=intval($this->settings['flexform']['start']);
		$end=intval($this->settings['flexform']['stop']);
		$orderby=intval($this->settings['flexform']['orderby']);
		$asc=intval($this->settings['flexform']['$this->settings['flexform']['asc']);**/
		//t3lib_div::debug($this->settings['flexform']['usergroup'], 'Alle Gruppen');
		//var_dump($this->settings['flexform']['usergroup']);
		$in_gruppen = explode ( ',' , $this->settings['flexform']['usergroup']); 
		$out_gruppen = array();
		if(count($in_gruppen)>0){
			foreach($in_gruppen as $in_gruppe){
				$gruppe = $this->frontendUserGroupRepository->findByUid($in_gruppe);
				//$gruppe = $this->frontendUserGroupRepository->countAll();

				if($gruppe===NULL) echo "WARUM????";
				//t3lib_div::debug($frontendUserGroupRepository,'Rep');
				t3lib_div::debug($in_gruppe, 'GruppenID');
				//var_dump($gruppe);
				//t3lib_div::debug($gruppe, 'GruppenObjekt');
				//$out_gruppen[$gruppe->getTitle()] = $this->frontendUserRepository->findByGroup($gruppe);
			}
		}
		$this->view->assign('groups', $out_gruppen);
		//$cat =  $this->frontendUserGroupRepository->findByUid($cat);
		//$reisen =  $this->reiseRepository->findByKategorie($cat,$start,$end,$orderby,$asc);
		//$this->view->assign('reisen', $reisen);
		//$this->view->assign('perpage', intval($this->settings['flexform']['perPage']));
		//$this->view->assign('filepath', $_SERVER['HTTP_HOST'].$this->settings['fileFolder']);
	}

}
?>