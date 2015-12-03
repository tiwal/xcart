







CREATE TABLE xcart_address_book (
  id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL DEFAULT '0',
  default_s char(1) NOT NULL DEFAULT 'N',
  default_b char(1) NOT NULL DEFAULT 'N',
  title varchar(32) NOT NULL DEFAULT '',
  firstname varchar(128) NOT NULL DEFAULT '',
  lastname varchar(128) NOT NULL DEFAULT '',
  address varchar(255) NOT NULL DEFAULT '',
  city varchar(64) NOT NULL DEFAULT '',
  county varchar(32) NOT NULL DEFAULT '',
  state varchar(32) NOT NULL DEFAULT '',
  country char(2) NOT NULL DEFAULT '',
  zipcode varchar(32) NOT NULL DEFAULT '',
  zip4 varchar(4) NOT NULL DEFAULT '',
  phone varchar(32) NOT NULL DEFAULT '',
  fax varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (id),
  KEY userid (userid),
  KEY default_s (userid,default_s),
  KEY default_b (userid,default_b)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_amazon_data (
  ref varchar(255) NOT NULL DEFAULT '',
  sessid char(32) NOT NULL DEFAULT '',
  cart mediumtext NOT NULL,
  PRIMARY KEY (ref),
  KEY sessid (sessid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_amazon_orders (
  orderid int(11) NOT NULL DEFAULT '0',
  amazon_oid varchar(255) NOT NULL DEFAULT '',
  total decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (orderid),
  UNIQUE KEY ao (amazon_oid,orderid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_benchmark_pages (
  pageid int(11) NOT NULL AUTO_INCREMENT,
  script varchar(64) NOT NULL DEFAULT '',
  `data` varchar(255) NOT NULL DEFAULT '',
  method char(1) NOT NULL DEFAULT 'G',
  PRIMARY KEY (pageid),
  UNIQUE KEY sdm (script,`data`,method)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_bonus_memberships (
  bonusid int(11) NOT NULL DEFAULT '0',
  membershipid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (bonusid,membershipid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_categories (
  categoryid int(11) NOT NULL AUTO_INCREMENT,
  parentid int(11) NOT NULL DEFAULT '0',
  category varchar(255) NOT NULL DEFAULT '',
  description text NOT NULL,
  meta_description text NOT NULL,
  avail char(1) NOT NULL DEFAULT 'Y',
  views_stats int(11) NOT NULL DEFAULT '0',
  order_by int(11) NOT NULL DEFAULT '0',
  threshold_bestsellers int(11) NOT NULL DEFAULT '1',
  product_count int(11) NOT NULL DEFAULT '0',
  top_product_count int(11) NOT NULL DEFAULT '0',
  meta_keywords text NOT NULL,
  override_child_meta char(1) NOT NULL DEFAULT 'Y',
  title_tag text NOT NULL,
  lpos int(11) NOT NULL DEFAULT '0',
  rpos int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (categoryid),
  UNIQUE KEY ia (categoryid,avail),
  KEY avail (avail),
  KEY order_by (order_by,category),
  KEY lpos (lpos),
  KEY rpos (rpos),
  KEY parentid (parentid),
  KEY poc (parentid,order_by,category),
  KEY pa (lpos,avail)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_categories_lng (
  `code` char(2) NOT NULL DEFAULT '',
  categoryid int(11) NOT NULL DEFAULT '0',
  category varchar(255) NOT NULL DEFAULT '',
  description text NOT NULL,
  PRIMARY KEY (`code`,categoryid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_categories_subcount (
  categoryid int(11) NOT NULL DEFAULT '0',
  subcategory_count int(11) NOT NULL DEFAULT '0',
  product_count int(11) NOT NULL DEFAULT '0',
  top_product_count int(11) NOT NULL DEFAULT '0',
  membershipid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (categoryid,membershipid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_category_bookmarks (
  categoryid int(11) NOT NULL DEFAULT '0',
  add_date int(11) NOT NULL DEFAULT '0',
  userid int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY categoryid (categoryid,userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_category_memberships (
  categoryid int(11) NOT NULL DEFAULT '0',
  membershipid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (categoryid,membershipid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_cc_gestpay_data (
  `value` char(32) NOT NULL DEFAULT '',
  `type` char(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`value`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_cc_pp3_data (
  ref varchar(255) NOT NULL DEFAULT '',
  sessid char(32) NOT NULL DEFAULT '',
  param1 varchar(255) NOT NULL DEFAULT '',
  param2 varchar(255) NOT NULL DEFAULT '',
  param3 varchar(255) NOT NULL DEFAULT '',
  param4 varchar(255) NOT NULL DEFAULT '',
  param5 varchar(255) NOT NULL DEFAULT '',
  param6 varchar(255) NOT NULL DEFAULT '',
  param7 varchar(255) NOT NULL DEFAULT '',
  param8 varchar(255) NOT NULL DEFAULT '',
  param9 varchar(255) NOT NULL DEFAULT '',
  trstat varchar(255) NOT NULL DEFAULT '',
  is_callback char(1) NOT NULL DEFAULT '',
  UNIQUE KEY refk (ref)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_ccprocessors (
  module_name varchar(255) NOT NULL DEFAULT '',
  `type` char(1) NOT NULL DEFAULT '',
  processor varchar(255) NOT NULL DEFAULT '',
  template varchar(255) NOT NULL DEFAULT '',
  param01 varchar(255) NOT NULL DEFAULT '',
  param02 varchar(255) NOT NULL DEFAULT '',
  param03 varchar(255) NOT NULL DEFAULT '',
  param04 varchar(255) NOT NULL DEFAULT '',
  param05 varchar(255) NOT NULL DEFAULT '',
  param06 varchar(255) NOT NULL DEFAULT '',
  param07 varchar(255) NOT NULL DEFAULT '',
  param08 varchar(255) NOT NULL DEFAULT '',
  param09 varchar(255) NOT NULL DEFAULT '',
  disable_ccinfo char(1) NOT NULL DEFAULT 'N',
  background char(1) NOT NULL DEFAULT 'N',
  testmode char(1) NOT NULL DEFAULT 'N',
  is_check char(1) NOT NULL DEFAULT '',
  is_refund char(1) NOT NULL DEFAULT '',
  c_template varchar(255) NOT NULL DEFAULT '',
  paymentid int(11) NOT NULL DEFAULT '0',
  cmpi char(1) NOT NULL DEFAULT '',
  use_preauth char(1) NOT NULL DEFAULT '',
  preauth_expire int(11) NOT NULL DEFAULT '0',
  has_preauth char(1) NOT NULL DEFAULT '',
  capture_min_limit varchar(32) NOT NULL DEFAULT '0%',
  capture_max_limit varchar(32) NOT NULL DEFAULT '0%',
  PRIMARY KEY (module_name),
  UNIQUE KEY pphm (paymentid,preauth_expire,has_preauth,module_name),
  KEY paymentid (paymentid),
  KEY processor (processor),
  KEY pph (paymentid,preauth_expire,has_preauth)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_change_password (
  userid int(11) NOT NULL DEFAULT '0',
  password_reset_key varchar(32) NOT NULL DEFAULT '',
  password_reset_key_date int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (userid),
  UNIQUE KEY password_reset_key (password_reset_key)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_class_lng (
  `code` char(2) NOT NULL DEFAULT 'en',
  classid int(11) NOT NULL DEFAULT '0',
  class varchar(128) NOT NULL DEFAULT '',
  classtext varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (classid,`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_class_options (
  optionid int(11) NOT NULL AUTO_INCREMENT,
  classid int(11) NOT NULL DEFAULT '0',
  option_name varchar(255) NOT NULL DEFAULT '',
  orderby int(11) NOT NULL DEFAULT '0',
  avail char(1) NOT NULL DEFAULT 'Y',
  price_modifier decimal(12,2) NOT NULL DEFAULT '0.00',
  modifier_type char(1) NOT NULL DEFAULT '$',
  PRIMARY KEY (optionid),
  KEY orderby (orderby,avail),
  KEY ia (classid,avail)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_classes (
  classid int(11) NOT NULL AUTO_INCREMENT,
  productid int(11) NOT NULL DEFAULT '0',
  class varchar(128) NOT NULL DEFAULT '',
  classtext varchar(255) NOT NULL DEFAULT '',
  orderby int(11) NOT NULL DEFAULT '0',
  avail char(1) NOT NULL DEFAULT 'Y',
  is_modifier char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (classid),
  KEY orderby (orderby,avail),
  KEY productid (productid),
  KEY is_modifier (is_modifier),
  KEY class (class)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_clean_urls (
  clean_url varchar(250) NOT NULL DEFAULT '',
  resource_type char(1) NOT NULL DEFAULT '',
  resource_id int(11) NOT NULL DEFAULT '0',
  mtime int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (clean_url),
  KEY rr (resource_type,resource_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_clean_urls_history (
  id int(11) NOT NULL AUTO_INCREMENT,
  resource_type char(1) NOT NULL DEFAULT '',
  resource_id int(11) NOT NULL DEFAULT '0',
  clean_url varchar(250) NOT NULL DEFAULT '',
  mtime int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  UNIQUE KEY rrc (resource_type,resource_id,clean_url)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_condition_memberships (
  conditionid int(11) NOT NULL DEFAULT '0',
  membershipid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (conditionid,membershipid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_config (
  `name` varchar(32) NOT NULL DEFAULT '',
  `comment` varchar(255) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  category varchar(32) NOT NULL DEFAULT '',
  orderby int(11) NOT NULL DEFAULT '0',
  `type` enum('numeric','text','textarea','checkbox','password','separator','selector','multiselector','state','country','trimmed_text') DEFAULT 'text',
  defvalue text NOT NULL,
  variants text NOT NULL,
  validation varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`name`),
  KEY orderby (orderby),
  KEY category (category)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_contact_fields (
  fieldid int(11) NOT NULL AUTO_INCREMENT,
  field varchar(255) NOT NULL DEFAULT '',
  `type` char(1) NOT NULL DEFAULT 'T',
  variants text NOT NULL,
  def varchar(255) NOT NULL DEFAULT '',
  orderby int(11) NOT NULL DEFAULT '0',
  avail varchar(4) NOT NULL DEFAULT '',
  required varchar(4) NOT NULL DEFAULT '',
  PRIMARY KEY (fieldid),
  KEY avail (avail),
  KEY required (required)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_counties (
  countyid int(11) NOT NULL AUTO_INCREMENT,
  stateid int(11) NOT NULL DEFAULT '0',
  county varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (countyid),
  UNIQUE KEY countyname (stateid,county),
  KEY countyid (stateid,countyid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_countries (
  `code` char(2) NOT NULL DEFAULT '',
  code_A3 char(3) NOT NULL DEFAULT '',
  code_N3 int(4) NOT NULL DEFAULT '0',
  region char(2) NOT NULL DEFAULT '',
  active char(1) NOT NULL DEFAULT 'Y',
  display_states char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_country_currencies (
  `code` char(3) NOT NULL DEFAULT '',
  country_code char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`code`,country_code)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_currencies (
  `code` char(3) NOT NULL DEFAULT '',
  code_int int(3) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL DEFAULT '',
  symbol varchar(16) NOT NULL DEFAULT '',
  UNIQUE KEY `code` (`code`),
  KEY code_int (code_int)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_customer_bonuses (
  userid int(11) NOT NULL DEFAULT '0',
  points int(11) NOT NULL DEFAULT '0',
  memberships text NOT NULL,
  PRIMARY KEY (userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_customers (
  id int(11) NOT NULL AUTO_INCREMENT,
  login varchar(128) NOT NULL DEFAULT '',
  username varchar(128) NOT NULL DEFAULT '',
  usertype char(1) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  invalid_login_attempts int(11) NOT NULL DEFAULT '0',
  title varchar(32) NOT NULL DEFAULT '',
  firstname varchar(128) NOT NULL DEFAULT '',
  lastname varchar(128) NOT NULL DEFAULT '',
  company varchar(255) NOT NULL DEFAULT '',
  email varchar(128) NOT NULL DEFAULT '',
  url varchar(128) NOT NULL DEFAULT '',
  last_login int(11) NOT NULL DEFAULT '0',
  first_login int(11) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT 'Y',
  activation_key varchar(32) NOT NULL DEFAULT '',
  autolock char(1) NOT NULL DEFAULT 'N',
  suspend_date int(11) NOT NULL DEFAULT '0',
  referer varchar(255) NOT NULL DEFAULT '',
  ssn varchar(32) NOT NULL DEFAULT '',
  `language` char(2) NOT NULL DEFAULT 'en',
  cart mediumtext NOT NULL,
  change_password char(1) NOT NULL DEFAULT 'N',
  change_password_date int(11) NOT NULL DEFAULT '0',
  parent int(11) NOT NULL DEFAULT '0',
  pending_plan_id int(11) NOT NULL DEFAULT '0',
  activity char(1) NOT NULL DEFAULT 'Y',
  membershipid int(11) NOT NULL DEFAULT '0',
  pending_membershipid int(11) NOT NULL DEFAULT '0',
  tax_number varchar(50) NOT NULL DEFAULT '',
  tax_exempt char(1) NOT NULL DEFAULT 'N',
  trusted_provider char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (id),
  KEY login (login),
  KEY usertype (usertype),
  KEY email (email),
  KEY last_login (last_login),
  KEY first_login (first_login),
  KEY `status` (`status`),
  KEY activation_key (activation_key),
  KEY membershipid (membershipid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_delayed_queries (
  id int(11) NOT NULL AUTO_INCREMENT,
  query_type varchar(255) NOT NULL DEFAULT '',
  `query` text NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY qd (query_type,`date`),
  KEY date_key (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_delivery (
  shippingid int(11) NOT NULL DEFAULT '0',
  productid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (shippingid,productid),
  KEY productid_index (productid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_discount_coupons (
  coupon char(16) NOT NULL DEFAULT '',
  discount decimal(12,2) NOT NULL DEFAULT '0.00',
  coupon_type char(12) NOT NULL DEFAULT '',
  productid int(11) NOT NULL DEFAULT '0',
  categoryid int(11) NOT NULL DEFAULT '0',
  minimum decimal(12,2) NOT NULL DEFAULT '0.00',
  times int(11) NOT NULL DEFAULT '0',
  per_user char(1) NOT NULL DEFAULT 'N',
  times_used int(11) NOT NULL DEFAULT '0',
  expire int(11) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT '',
  provider int(11) NOT NULL DEFAULT '0',
  recursive char(1) NOT NULL DEFAULT 'N',
  apply_category_once char(1) NOT NULL DEFAULT 'N',
  apply_product_once char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (coupon),
  KEY provider (provider),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_discount_coupons_login (
  coupon varchar(16) NOT NULL DEFAULT '',
  userid int(11) NOT NULL DEFAULT '0',
  times_used int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (coupon,userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_discount_memberships (
  discountid int(11) NOT NULL DEFAULT '0',
  membershipid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (discountid,membershipid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_discounts (
  discountid int(11) NOT NULL AUTO_INCREMENT,
  minprice decimal(12,2) NOT NULL DEFAULT '0.00',
  discount decimal(12,2) NOT NULL DEFAULT '0.00',
  discount_type char(32) NOT NULL DEFAULT 'absolute',
  provider int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (discountid),
  KEY provider (provider),
  KEY minprice (minprice)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_download_keys (
  download_key char(100) NOT NULL DEFAULT '',
  expires int(11) NOT NULL DEFAULT '0',
  productid int(11) NOT NULL DEFAULT '0',
  itemid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (download_key),
  UNIQUE KEY itemid (itemid),
  KEY productid (productid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_export_ranges (
  sec varchar(64) NOT NULL DEFAULT '',
  id varchar(64) NOT NULL DEFAULT '',
  userid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (sec,id,userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_extra_field_values (
  productid int(11) NOT NULL DEFAULT '0',
  fieldid int(11) NOT NULL DEFAULT '0',
  `value` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (productid,fieldid),
  KEY `value` (`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_extra_fields (
  fieldid int(11) NOT NULL AUTO_INCREMENT,
  provider int(11) NOT NULL DEFAULT '0',
  field char(255) NOT NULL DEFAULT '',
  `value` char(255) NOT NULL DEFAULT '',
  active char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  service_name char(128) NOT NULL DEFAULT '',
  PRIMARY KEY (fieldid),
  KEY provider (provider),
  KEY active (active)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_extra_fields_lng (
  fieldid int(11) NOT NULL DEFAULT '0',
  `code` char(2) NOT NULL DEFAULT 'en',
  field char(255) NOT NULL DEFAULT '',
  UNIQUE KEY fc (fieldid,`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_feature_classes (
  fclassid int(11) NOT NULL AUTO_INCREMENT,
  class varchar(128) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  provider int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (fclassid),
  UNIQUE KEY fao (fclassid,avail,orderby)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_feature_classes_lng (
  fclassid int(11) NOT NULL DEFAULT '0',
  `code` char(2) NOT NULL DEFAULT 'en',
  class varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (fclassid,`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_feature_options (
  foptionid int(11) NOT NULL AUTO_INCREMENT,
  fclassid int(11) NOT NULL DEFAULT '0',
  option_name varchar(128) NOT NULL DEFAULT '',
  option_hint varchar(128) NOT NULL DEFAULT '',
  option_type char(1) NOT NULL DEFAULT '',
  format varchar(32) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  show_in_search char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (foptionid),
  KEY cao (fclassid,avail,orderby)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_feature_options_lng (
  foptionid int(11) NOT NULL DEFAULT '0',
  `code` char(2) NOT NULL DEFAULT 'en',
  option_name varchar(128) NOT NULL DEFAULT '',
  option_hint varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (foptionid,`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_feature_variants (
  fvariantid int(11) NOT NULL AUTO_INCREMENT,
  foptionid int(11) NOT NULL DEFAULT '0',
  orderby int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (fvariantid),
  KEY vo (fvariantid,foptionid),
  KEY fo (foptionid,orderby)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_feature_variants_lng_de (
  fvariantid int(11) NOT NULL DEFAULT '0',
  variant_name varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (fvariantid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_feature_variants_lng_en (
  fvariantid int(11) NOT NULL DEFAULT '0',
  variant_name varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (fvariantid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_feature_variants_lng_fr (
  fvariantid int(11) NOT NULL DEFAULT '0',
  variant_name varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (fvariantid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_feature_variants_lng_sv (
  fvariantid int(11) NOT NULL DEFAULT '0',
  variant_name varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (fvariantid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_featured_products (
  productid int(11) NOT NULL DEFAULT '0',
  categoryid int(11) NOT NULL DEFAULT '0',
  product_order int(11) NOT NULL DEFAULT '0',
  avail char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (productid,categoryid),
  KEY product_order (product_order),
  KEY avail (avail),
  KEY pacpo (productid,avail,categoryid,product_order)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_form_ids (
  sessid char(32) NOT NULL DEFAULT '',
  formid char(32) NOT NULL DEFAULT '',
  expire int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (sessid,formid),
  KEY expire (expire),
  KEY se (sessid,expire)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_gcheckout_orders (
  orderid int(11) NOT NULL DEFAULT '0',
  goid varchar(255) NOT NULL DEFAULT '',
  total decimal(12,2) NOT NULL DEFAULT '0.00',
  refunded_amount decimal(12,2) NOT NULL DEFAULT '0.00',
  fulfillment_state varchar(255) NOT NULL DEFAULT '',
  financial_state varchar(255) NOT NULL DEFAULT '',
  state_log text NOT NULL,
  archived char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (orderid),
  KEY goid (goid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_gcheckout_restrictions (
  productid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (productid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_ge_products (
  sessid char(32) NOT NULL DEFAULT '',
  geid varchar(32) NOT NULL DEFAULT '',
  productid int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY sgp (sessid,geid,productid),
  KEY geid (geid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_giftcerts (
  gcid varchar(16) NOT NULL DEFAULT '',
  orderid int(11) NOT NULL DEFAULT '0',
  purchaser varchar(128) NOT NULL DEFAULT '',
  recipient varchar(128) NOT NULL DEFAULT '',
  send_via char(1) NOT NULL DEFAULT 'E',
  recipient_email varchar(128) NOT NULL DEFAULT '',
  recipient_firstname varchar(128) NOT NULL DEFAULT '',
  recipient_lastname varchar(128) NOT NULL DEFAULT '',
  recipient_address varchar(255) NOT NULL DEFAULT '',
  recipient_city varchar(64) NOT NULL DEFAULT '',
  recipient_state varchar(32) NOT NULL DEFAULT '',
  recipient_zipcode varchar(32) NOT NULL DEFAULT '',
  recipient_zip4 varchar(4) NOT NULL DEFAULT '',
  recipient_country char(2) NOT NULL DEFAULT '',
  recipient_phone varchar(32) NOT NULL DEFAULT '',
  message text NOT NULL,
  amount decimal(12,2) NOT NULL DEFAULT '0.00',
  debit decimal(12,2) NOT NULL DEFAULT '0.00',
  `status` char(1) NOT NULL DEFAULT 'P',
  add_date int(11) NOT NULL DEFAULT '0',
  block_date int(11) NOT NULL DEFAULT '0',
  tpl_file varchar(255) NOT NULL DEFAULT 'template_default.tpl',
  recipient_county varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (gcid),
  KEY orderid (orderid),
  KEY `status` (`status`),
  KEY add_date (add_date)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_giftreg_events (
  event_id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL DEFAULT '0',
  title varchar(255) NOT NULL DEFAULT '',
  event_date int(11) NOT NULL DEFAULT '0',
  description text NOT NULL,
  html_content text NOT NULL,
  sent_date int(11) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT 'P',
  guestbook char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (event_id),
  KEY userid (userid),
  KEY event_date (event_date)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_giftreg_guestbooks (
  message_id int(11) NOT NULL AUTO_INCREMENT,
  event_id int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  message text NOT NULL,
  post_date int(11) NOT NULL DEFAULT '0',
  moderator char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (message_id),
  KEY event_id (event_id,post_date)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_giftreg_maillist (
  regid int(11) NOT NULL AUTO_INCREMENT,
  event_id int(11) NOT NULL DEFAULT '0',
  recipient_name varchar(255) NOT NULL DEFAULT '',
  recipient_email varchar(128) NOT NULL DEFAULT '',
  `status` char(1) NOT NULL DEFAULT 'P',
  status_date int(11) NOT NULL DEFAULT '0',
  confirmation_code varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (regid),
  UNIQUE KEY event_id (event_id,recipient_email),
  UNIQUE KEY confirmation_code (confirmation_code),
  KEY recipient_name (recipient_name)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_images_B (
  imageid int(11) NOT NULL AUTO_INCREMENT,
  id int(11) NOT NULL DEFAULT '0',
  image mediumblob NOT NULL,
  image_path varchar(255) NOT NULL DEFAULT '',
  image_type varchar(64) NOT NULL DEFAULT 'image/jpeg',
  image_x int(11) NOT NULL DEFAULT '0',
  image_y int(11) NOT NULL DEFAULT '0',
  image_size int(11) NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  alt varchar(255) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  md5 char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (imageid),
  UNIQUE KEY id (id),
  KEY image_path (image_path)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_images_C (
  imageid int(11) NOT NULL AUTO_INCREMENT,
  id int(11) NOT NULL DEFAULT '0',
  image mediumblob NOT NULL,
  image_path varchar(255) NOT NULL DEFAULT '',
  image_type varchar(64) NOT NULL DEFAULT 'image/jpeg',
  image_x int(11) NOT NULL DEFAULT '0',
  image_y int(11) NOT NULL DEFAULT '0',
  image_size int(11) NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  alt varchar(255) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  md5 char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (imageid),
  UNIQUE KEY id (id),
  KEY image_path (image_path)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_images_D (
  imageid int(11) NOT NULL AUTO_INCREMENT,
  id int(11) NOT NULL DEFAULT '0',
  image mediumblob NOT NULL,
  image_path varchar(255) NOT NULL DEFAULT '',
  image_type varchar(64) NOT NULL DEFAULT 'image/jpeg',
  image_x int(11) NOT NULL DEFAULT '0',
  image_y int(11) NOT NULL DEFAULT '0',
  image_size int(11) NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  alt varchar(255) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  md5 char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (imageid),
  KEY image_path (image_path),
  KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_images_F (
  imageid int(11) NOT NULL AUTO_INCREMENT,
  id int(11) NOT NULL DEFAULT '0',
  image mediumblob NOT NULL,
  image_path varchar(255) NOT NULL DEFAULT '',
  image_type varchar(64) NOT NULL DEFAULT 'image/jpeg',
  image_x int(11) NOT NULL DEFAULT '0',
  image_y int(11) NOT NULL DEFAULT '0',
  image_size int(11) NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  alt varchar(255) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  md5 char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (imageid),
  UNIQUE KEY id (id),
  KEY image_path (image_path)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_images_G (
  imageid int(11) NOT NULL AUTO_INCREMENT,
  id int(11) NOT NULL DEFAULT '0',
  image mediumblob NOT NULL,
  image_path varchar(255) NOT NULL DEFAULT '',
  image_type varchar(64) NOT NULL DEFAULT 'image/jpeg',
  image_x int(11) NOT NULL DEFAULT '0',
  image_y int(11) NOT NULL DEFAULT '0',
  image_size int(11) NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  alt varchar(255) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  md5 char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (imageid),
  UNIQUE KEY id (id),
  KEY image_path (image_path)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_images_L (
  imageid int(11) NOT NULL AUTO_INCREMENT,
  id int(11) NOT NULL DEFAULT '0',
  image mediumblob NOT NULL,
  image_path varchar(255) NOT NULL DEFAULT '',
  image_type varchar(64) NOT NULL DEFAULT 'image/jpeg',
  image_x int(11) NOT NULL DEFAULT '0',
  image_y int(11) NOT NULL DEFAULT '0',
  image_size int(11) NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  alt varchar(255) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  md5 char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (imageid),
  UNIQUE KEY id (id),
  KEY image_path (image_path)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_images_M (
  imageid int(11) NOT NULL AUTO_INCREMENT,
  id int(11) NOT NULL DEFAULT '0',
  image mediumblob NOT NULL,
  image_path varchar(255) NOT NULL DEFAULT '',
  image_type varchar(64) NOT NULL DEFAULT 'image/jpeg',
  image_x int(11) NOT NULL DEFAULT '0',
  image_y int(11) NOT NULL DEFAULT '0',
  image_size int(11) NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  alt varchar(255) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  md5 char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (imageid),
  UNIQUE KEY id (id),
  KEY image_path (image_path)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_images_P (
  imageid int(11) NOT NULL AUTO_INCREMENT,
  id int(11) NOT NULL DEFAULT '0',
  image mediumblob NOT NULL,
  image_path varchar(255) NOT NULL DEFAULT '',
  image_type varchar(64) NOT NULL DEFAULT 'image/jpeg',
  image_x int(11) NOT NULL DEFAULT '0',
  image_y int(11) NOT NULL DEFAULT '0',
  image_size int(11) NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  alt varchar(255) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  md5 char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (imageid),
  UNIQUE KEY id (id),
  KEY image_path (image_path)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_images_S (
  imageid int(11) NOT NULL AUTO_INCREMENT,
  id varchar(16) NOT NULL DEFAULT '',
  image mediumblob NOT NULL,
  image_path varchar(255) NOT NULL DEFAULT '',
  image_type varchar(64) NOT NULL DEFAULT 'image/jpeg',
  image_x int(11) NOT NULL DEFAULT '0',
  image_y int(11) NOT NULL DEFAULT '0',
  image_size int(11) NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  alt varchar(255) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  md5 char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (imageid),
  UNIQUE KEY id (id),
  KEY image_path (image_path)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_images_T (
  imageid int(11) NOT NULL AUTO_INCREMENT,
  id int(11) NOT NULL DEFAULT '0',
  image mediumblob NOT NULL,
  image_path varchar(255) NOT NULL DEFAULT '',
  image_type varchar(64) NOT NULL DEFAULT 'image/jpeg',
  image_x int(11) NOT NULL DEFAULT '0',
  image_y int(11) NOT NULL DEFAULT '0',
  image_size int(11) NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  alt varchar(255) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  md5 char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (imageid),
  UNIQUE KEY id (id),
  KEY image_path (image_path)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_images_W (
  imageid int(11) NOT NULL AUTO_INCREMENT,
  id int(11) NOT NULL DEFAULT '0',
  image mediumblob NOT NULL,
  image_path varchar(255) NOT NULL DEFAULT '',
  image_type varchar(64) NOT NULL DEFAULT 'image/jpeg',
  image_x int(11) NOT NULL DEFAULT '0',
  image_y int(11) NOT NULL DEFAULT '0',
  image_size int(11) NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  alt varchar(255) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  md5 char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (imageid),
  UNIQUE KEY id (id),
  KEY image_path (image_path)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_images_Z (
  imageid int(11) NOT NULL AUTO_INCREMENT,
  id int(11) NOT NULL DEFAULT '0',
  image mediumblob NOT NULL,
  image_path varchar(255) NOT NULL DEFAULT '',
  image_type varchar(64) NOT NULL DEFAULT 'image/jpeg',
  image_x int(11) NOT NULL DEFAULT '0',
  image_y int(11) NOT NULL DEFAULT '0',
  image_size int(11) NOT NULL DEFAULT '0',
  filename varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  alt varchar(255) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  md5 char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (imageid),
  KEY image_path (image_path),
  KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_import_cache (
  data_type varbinary(3) NOT NULL DEFAULT '',
  id varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '',
  userid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (data_type,id,userid),
  KEY du (data_type,userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_iterations (
  sessid char(32) NOT NULL DEFAULT '',
  `code` varchar(8) NOT NULL DEFAULT '',
  id varchar(32) NOT NULL DEFAULT '',
  `data` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (sessid,`code`,id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_language_codes (
  `code` char(2) NOT NULL DEFAULT '',
  code3 char(3) NOT NULL DEFAULT '',
  `language` varchar(128) NOT NULL DEFAULT '',
  country_code char(2) NOT NULL DEFAULT '',
  lngid int(11) NOT NULL AUTO_INCREMENT,
  `charset` varchar(32) NOT NULL DEFAULT 'iso-8859-1',
  r2l char(1) NOT NULL DEFAULT '',
  disabled char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (lngid),
  UNIQUE KEY code3 (code3),
  UNIQUE KEY code2 (`code`),
  KEY country_code (country_code)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_languages (
  `code` char(2) NOT NULL DEFAULT '',
  `name` varchar(128) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  topic varchar(24) NOT NULL DEFAULT '',
  PRIMARY KEY (`code`,`name`),
  KEY `code` (`code`),
  KEY topic (topic)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_languages_alt (
  `code` char(2) NOT NULL DEFAULT '',
  `name` varchar(128) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`code`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_login_history (
  userid int(11) NOT NULL DEFAULT '0',
  date_time int(11) NOT NULL DEFAULT '0',
  usertype char(1) NOT NULL DEFAULT '',
  `action` varchar(32) NOT NULL DEFAULT '',
  `status` varchar(32) NOT NULL DEFAULT '',
  ip int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (userid,date_time)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_manufacturers (
  manufacturerid int(11) NOT NULL AUTO_INCREMENT,
  manufacturer varchar(255) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT '',
  descr text NOT NULL,
  orderby int(11) NOT NULL DEFAULT '0',
  provider int(11) NOT NULL DEFAULT '0',
  avail char(1) NOT NULL DEFAULT 'Y',
  meta_description text NOT NULL,
  meta_keywords text NOT NULL,
  title_tag text NOT NULL,
  PRIMARY KEY (manufacturerid),
  KEY manufacturer (manufacturer),
  KEY orderby (orderby),
  KEY provider (provider),
  KEY avail (avail)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_manufacturers_lng (
  manufacturerid int(11) NOT NULL DEFAULT '0',
  `code` char(2) NOT NULL DEFAULT 'en',
  manufacturer varchar(255) NOT NULL DEFAULT '',
  descr text NOT NULL,
  UNIQUE KEY mc (manufacturerid,`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_memberships (
  membershipid int(11) NOT NULL AUTO_INCREMENT,
  area char(1) NOT NULL DEFAULT 'C',
  membership varchar(255) NOT NULL DEFAULT '',
  active char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  flag char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (membershipid),
  KEY area (area),
  KEY orderby (orderby),
  KEY active (active)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_memberships_lng (
  membershipid int(11) NOT NULL DEFAULT '0',
  `code` char(2) NOT NULL DEFAULT 'en',
  membership varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY mc (membershipid,`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_modules (
  moduleid int(11) NOT NULL AUTO_INCREMENT,
  module_name varchar(255) NOT NULL DEFAULT '',
  module_descr varchar(255) NOT NULL DEFAULT '',
  active char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (moduleid),
  KEY module_name (module_name),
  KEY active (active)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_newsletter (
  newsid int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(128) NOT NULL DEFAULT '',
  body text NOT NULL,
  send_date int(11) NOT NULL DEFAULT '0',
  email1 varchar(128) NOT NULL DEFAULT '',
  email2 varchar(128) NOT NULL DEFAULT '',
  email3 varchar(128) NOT NULL DEFAULT '',
  `status` char(1) NOT NULL DEFAULT 'N',
  listid int(11) NOT NULL DEFAULT '0',
  show_as_news char(1) NOT NULL DEFAULT 'N',
  allow_html char(1) NOT NULL DEFAULT 'N',
  `date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (newsid),
  UNIQUE KEY lsd (listid,show_as_news,`date`),
  KEY `status` (`status`),
  KEY send_date (send_date)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_newslist_subscription (
  listid int(11) NOT NULL DEFAULT '0',
  email char(128) NOT NULL DEFAULT '',
  to_be_sent char(1) NOT NULL DEFAULT '',
  since_date int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (listid,email),
  KEY to_be_sent (to_be_sent)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_newslists (
  listid int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  descr text NOT NULL,
  show_as_news char(1) NOT NULL DEFAULT 'N',
  avail char(1) NOT NULL DEFAULT 'N',
  subscribe char(1) NOT NULL DEFAULT 'N',
  lngcode char(2) NOT NULL DEFAULT 'en',
  PRIMARY KEY (listid),
  UNIQUE KEY asll (avail,show_as_news,lngcode,listid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_offer_bonus_params (
  paramid int(11) NOT NULL AUTO_INCREMENT,
  bonusid int(11) NOT NULL DEFAULT '0',
  setid int(11) NOT NULL DEFAULT '0',
  param_type char(1) NOT NULL DEFAULT '',
  param_id int(11) NOT NULL DEFAULT '0',
  param_arg char(1) NOT NULL DEFAULT '',
  param_qnty int(11) NOT NULL DEFAULT '0',
  param_promo char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (paramid),
  KEY bonus_id_type (bonusid,param_type,param_id,param_arg),
  KEY bonusid (bonusid),
  KEY setid (setid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_offer_bonuses (
  bonusid int(11) NOT NULL AUTO_INCREMENT,
  offerid int(11) NOT NULL DEFAULT '0',
  bonus_type char(1) NOT NULL DEFAULT '',
  amount_type char(1) NOT NULL DEFAULT '',
  amount_min decimal(12,2) NOT NULL DEFAULT '0.00',
  amount_max decimal(12,2) NOT NULL DEFAULT '0.00',
  bonus_data text,
  provider int(11) NOT NULL DEFAULT '0',
  avail char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (bonusid),
  UNIQUE KEY b_type (offerid,bonus_type),
  KEY b_sprice (bonusid,avail,bonus_type,amount_type,amount_min,amount_max)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_offer_condition_params (
  paramid int(11) NOT NULL AUTO_INCREMENT,
  conditionid int(11) NOT NULL DEFAULT '0',
  setid int(11) NOT NULL DEFAULT '0',
  param_type char(1) NOT NULL DEFAULT '',
  param_id int(11) NOT NULL DEFAULT '0',
  param_arg char(1) NOT NULL DEFAULT '',
  param_qnty int(11) NOT NULL DEFAULT '0',
  param_promo char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (paramid),
  KEY args1 (param_type,param_id,param_arg),
  KEY conditionid (conditionid),
  KEY setid (setid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_offer_conditions (
  conditionid int(11) NOT NULL AUTO_INCREMENT,
  offerid int(11) NOT NULL DEFAULT '0',
  condition_type char(1) NOT NULL DEFAULT '',
  amount_type char(1) NOT NULL DEFAULT '',
  amount_min decimal(12,2) NOT NULL DEFAULT '0.00',
  amount_max decimal(12,2) NOT NULL DEFAULT '0.00',
  condition_data text,
  provider int(11) NOT NULL DEFAULT '0',
  avail char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (conditionid),
  UNIQUE KEY c_type (offerid,condition_type)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_offer_product_params (
  productid int(11) NOT NULL DEFAULT '0',
  sp_discount_avail char(1) NOT NULL DEFAULT 'N',
  bonus_points int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (productid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_offer_product_sets (
  setid int(11) NOT NULL AUTO_INCREMENT,
  offerid int(11) NOT NULL DEFAULT '0',
  set_type char(1) NOT NULL DEFAULT '',
  cb_id int(11) NOT NULL DEFAULT '0',
  cb_type char(1) NOT NULL DEFAULT '0',
  `name` varchar(32) NOT NULL DEFAULT '',
  avail char(1) NOT NULL DEFAULT 'Y',
  appl_type char(1) NOT NULL DEFAULT 'I',
  PRIMARY KEY (setid),
  UNIQUE KEY set_item_id (setid,cb_id),
  KEY set_incl_type (cb_id,set_type,appl_type)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_offers (
  offerid int(11) NOT NULL AUTO_INCREMENT,
  offer_name varchar(255) NOT NULL DEFAULT '',
  offer_start int(11) NOT NULL DEFAULT '0',
  offer_end int(11) NOT NULL DEFAULT '0',
  offer_avail char(1) NOT NULL DEFAULT 'N',
  provider int(11) NOT NULL DEFAULT '0',
  modified_time int(11) NOT NULL DEFAULT '0',
  show_short_promo char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (offerid),
  KEY offer_avail (offer_avail,offer_start,offer_end,provider)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_offers_lng (
  offerid int(11) NOT NULL DEFAULT '0',
  `code` char(2) NOT NULL DEFAULT '',
  promo_short text,
  promo_long text,
  promo_checkout text,
  promo_items_amount text,
  PRIMARY KEY (offerid,`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_old_passwords (
  id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL DEFAULT '0',
  `password` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (id),
  UNIQUE KEY lp (userid,`password`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_order_details (
  orderid int(11) NOT NULL DEFAULT '0',
  productid int(11) NOT NULL DEFAULT '0',
  price decimal(12,2) NOT NULL DEFAULT '0.00',
  amount int(11) NOT NULL DEFAULT '0',
  provider int(11) NOT NULL DEFAULT '0',
  product_options text NOT NULL,
  extra_data text NOT NULL,
  itemid int(11) NOT NULL AUTO_INCREMENT,
  productcode varchar(32) NOT NULL DEFAULT '',
  product varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (itemid),
  KEY orderid (orderid),
  KEY productid (productid),
  KEY provider (provider),
  KEY productcode (productcode)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_order_extras (
  orderid int(11) NOT NULL DEFAULT '0',
  khash varchar(64) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (orderid,khash),
  UNIQUE KEY kvo (khash,`value`(32),orderid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_order_status_history (
  recid int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL DEFAULT '0',
  orderid int(11) NOT NULL DEFAULT '0',
  date_time int(11) NOT NULL DEFAULT '0',
  details text NOT NULL,
  PRIMARY KEY (recid),
  KEY orderid (orderid,date_time)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_orders (
  orderid int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL DEFAULT '0',
  membership varchar(255) NOT NULL DEFAULT '',
  total decimal(12,2) NOT NULL DEFAULT '0.00',
  giftcert_discount decimal(12,2) NOT NULL DEFAULT '0.00',
  giftcert_ids text NOT NULL,
  subtotal decimal(12,2) NOT NULL DEFAULT '0.00',
  discount decimal(12,2) NOT NULL DEFAULT '0.00',
  coupon varchar(32) NOT NULL DEFAULT '',
  coupon_discount decimal(12,2) NOT NULL DEFAULT '0.00',
  shippingid int(11) NOT NULL DEFAULT '0',
  shipping varchar(255) NOT NULL DEFAULT '',
  tracking varchar(64) NOT NULL DEFAULT '',
  shipping_cost decimal(12,2) NOT NULL DEFAULT '0.00',
  tax decimal(12,2) NOT NULL DEFAULT '0.00',
  taxes_applied text NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT 'Q',
  payment_method varchar(128) NOT NULL DEFAULT '',
  flag char(1) NOT NULL DEFAULT 'N',
  notes text NOT NULL,
  details text NOT NULL,
  customer_notes text NOT NULL,
  customer varchar(32) NOT NULL DEFAULT '',
  title varchar(32) NOT NULL DEFAULT '',
  firstname varchar(128) NOT NULL DEFAULT '',
  lastname varchar(128) NOT NULL DEFAULT '',
  company varchar(255) NOT NULL DEFAULT '',
  b_title varchar(32) NOT NULL DEFAULT '',
  b_firstname varchar(128) NOT NULL DEFAULT '',
  b_lastname varchar(128) NOT NULL DEFAULT '',
  b_address varchar(255) NOT NULL DEFAULT '',
  b_city varchar(64) NOT NULL DEFAULT '',
  b_county varchar(32) NOT NULL DEFAULT '',
  b_state varchar(32) NOT NULL DEFAULT '',
  b_country char(2) NOT NULL DEFAULT '',
  b_zipcode varchar(32) NOT NULL DEFAULT '',
  b_zip4 varchar(4) NOT NULL DEFAULT '',
  b_phone varchar(32) NOT NULL DEFAULT '',
  b_fax varchar(32) NOT NULL DEFAULT '',
  s_title varchar(32) NOT NULL DEFAULT '',
  s_firstname varchar(128) NOT NULL DEFAULT '',
  s_lastname varchar(128) NOT NULL DEFAULT '',
  s_address varchar(255) NOT NULL DEFAULT '',
  s_city varchar(255) NOT NULL DEFAULT '',
  s_county varchar(32) NOT NULL DEFAULT '',
  s_state varchar(32) NOT NULL DEFAULT '',
  s_country char(2) NOT NULL DEFAULT '',
  s_zipcode varchar(32) NOT NULL DEFAULT '',
  s_phone varchar(32) NOT NULL DEFAULT '',
  s_fax varchar(32) NOT NULL DEFAULT '',
  s_zip4 varchar(4) NOT NULL DEFAULT '',
  url varchar(128) NOT NULL DEFAULT '',
  email varchar(128) NOT NULL DEFAULT '',
  `language` char(2) NOT NULL DEFAULT 'en',
  clickid int(11) NOT NULL DEFAULT '0',
  extra mediumtext NOT NULL,
  membershipid int(11) NOT NULL DEFAULT '0',
  paymentid int(11) NOT NULL DEFAULT '0',
  payment_surcharge decimal(12,2) NOT NULL DEFAULT '0.00',
  tax_number varchar(50) NOT NULL DEFAULT '',
  tax_exempt char(1) NOT NULL DEFAULT 'N',
  init_total decimal(12,2) NOT NULL DEFAULT '0.00',
  access_key varchar(16) NOT NULL DEFAULT '',
  PRIMARY KEY (orderid),
  UNIQUE KEY odsp (orderid,`date`,`status`,paymentid),
  UNIQUE KEY ospd (orderid,`status`,paymentid,`date`),
  KEY order_date (`date`),
  KEY s_state (s_state),
  KEY b_state (b_state),
  KEY s_country (s_country),
  KEY b_country (b_country),
  KEY clickid (clickid),
  KEY userid (userid),
  KEY paymentid (paymentid),
  KEY shippingid (shippingid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_packages_cache (
  md5_args char(32) NOT NULL DEFAULT '',
  sessid char(32) NOT NULL DEFAULT '',
  packages text NOT NULL,
  PRIMARY KEY (sessid,md5_args)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_pages (
  pageid int(11) NOT NULL AUTO_INCREMENT,
  filename varchar(255) NOT NULL DEFAULT '',
  title varchar(255) NOT NULL DEFAULT '',
  `level` char(1) NOT NULL DEFAULT 'E',
  orderby int(11) NOT NULL DEFAULT '0',
  active char(1) NOT NULL DEFAULT 'Y',
  `language` char(2) NOT NULL DEFAULT '',
  show_in_menu char(1) NOT NULL DEFAULT '',
  meta_description text NOT NULL,
  meta_keywords text NOT NULL,
  title_tag text NOT NULL,
  PRIMARY KEY (pageid),
  UNIQUE KEY filename_pageid (filename,pageid),
  KEY orderby (`level`,orderby,title)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_partner_adv_campaigns (
  campaignid int(11) NOT NULL AUTO_INCREMENT,
  campaign varchar(128) NOT NULL DEFAULT '',
  per_visit decimal(12,2) NOT NULL DEFAULT '0.00',
  per_period decimal(12,2) NOT NULL DEFAULT '0.00',
  start_period int(11) NOT NULL DEFAULT '0',
  end_period int(11) NOT NULL DEFAULT '0',
  `type` char(1) NOT NULL DEFAULT '',
  `data` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (campaignid),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_partner_adv_clicks (
  campaignid int(11) NOT NULL DEFAULT '0',
  add_date int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (campaignid,add_date)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_partner_adv_orders (
  campaignid int(11) NOT NULL DEFAULT '0',
  orderid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (campaignid,orderid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_partner_banners (
  bannerid int(11) NOT NULL AUTO_INCREMENT,
  banner varchar(128) NOT NULL DEFAULT '',
  body mediumblob NOT NULL,
  avail char(1) NOT NULL DEFAULT 'Y',
  is_image char(1) NOT NULL DEFAULT 'Y',
  is_name char(1) NOT NULL DEFAULT 'Y',
  is_descr char(1) NOT NULL DEFAULT 'Y',
  is_add char(1) NOT NULL DEFAULT 'Y',
  banner_type char(1) NOT NULL DEFAULT 'T',
  open_blank char(1) NOT NULL DEFAULT 'Y',
  legend text NOT NULL,
  alt text NOT NULL,
  direction char(1) NOT NULL DEFAULT 'D',
  banner_x int(11) NOT NULL DEFAULT '0',
  banner_y int(11) NOT NULL DEFAULT '0',
  userid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (bannerid),
  KEY userid (userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_partner_clicks (
  userid int(11) NOT NULL DEFAULT '0',
  add_date int(11) NOT NULL DEFAULT '0',
  bannerid int(11) NOT NULL DEFAULT '0',
  target char(1) NOT NULL DEFAULT '',
  targetid int(11) NOT NULL DEFAULT '0',
  referer varchar(255) NOT NULL DEFAULT '',
  clickid int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (clickid),
  KEY userid (userid),
  KEY add_date (add_date)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_partner_commissions (
  userid int(11) NOT NULL DEFAULT '0',
  plan_id int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (userid),
  KEY plan_id (plan_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_partner_payment (
  payment_id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL DEFAULT '0',
  orderid int(11) NOT NULL DEFAULT '0',
  commissions decimal(12,2) NOT NULL DEFAULT '0.00',
  paid char(1) NOT NULL DEFAULT 'N',
  add_date int(11) NOT NULL DEFAULT '0',
  affiliate int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (payment_id),
  KEY userid (userid),
  KEY orderid (orderid),
  KEY affiliate (affiliate)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_partner_plans (
  plan_id int(11) NOT NULL AUTO_INCREMENT,
  plan_title varchar(64) NOT NULL DEFAULT '',
  `status` char(1) NOT NULL DEFAULT 'A',
  min_paid decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (plan_id),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_partner_plans_commissions (
  plan_id int(11) NOT NULL DEFAULT '0',
  commission decimal(12,2) NOT NULL DEFAULT '0.00',
  commission_type enum('$','%') NOT NULL DEFAULT '%',
  item_id int(11) NOT NULL DEFAULT '0',
  item_type char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (plan_id,item_id,item_type)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_partner_product_commissions (
  itemid int(11) NOT NULL DEFAULT '0',
  orderid int(11) NOT NULL DEFAULT '0',
  product_commission decimal(12,2) NOT NULL DEFAULT '0.00',
  userid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (itemid,orderid,userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_partner_tier_commissions (
  plan_id int(11) NOT NULL DEFAULT '0',
  `level` int(2) NOT NULL DEFAULT '0',
  commission decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (plan_id,`level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_partner_views (
  userid int(11) NOT NULL DEFAULT '0',
  add_date int(11) NOT NULL DEFAULT '0',
  bannerid int(11) NOT NULL DEFAULT '0',
  target char(1) NOT NULL DEFAULT '',
  targetid int(11) NOT NULL DEFAULT '0',
  KEY userid (userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_payment_methods (
  paymentid int(11) NOT NULL AUTO_INCREMENT,
  payment_method varchar(128) NOT NULL DEFAULT '',
  payment_details varchar(255) NOT NULL DEFAULT '',
  payment_template varchar(128) NOT NULL DEFAULT '',
  payment_script varchar(128) NOT NULL DEFAULT '',
  protocol varchar(6) NOT NULL DEFAULT 'http',
  orderby int(11) NOT NULL DEFAULT '0',
  active char(1) NOT NULL DEFAULT 'Y',
  is_cod char(1) NOT NULL DEFAULT '',
  af_check char(1) NOT NULL DEFAULT 'Y',
  processor_file varchar(255) NOT NULL DEFAULT '',
  surcharge decimal(12,2) NOT NULL DEFAULT '0.00',
  surcharge_type char(1) NOT NULL DEFAULT '$',
  PRIMARY KEY (paymentid),
  KEY orderby (orderby),
  KEY processor_file (processor_file),
  KEY protocol (protocol)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_pconf_class_requirements (
  classid int(11) NOT NULL DEFAULT '0',
  ptypeid int(11) NOT NULL DEFAULT '0',
  specid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (classid,ptypeid,specid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_pconf_class_specifications (
  classid int(11) NOT NULL DEFAULT '0',
  specid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (classid,specid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_pconf_product_types (
  ptypeid int(11) NOT NULL AUTO_INCREMENT,
  provider int(11) NOT NULL DEFAULT '0',
  ptype_name varchar(255) NOT NULL DEFAULT '',
  orderby int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (ptypeid),
  UNIQUE KEY provider (provider,ptype_name)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_pconf_products_classes (
  classid int(11) NOT NULL AUTO_INCREMENT,
  productid int(11) NOT NULL DEFAULT '0',
  ptypeid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (classid),
  UNIQUE KEY product_type (productid,ptypeid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_pconf_slot_markups (
  markupid int(11) NOT NULL AUTO_INCREMENT,
  slotid int(11) NOT NULL DEFAULT '0',
  markup decimal(12,2) NOT NULL DEFAULT '0.00',
  markup_type char(1) NOT NULL DEFAULT '%',
  membershipid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (markupid),
  UNIQUE KEY slotid (slotid,membershipid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_pconf_slot_rules (
  slotid int(11) NOT NULL DEFAULT '0',
  ptypeid int(11) NOT NULL DEFAULT '0',
  index_by_and int(11) NOT NULL DEFAULT '0',
  KEY slotid (slotid),
  KEY ptypeid (ptypeid),
  KEY index_by_and (index_by_and)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_pconf_slots (
  slotid int(11) NOT NULL AUTO_INCREMENT,
  stepid int(11) NOT NULL DEFAULT '0',
  slot_name varchar(255) NOT NULL DEFAULT '',
  slot_descr text NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'O',
  multiple char(1) NOT NULL DEFAULT '',
  amount_min int(11) NOT NULL DEFAULT '1',
  amount_max int(11) NOT NULL DEFAULT '1',
  default_amount int(11) NOT NULL DEFAULT '1',
  default_productid int(11) NOT NULL DEFAULT '0',
  orderby int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (slotid),
  KEY product (stepid,orderby,slotid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_pconf_specifications (
  specid int(11) NOT NULL AUTO_INCREMENT,
  ptypeid int(11) NOT NULL DEFAULT '0',
  spec_name varchar(255) NOT NULL DEFAULT '',
  orderby int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (specid),
  UNIQUE KEY `name` (ptypeid,spec_name)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_pconf_wizards (
  stepid int(11) NOT NULL AUTO_INCREMENT,
  productid int(11) NOT NULL DEFAULT '0',
  step_name varchar(255) NOT NULL DEFAULT '',
  step_descr text NOT NULL,
  orderby int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (stepid),
  KEY product (productid,orderby,stepid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_pmethod_memberships (
  paymentid int(11) NOT NULL DEFAULT '0',
  membershipid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (paymentid,membershipid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_pricing (
  priceid int(11) NOT NULL AUTO_INCREMENT,
  productid int(11) NOT NULL DEFAULT '0',
  quantity int(11) NOT NULL DEFAULT '0',
  price decimal(12,2) NOT NULL DEFAULT '0.00',
  variantid int(11) NOT NULL DEFAULT '0',
  membershipid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (priceid),
  KEY productid (productid),
  KEY variantid (variantid),
  KEY pvq (productid,variantid,quantity),
  KEY pvqm (productid,variantid,quantity,membershipid),
  KEY pv (productid,variantid),
  KEY vq (variantid,quantity),
  KEY vqm (variantid,quantity,membershipid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_product_bookmarks (
  productid int(11) NOT NULL DEFAULT '0',
  add_date int(11) NOT NULL DEFAULT '0',
  userid int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY productid (productid,userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_product_features (
  productid int(11) NOT NULL DEFAULT '0',
  fclassid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (productid,fclassid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_product_foptions (
  foptionid int(11) NOT NULL DEFAULT '0',
  productid int(11) NOT NULL DEFAULT '0',
  `value` text NOT NULL,
  PRIMARY KEY (foptionid,productid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_product_links (
  productid1 int(11) NOT NULL DEFAULT '0',
  productid2 int(11) NOT NULL DEFAULT '0',
  orderby int(11) NOT NULL DEFAULT '0',
  KEY productid2 (productid2),
  KEY productid1 (productid1),
  KEY orderby (orderby)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_product_memberships (
  productid int(11) NOT NULL DEFAULT '0',
  membershipid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (productid,membershipid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_product_options_ex (
  optionid int(11) NOT NULL DEFAULT '0',
  exceptionid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (optionid,exceptionid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_product_options_js (
  productid int(11) NOT NULL DEFAULT '0',
  javascript_code text,
  PRIMARY KEY (productid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_product_options_lng (
  `code` char(2) NOT NULL DEFAULT 'en',
  optionid int(11) NOT NULL DEFAULT '0',
  option_name varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`code`,optionid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_product_reviews (
  review_id int(11) NOT NULL AUTO_INCREMENT,
  remote_ip varchar(15) NOT NULL DEFAULT '',
  email varchar(128) NOT NULL DEFAULT '',
  message text NOT NULL,
  productid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (review_id),
  KEY productid (productid),
  KEY remote_ip (remote_ip)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_product_rnd_keys (
  productid int(11) NOT NULL DEFAULT '0',
  rnd_key int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (productid,rnd_key)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_product_taxes (
  productid int(11) NOT NULL DEFAULT '0',
  taxid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (productid,taxid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_product_votes (
  vote_id int(11) NOT NULL AUTO_INCREMENT,
  remote_ip varchar(15) NOT NULL DEFAULT '',
  vote_value int(1) NOT NULL DEFAULT '0',
  productid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (vote_id),
  KEY remote_ip (remote_ip),
  KEY productid (productid),
  KEY rp (remote_ip,productid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_products (
  productid int(11) NOT NULL AUTO_INCREMENT,
  productcode varchar(32) NOT NULL DEFAULT '',
  provider int(11) NOT NULL DEFAULT '0',
  distribution varchar(255) NOT NULL DEFAULT '',
  weight decimal(12,2) NOT NULL DEFAULT '0.00',
  list_price decimal(12,2) NOT NULL DEFAULT '0.00',
  avail int(11) NOT NULL DEFAULT '0',
  rating int(11) NOT NULL DEFAULT '0',
  forsale char(1) NOT NULL DEFAULT 'Y',
  add_date int(11) NOT NULL DEFAULT '0',
  views_stats int(11) NOT NULL DEFAULT '0',
  sales_stats int(11) NOT NULL DEFAULT '0',
  del_stats int(11) NOT NULL DEFAULT '0',
  shipping_freight decimal(12,2) NOT NULL DEFAULT '0.00',
  free_shipping char(1) NOT NULL DEFAULT 'N',
  discount_avail char(1) NOT NULL DEFAULT 'Y',
  min_amount int(11) NOT NULL DEFAULT '1',
  length decimal(12,2) NOT NULL DEFAULT '0.00',
  width decimal(12,2) NOT NULL DEFAULT '0.00',
  height decimal(12,2) NOT NULL DEFAULT '0.00',
  low_avail_limit int(11) NOT NULL DEFAULT '10',
  free_tax char(1) NOT NULL DEFAULT 'N',
  product_type char(1) NOT NULL DEFAULT 'N',
  manufacturerid int(11) NOT NULL DEFAULT '0',
  return_time int(11) NOT NULL DEFAULT '0',
  meta_description text NOT NULL,
  meta_keywords text NOT NULL,
  small_item char(1) NOT NULL DEFAULT 'N',
  separate_box char(1) NOT NULL DEFAULT 'N',
  items_per_box int(11) NOT NULL DEFAULT '1',
  title_tag text NOT NULL,
  taxcloud_tic varchar(50) NOT NULL DEFAULT '00000',
  PRIMARY KEY (productid),
  UNIQUE KEY productcode (productcode,provider),
  KEY rating (rating),
  KEY add_date (add_date),
  KEY provider (provider),
  KEY avail (avail),
  KEY best_sellers (sales_stats,views_stats),
  KEY categories (forsale),
  KEY fi (forsale,productid),
  KEY fia (forsale,productid,avail),
  KEY ppp (productcode,provider,productid),
  KEY manufacturerid (manufacturerid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_products_categories (
  categoryid int(11) NOT NULL DEFAULT '0',
  productid int(11) NOT NULL DEFAULT '0',
  main char(1) NOT NULL DEFAULT 'N',
  orderby int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (categoryid,productid),
  UNIQUE KEY cpm (categoryid,productid,main),
  KEY productid (productid),
  KEY main (main),
  KEY orderby (categoryid,orderby),
  KEY pm (productid,main)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_products_lng_de (
  productid int(11) NOT NULL DEFAULT '0',
  product varchar(255) NOT NULL DEFAULT '',
  descr text NOT NULL,
  fulldescr text NOT NULL,
  keywords varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (productid),
  UNIQUE KEY pp (product,productid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_products_lng_en (
  productid int(11) NOT NULL DEFAULT '0',
  product varchar(255) NOT NULL DEFAULT '',
  descr text NOT NULL,
  fulldescr text NOT NULL,
  keywords varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (productid),
  UNIQUE KEY pp (product,productid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_products_lng_fr (
  productid int(11) NOT NULL DEFAULT '0',
  product varchar(255) NOT NULL DEFAULT '',
  descr text NOT NULL,
  fulldescr text NOT NULL,
  keywords varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (productid),
  UNIQUE KEY pp (product,productid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_products_lng_sv (
  productid int(11) NOT NULL DEFAULT '0',
  product varchar(255) NOT NULL DEFAULT '',
  descr text NOT NULL,
  fulldescr text NOT NULL,
  keywords varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (productid),
  UNIQUE KEY pp (product,productid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_provider_commissions (
  orderid int(11) NOT NULL DEFAULT '0',
  userid int(11) NOT NULL DEFAULT '0',
  commission_date int(11) NOT NULL DEFAULT '0',
  paid char(1) NOT NULL DEFAULT '',
  note tinytext NOT NULL,
  add_date int(11) NOT NULL DEFAULT '0',
  commissions decimal(12,2) NOT NULL DEFAULT '0.00',
  paid_commissions decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (orderid),
  KEY userid (userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_provider_product_commissions (
  itemid int(11) NOT NULL DEFAULT '0',
  orderid int(11) NOT NULL DEFAULT '0',
  userid int(11) NOT NULL DEFAULT '0',
  product_commission decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (itemid,orderid,userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_quick_flags (
  productid int(11) NOT NULL DEFAULT '0',
  is_variants char(1) NOT NULL DEFAULT '',
  is_product_options char(1) NOT NULL DEFAULT '',
  is_taxes char(1) NOT NULL DEFAULT '',
  image_path_T varchar(255) DEFAULT NULL,
  PRIMARY KEY (productid),
  UNIQUE KEY pi (productid,image_path_T),
  KEY vpt (is_variants,is_product_options,is_taxes)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_quick_prices (
  productid int(11) NOT NULL DEFAULT '0',
  priceid int(11) NOT NULL DEFAULT '0',
  membershipid int(11) NOT NULL DEFAULT '0',
  variantid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (productid,membershipid),
  UNIQUE KEY pmp (productid,membershipid,priceid),
  KEY pp (productid,priceid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_referers (
  referer char(255) NOT NULL DEFAULT '',
  visits int(11) NOT NULL DEFAULT '0',
  last_visited int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (referer),
  KEY last_visited (last_visited)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_register_field_values (
  fieldid int(11) NOT NULL DEFAULT '0',
  userid int(11) NOT NULL DEFAULT '0',
  `value` text NOT NULL,
  PRIMARY KEY (fieldid,userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_register_fields (
  fieldid int(11) NOT NULL AUTO_INCREMENT,
  field varchar(255) NOT NULL DEFAULT '',
  `type` char(1) NOT NULL DEFAULT 'T',
  variants text NOT NULL,
  def varchar(255) NOT NULL DEFAULT '',
  orderby int(11) NOT NULL DEFAULT '0',
  section char(1) NOT NULL DEFAULT 'A',
  avail varchar(5) NOT NULL DEFAULT '',
  required varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (fieldid),
  KEY orderby (orderby),
  KEY avail (avail),
  KEY required (required)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_returns (
  returnid int(11) NOT NULL AUTO_INCREMENT,
  itemid int(11) NOT NULL DEFAULT '0',
  amount int(11) NOT NULL DEFAULT '0',
  returned_amount int(11) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT 'R',
  reason int(11) NOT NULL DEFAULT '0',
  `action` int(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  credit varchar(16) NOT NULL DEFAULT '',
  creator char(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (returnid),
  KEY itemid (itemid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_secure3d_data (
  tranid varchar(32) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  get_data mediumtext NOT NULL,
  sessid char(32) NOT NULL DEFAULT '',
  session_data text NOT NULL,
  form_data text NOT NULL,
  form_url text NOT NULL,
  return_data mediumtext NOT NULL,
  processor varchar(255) NOT NULL DEFAULT '',
  verify_funcname varchar(255) NOT NULL DEFAULT '',
  validate_funcname varchar(255) NOT NULL DEFAULT '',
  md varchar(255) NOT NULL DEFAULT '',
  no_iframe char(1) NOT NULL DEFAULT '',
  service_data text NOT NULL,
  PRIMARY KEY (tranid),
  KEY sessid (sessid),
  KEY md (md)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_seller_addresses (
  userid int(11) NOT NULL DEFAULT '0',
  address varchar(255) NOT NULL DEFAULT '',
  city varchar(64) NOT NULL DEFAULT '',
  state varchar(32) NOT NULL DEFAULT '',
  country char(2) NOT NULL DEFAULT '',
  zipcode varchar(32) NOT NULL DEFAULT '',
  arb_id text NOT NULL,
  arb_password text NOT NULL,
  arb_account text NOT NULL,
  arb_shipping_key text NOT NULL,
  arb_shipping_key_intl text NOT NULL,
  PRIMARY KEY (userid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_session_history (
  ip int(11) unsigned NOT NULL DEFAULT '0',
  `host` varchar(255) NOT NULL DEFAULT '',
  xid char(32) NOT NULL DEFAULT '',
  dest_xid char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (ip,`host`),
  KEY ihx (ip,`host`,xid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_session_unknown_sid (
  sessid char(32) NOT NULL DEFAULT '',
  ip int(11) unsigned NOT NULL DEFAULT '0',
  cnt int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (ip,sessid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_sessions_data (
  sessid char(32) NOT NULL DEFAULT '',
  `start` int(11) NOT NULL DEFAULT '0',
  expiry int(11) NOT NULL DEFAULT '0',
  `data` mediumtext NOT NULL,
  PRIMARY KEY (sessid),
  UNIQUE KEY expiry_sid (expiry,sessid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_setup_images (
  itype char(1) NOT NULL DEFAULT '',
  location char(2) NOT NULL DEFAULT 'DB',
  save_url char(1) NOT NULL DEFAULT '',
  size_limit int(11) NOT NULL DEFAULT '0',
  md5_check char(32) NOT NULL DEFAULT '',
  default_image varchar(255) NOT NULL DEFAULT './default_image.gif',
  UNIQUE KEY itype (itype)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_shipping (
  shippingid int(11) NOT NULL AUTO_INCREMENT,
  shipping varchar(255) NOT NULL DEFAULT '',
  shipping_time varchar(128) NOT NULL DEFAULT '',
  destination char(1) NOT NULL DEFAULT 'I',
  `code` varchar(32) NOT NULL DEFAULT '',
  subcode varchar(32) NOT NULL DEFAULT '',
  orderby int(11) NOT NULL DEFAULT '0',
  active char(1) NOT NULL DEFAULT 'Y',
  intershipper_code varchar(32) NOT NULL DEFAULT '',
  weight_min decimal(12,2) NOT NULL DEFAULT '0.00',
  weight_limit decimal(12,2) NOT NULL DEFAULT '0.00',
  service_code int(11) NOT NULL DEFAULT '0',
  is_cod char(1) NOT NULL DEFAULT '',
  is_new char(1) NOT NULL DEFAULT '',
  amazon_service varchar(32) NOT NULL DEFAULT 'Standard',
  gc_shipping varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (shippingid),
  KEY `code` (`code`),
  KEY orderby (orderby),
  KEY active (active)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_shipping_cache (
  md5_request char(32) NOT NULL DEFAULT '',
  sessid char(32) NOT NULL DEFAULT '',
  response text NOT NULL,
  PRIMARY KEY (sessid,md5_request)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_shipping_labels (
  labelid int(11) NOT NULL AUTO_INCREMENT,
  orderid int(11) NOT NULL DEFAULT '0',
  mime_type varchar(80) NOT NULL DEFAULT '',
  label mediumblob NOT NULL,
  `error` text NOT NULL,
  descr varchar(255) NOT NULL DEFAULT '',
  packages_number int(11) NOT NULL DEFAULT '0',
  is_first char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (labelid),
  KEY orderid (orderid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_shipping_options (
  carrier varchar(32) NOT NULL DEFAULT '',
  param00 text NOT NULL,
  param01 varchar(128) NOT NULL DEFAULT '',
  param02 varchar(128) NOT NULL DEFAULT '',
  param03 varchar(128) NOT NULL DEFAULT '',
  param04 varchar(128) NOT NULL DEFAULT '',
  param05 varchar(128) NOT NULL DEFAULT '',
  param06 varchar(128) NOT NULL DEFAULT '',
  param07 varchar(128) NOT NULL DEFAULT '',
  param08 varchar(128) NOT NULL DEFAULT '',
  param09 varchar(128) NOT NULL DEFAULT '',
  param10 varchar(128) NOT NULL DEFAULT '',
  param11 varchar(128) NOT NULL DEFAULT '',
  currency_rate decimal(12,2) NOT NULL DEFAULT '1.00',
  PRIMARY KEY (carrier)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_shipping_rates (
  rateid int(11) NOT NULL AUTO_INCREMENT,
  shippingid int(11) NOT NULL DEFAULT '0',
  zoneid int(11) NOT NULL DEFAULT '0',
  minweight decimal(12,2) NOT NULL DEFAULT '0.00',
  maxweight decimal(12,2) NOT NULL DEFAULT '1000000.00',
  mintotal decimal(12,2) NOT NULL DEFAULT '0.00',
  maxtotal decimal(12,2) NOT NULL DEFAULT '0.00',
  rate decimal(12,2) NOT NULL DEFAULT '0.00',
  item_rate decimal(12,2) NOT NULL DEFAULT '0.00',
  weight_rate decimal(12,2) NOT NULL DEFAULT '0.00',
  rate_p decimal(12,2) NOT NULL DEFAULT '0.00',
  provider int(11) NOT NULL DEFAULT '0',
  `type` char(1) NOT NULL DEFAULT 'D',
  apply_to char(6) NOT NULL DEFAULT 'DST',
  PRIMARY KEY (rateid),
  KEY provider (provider),
  KEY shippingid (shippingid),
  KEY maxweight (maxweight),
  KEY zoneid (zoneid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_sitemap_extra (
  id int(11) NOT NULL AUTO_INCREMENT,
  url varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  active char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_split_checkout (
  orderids varchar(255) NOT NULL DEFAULT '',
  `data` mediumtext NOT NULL,
  PRIMARY KEY (orderids)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_states (
  stateid int(11) NOT NULL AUTO_INCREMENT,
  state varchar(64) NOT NULL DEFAULT '',
  `code` varchar(32) NOT NULL DEFAULT '',
  country_code char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (stateid),
  UNIQUE KEY `code` (country_code,`code`),
  KEY state (state)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_stats_adaptive (
  platform varchar(64) NOT NULL DEFAULT '',
  browser varchar(10) NOT NULL DEFAULT '',
  version varchar(16) NOT NULL DEFAULT '',
  java char(1) NOT NULL DEFAULT 'Y',
  js char(1) NOT NULL DEFAULT 'Y',
  count int(11) NOT NULL DEFAULT '0',
  cookie char(1) NOT NULL DEFAULT '',
  screen_x int(11) NOT NULL DEFAULT '0',
  screen_y int(11) NOT NULL DEFAULT '0',
  last_date int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (platform,browser,java,js,version,cookie,screen_x,screen_y)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_stats_cart_funnel (
  transactionid int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL DEFAULT '0',
  start_page int(11) NOT NULL DEFAULT '0',
  step1 int(11) NOT NULL DEFAULT '0',
  step2 int(11) NOT NULL DEFAULT '0',
  step3 int(11) NOT NULL DEFAULT '0',
  final_page int(11) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (transactionid),
  KEY start_page (start_page),
  KEY step1 (step1),
  KEY step2 (step2),
  KEY step3 (step3),
  KEY final_page (final_page),
  KEY `date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_stats_customers_products (
  productid int(11) NOT NULL DEFAULT '0',
  userid int(11) NOT NULL DEFAULT '0',
  counter int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (productid,userid),
  KEY counter (counter)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_stats_pages (
  pageid int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (pageid),
  UNIQUE KEY `page` (`page`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_stats_pages_paths (
  path varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  KEY counter (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_stats_pages_views (
  pageid int(255) NOT NULL DEFAULT '0',
  time_avg int(11) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  KEY pageid (pageid),
  KEY time_avg (time_avg),
  KEY `date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_stats_search (
  swordid int(11) NOT NULL AUTO_INCREMENT,
  search varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (swordid),
  KEY search (search),
  KEY `date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_stats_shop (
  id int(11) NOT NULL DEFAULT '0',
  `action` char(1) NOT NULL DEFAULT 'V',
  `date` int(11) NOT NULL DEFAULT '0',
  multi int(11) NOT NULL DEFAULT '1',
  KEY id (id),
  KEY `date` (`date`),
  KEY `action` (`action`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_stop_list (
  octet1 int(3) NOT NULL DEFAULT '0',
  octet2 int(3) NOT NULL DEFAULT '0',
  octet3 int(3) NOT NULL DEFAULT '0',
  octet4 int(3) NOT NULL DEFAULT '0',
  ip varchar(15) NOT NULL DEFAULT '',
  reason char(1) NOT NULL DEFAULT 'M',
  `date` int(11) NOT NULL DEFAULT '0',
  ipid int(11) NOT NULL AUTO_INCREMENT,
  ip_type char(1) NOT NULL DEFAULT 'B',
  PRIMARY KEY (ipid),
  UNIQUE KEY octet1 (octet1,octet2,octet3,octet4),
  KEY ip (ip)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_survey_answers (
  answerid int(11) NOT NULL AUTO_INCREMENT,
  questionid int(11) NOT NULL DEFAULT '0',
  textbox_type char(1) NOT NULL DEFAULT 'N',
  orderby int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (answerid),
  KEY questionid (questionid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_survey_events (
  surveyid int(11) NOT NULL DEFAULT '0',
  param char(1) NOT NULL DEFAULT '',
  id varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (surveyid,param,id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_survey_maillist (
  surveyid int(11) NOT NULL DEFAULT '0',
  email varchar(128) NOT NULL DEFAULT '',
  userid int(11) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  access_key varchar(32) NOT NULL DEFAULT '',
  sent_date int(11) NOT NULL DEFAULT '0',
  complete_date int(11) NOT NULL DEFAULT '0',
  delay_date int(11) NOT NULL DEFAULT '0',
  as_result varchar(32) NOT NULL DEFAULT '',
  UNIQUE KEY se (surveyid,email),
  KEY `date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_survey_questions (
  questionid int(11) NOT NULL AUTO_INCREMENT,
  surveyid int(11) NOT NULL DEFAULT '0',
  answers_type char(1) NOT NULL DEFAULT 'R',
  required char(1) NOT NULL DEFAULT '',
  col int(3) NOT NULL DEFAULT '0',
  orderby int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (questionid),
  KEY surveyid (surveyid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_survey_result_answers (
  sresultid int(11) NOT NULL DEFAULT '0',
  questionid int(11) NOT NULL DEFAULT '0',
  answerid int(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  UNIQUE KEY main (sresultid,questionid,answerid),
  KEY qa (questionid,answerid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_survey_results (
  sresultid int(11) NOT NULL AUTO_INCREMENT,
  surveyid int(11) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  ip int(11) unsigned NOT NULL DEFAULT '0',
  userid int(11) NOT NULL DEFAULT '0',
  `code` char(2) NOT NULL DEFAULT '',
  from_mail char(1) NOT NULL DEFAULT '',
  completed char(1) NOT NULL DEFAULT '',
  as_result varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (sresultid),
  KEY sil (surveyid,ip,userid),
  KEY sc (surveyid,completed)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_surveys (
  surveyid int(11) NOT NULL AUTO_INCREMENT,
  survey_type char(1) NOT NULL DEFAULT 'D',
  created_date int(11) NOT NULL DEFAULT '0',
  valid_from_date int(11) NOT NULL DEFAULT '0',
  expires_data int(11) NOT NULL DEFAULT '0',
  publish_results char(1) NOT NULL DEFAULT '',
  display_on_frontpage char(1) NOT NULL DEFAULT '',
  event_type char(3) NOT NULL DEFAULT '',
  event_logic char(1) NOT NULL DEFAULT 'O',
  orderby int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (surveyid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_tax_rate_memberships (
  rateid int(11) NOT NULL DEFAULT '0',
  membershipid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (rateid,membershipid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_tax_rates (
  rateid int(11) NOT NULL AUTO_INCREMENT,
  taxid int(11) NOT NULL DEFAULT '0',
  zoneid int(11) NOT NULL DEFAULT '0',
  formula varchar(255) NOT NULL DEFAULT '',
  rate_value decimal(12,3) NOT NULL DEFAULT '0.000',
  rate_type char(1) NOT NULL DEFAULT '',
  provider int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (rateid),
  KEY provider (provider),
  KEY tax_rate (taxid,zoneid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_taxcloud_cache (
  sessid char(32) NOT NULL DEFAULT '',
  cell_key varchar(128) NOT NULL DEFAULT '',
  cell_value mediumtext NOT NULL,
  PRIMARY KEY (sessid,cell_key)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_taxes (
  taxid int(11) NOT NULL AUTO_INCREMENT,
  tax_name varchar(10) NOT NULL DEFAULT '',
  formula varchar(255) NOT NULL DEFAULT '',
  address_type char(1) NOT NULL DEFAULT 'S',
  active char(1) NOT NULL DEFAULT 'N',
  price_includes_tax char(1) NOT NULL DEFAULT 'N',
  display_including_tax char(1) NOT NULL DEFAULT 'N',
  display_info char(1) NOT NULL DEFAULT '',
  regnumber varchar(255) NOT NULL DEFAULT '',
  priority int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (taxid),
  UNIQUE KEY tax_name (tax_name),
  KEY active (active)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_temporary_data (
  id varchar(32) NOT NULL DEFAULT '',
  `data` text,
  expire int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY expire (expire)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_titles (
  titleid int(11) NOT NULL AUTO_INCREMENT,
  title varchar(64) NOT NULL DEFAULT '',
  active char(1) NOT NULL DEFAULT 'Y',
  orderby int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (titleid),
  KEY ia (titleid,active),
  KEY title (title),
  KEY orderby (orderby)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_users_online (
  sessid char(32) NOT NULL DEFAULT '',
  usertype char(1) NOT NULL DEFAULT '',
  is_registered char(1) NOT NULL DEFAULT '',
  expiry int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (sessid),
  KEY usertype (usertype),
  KEY iu (is_registered,usertype),
  KEY expiry (expiry)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_variant_backups (
  optionid int(11) NOT NULL DEFAULT '0',
  variantid int(11) NOT NULL DEFAULT '0',
  productid int(11) NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  PRIMARY KEY (optionid,variantid),
  KEY optionid (optionid),
  KEY variantid (variantid),
  KEY productid (productid),
  KEY po (productid,optionid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_variant_items (
  optionid int(11) NOT NULL DEFAULT '0',
  variantid int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (optionid,variantid),
  KEY variantid (variantid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_variants (
  variantid int(11) NOT NULL AUTO_INCREMENT,
  productid int(11) NOT NULL DEFAULT '0',
  avail int(11) NOT NULL DEFAULT '0',
  weight decimal(12,2) NOT NULL DEFAULT '0.00',
  productcode varchar(32) NOT NULL DEFAULT '0',
  def char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (variantid),
  UNIQUE KEY productcode (productcode),
  UNIQUE KEY pp (productid,productcode),
  KEY productid (productid),
  KEY avail (avail)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_wishlist (
  wishlistid int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL DEFAULT '0',
  productid int(11) NOT NULL DEFAULT '0',
  amount int(11) NOT NULL DEFAULT '0',
  amount_purchased int(11) NOT NULL DEFAULT '0',
  `options` text NOT NULL,
  event_id int(11) NOT NULL DEFAULT '0',
  object text NOT NULL,
  PRIMARY KEY (wishlistid),
  KEY userid_product (userid,productid),
  KEY `event` (event_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_xmlmap_extra (
  id int(11) NOT NULL AUTO_INCREMENT,
  url varchar(255) NOT NULL DEFAULT '',
  active char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_xmlmap_lastmod (
  id int(11) NOT NULL DEFAULT '0',
  `type` char(1) NOT NULL DEFAULT '',
  `date` char(25) NOT NULL DEFAULT '',
  UNIQUE KEY it (id,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_zone_element (
  zoneid int(11) NOT NULL DEFAULT '0',
  field varchar(36) NOT NULL DEFAULT '',
  field_type char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (zoneid,field,field_type),
  KEY field (field_type,field),
  KEY field_type (zoneid,field_type)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





CREATE TABLE xcart_zones (
  zoneid int(11) NOT NULL AUTO_INCREMENT,
  zone_name varchar(255) NOT NULL DEFAULT '',
  zone_cache varchar(255) NOT NULL DEFAULT '',
  provider int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (zoneid),
  KEY zone_name (provider,zone_name)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


