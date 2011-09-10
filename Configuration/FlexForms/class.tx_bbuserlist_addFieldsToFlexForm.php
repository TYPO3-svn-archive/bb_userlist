<?php
class tx_bbuserlist_addFieldsToFlexForm {

  /**
   * Adding category entries to Flexform
   *
   * @param  array    $config: the config array
   * @return  array    items for select type in flexform XML
   * @todo Multilanguage support needs to be implemented
   */
  function addFields($config) {
    $optionList = array ();
 
    // Execute query
    $table = 'fe_groups';
    $enableFields = ' NOT hidden AND NOT deleted';
    //$save = $GLOBALS['TYPO3_DB']->SELECTquery('*', $table, $enableFields, '', 'title ASC');
    //t3lib_div::debug(array($save),'Query');
    //t3lib_div::debug($save, 'Ende');
   //t3lib_div::devLog($save, 'bb_userlist', 3);
    $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', $table, $enableFields, '', 'title ASC');

    // Fill array with options
    while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
      $optionList[] = array (
        0 => $row['title'],
        1 => $row['uid']
      );
    }
    // merge results and return
    $config['items'] = array_merge($config['items'], $optionList);
    return $config;
  }
}