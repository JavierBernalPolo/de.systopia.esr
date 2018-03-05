<?php
/*-------------------------------------------------------+
| Project 60 - SEPA direct debit                         |
| Copyright (C) 2016-2018                                |
| Author: @scardinius                                    |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+--------------------------------------------------------*/

class CRM_Sepa_Logic_Format_ta875 extends CRM_Sepa_Logic_Format {

  /**
   * gives the option of setting extra variables to the template
   */
  public function assignExtraVariables($template) {
    $config = new CRM_Esr_Config();

    // TODO: settings?
    $template->assign('ta875_BC_ZP',  $config->get_ta875_BC_ZP());
    $template->assign('ta875_EDAT',   date('Ymd'));
    $template->assign('ta875_BC_ZE',  $config->get_ta875_BC_ZE());
    $template->assign('ta875_ESR_TN', $config->get_ta875_ESR_TN());
  }

  public function getDDFilePrefix() {
    return 'AVNC-';
  }

  public function getFilename($variable_string) {
    return $variable_string.'.LSV';
  }
}
