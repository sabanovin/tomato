<?php
/*
  $Id: main.php $
  TomatoCart Open Source Shopping Cart Solutions
  http://www.tomatocart.com

  Copyright (c) 2009 Wuxi Elootec Technology Co., Ltd

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/

  echo 'Ext.namespace("Toc.sms_templates");';
  
  include('sms_templates_dialog.php');
  include('sms_templates_grid.php');
?>

Ext.override(TocDesktop.SmsTemplatesWindow, {

  createWindow : function() {
    var desktop = this.app.getDesktop();
    var win = desktop.getWindow('sms_templates-win');
     
    if (!win) {
      grd = new Toc.sms_templates.SmsTemplatesGrid({owner: this});

      win = desktop.createWindow({
        id: 'sms_templates-win',
        title:'<?php echo $osC_Language->get('heading_title'); ?>',
        width: 800,
        height: 400,
        iconCls: 'icon-sms_templates-win',
        layout: 'fit',
        items: grd
      });
    }
       
    win.show();
  },
  
  createSmsTemplatesDialog: function(title) {
    var desktop = this.app.getDesktop();
    var dlg = desktop.getWindow('sms_templatesDialog-win');
    
    if (!dlg) {
      dlg = desktop.createWindow({title: title}, Toc.sms_templates.SmsTemplatesDialog);
      
      dlg.on('saveSuccess', function(feedback) {
        this.app.showNotification({title: TocLanguage.msgSuccessTitle, html: feedback});
      }, this);
    }
      
    return dlg;
  }
});