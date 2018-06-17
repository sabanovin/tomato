
DROP TABLE IF EXISTS toc_sms_templates;
CREATE TABLE toc_sms_templates (
  sms_templates_id int(11) NOT NULL auto_increment,
  sms_templates_name varchar(100) NOT NULL,
  sms_templates_status tinyint(1) NOT NULL,
  PRIMARY KEY  (sms_templates_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS toc_sms_templates_description;
CREATE TABLE toc_sms_templates_description (
  sms_templates_id int(11) NOT NULL,
  language_id int(11) NOT NULL,
  sms_title varchar(255) NOT NULL,
  sms_content text NOT NULL,
  PRIMARY KEY  (sms_templates_id,language_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO toc_configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('کد ای پی ای -api-key', 'SMS_GETWAY_API', '', 'ََapi_key', '13', '8', now());

DELETE FROM toc_configuration WHERE configuration_key='SMS_GATEWAY';
DELETE FROM toc_configuration WHERE configuration_key='SMS_GETWAY_USERNAME';
DELETE FROM toc_configuration WHERE configuration_key='SMS_GETWAY_PASSWORD';
INSERT INTO toc_sms_templates (sms_templates_id, sms_templates_name, sms_templates_status) VALUES
(1, 'new_order_created', 1),
(2, 'new_order_created_admin', 1),
(3, 'out_of_stock_alerts', 1),
(4, 'admin_order_status_updated', 1);

INSERT INTO toc_sms_templates_description (sms_templates_id, language_id, sms_title, sms_content) VALUES
(1, 1, 'ثبت سفارش جدید', '%%customer_name%% گرامی ، سفارش شما ثبت گردید. -- شماره سفارش : %%order_number%% -- وضعيت سفارش : %%order_status%% -- %%store_name%%'),
(2, 1, 'اطلاع رسانی سفارش جدید برای مدیر', 'سفارش جدید--شماره سفارش : %%order_number%%--تاريخ سفارش : %%date_ordered%% -- تلفن مشتری : %%telephone%%--وضعيت سفارش : %%order_status%%--%%store_name%%'),
(3, 1, 'اتمام موجودی', '%%products_name%% موجودي ندارد--تعداد باقي مانده: %%products_quantity%%.--%%store_name%%'),
(4, 1, 'بروز رسانی سفارش', 'سفارش شما بروز شد -- شماره سفارش: %%order_number%% -- وضعیت سفارش: %%orders_status%% . --%%store_name%%');
