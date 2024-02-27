<?php

require_once 'lion.civix.php';

use CRM_Lion_ExtensionUtil as E;

function lion_civicrm_post ($op, $objectName, $objectId, &$objectRef){
  /**
   * Taking contact's first and last name to generate a nickname and log message.
   */

   if($objectName === "Individual" && $op === "create"){
    // get and set variables
    $contact_id = $objectRef->id;
    $contact_fname = $objectRef->first_name;
    $contact_lname = $objectRef->last_name;
    $contact_nickname = $contact_fname." ".$contact_lname;

    $setting_value = Civi::settings()->get('lion_text');

    // get individual using API4
    $results = \Civi\Api4\Individual::update(TRUE)
    ->addValue('nick_name', $contact_nickname)
    ->addWhere('id', '=', $contact_id)
    ->setLimit(25)
    ->execute();
    foreach ($results as $result) {
      Civi::log()->debug('from lion module, nickname is now: '.$result["nick_name"]." here is the setting value ".$setting_value);
    }
    
   }

}

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function lion_civicrm_config(&$config): void {
  _lion_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function lion_civicrm_install(): void {
  _lion_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function lion_civicrm_enable(): void {
  _lion_civix_civicrm_enable();
}
