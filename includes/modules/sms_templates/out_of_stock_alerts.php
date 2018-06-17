<?php
/*
  $Id: out_of_stock_alerts.php $
  TomatoCart Open Source Shopping Cart Solutions
  http://www.tomatocart.com
  http://www.tomatoshop.ir  Persian Tomatocart v1.1.5 / Azar 1390
  Copyright (c) 2009 Wuxi Elootec Technology Co., Ltd

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/

  require_once(realpath(dirname(__FILE__) . '/../../../'). '/includes/classes/sms_template.php');

  class toC_Sms_Template_out_of_stock_alerts extends toC_Sms_Template {

/* Private variables */

    var $_template_name = 'out_of_stock_alerts',
        $_keywords = array( '%%products_name%%',                    
                            '%%products_quantity%%');

/* Class constructor */
    function toC_Sms_Template_out_of_stock_alerts() {
      parent::toC_Sms_Template($this->_template_name);
    }
    
    /* Private methods */
    function setData($products_name, $products_quantity) {
      $this->products_quantity = $products_quantity;
      $this->products_name = $products_name;
      
      $this->addRecipient(SMS_ADMIN_MOBILE_NUMBER);
    }

    function buildMessage() {
      $replaces = array($this->products_name, $this->products_quantity);

      $this->_sms_text = str_replace($this->_keywords, $replaces, $this->_content);
    }
  }
?>
    
