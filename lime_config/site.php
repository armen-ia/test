<?php
    // Lets start the session
    session_start();

    // Hide Notices

    error_reporting(E_ALL ^ E_NOTICE);

    // Language

    $config['language'] = 'english';

    // CloudFlare $_SERVER vars

    if(!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
    if(!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) $_SERVER['HTTPS'] = ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')?true:false;

    // API

    $config['api_insert'] = true;
    $config['api_timeout'] = 30;

    // DATABASE

    $config['db_insert'] = true;
    $config['db_cc_insert'] = false;
    $config['db_prefix'] = 'll_';
    $config['db_key'] = '';

    // ROOT PATHS

    //$config['root_domain'] = 'clients.inteliclic.com';
    //$config['root_user'] = '/home/inteli';
    //$config['root_path'] = '/public_html/dev/limelight';
   // $config['root_url'] = '/dev/limelight';
    $config['root_domain'] = 'localhost';
    $config['root_user'] = 'C:\xampp\htdocs\github\LimeLightFrame';
    $config['root_path'] = '';
    $config['root_url'] = "";

    // BASE PATHS

    $config['base_path'] = $config['root_user'] . $config['root_path'];
    $config['base_url'] = '';

    $config['base_includes'] = $config['root_user'] . $config['root_path'] . '/includes';
    $config['base_classes'] = $config['base_includes'] . '/classes';
    $config['base_config'] = $config['base_includes'] . '/config';
    $config['base_views'] = $config['base_includes'] . '/views';

    $config['http_domain'] = 'http://' . $config['root_domain'];
    $config['https_domain'] = 'https://' . $config['root_domain'];
    $config['base_prefix'] = ($_SERVER['HTTPS'])?'https://':'http://';
    $config['base_domain'] = $config['base_prefix'] . 'www.' . $config['root_domain'];
    $config['base_images'] = $config['base_domain'] . '/images';
    $config['base_css'] = $config['base_domain'] . '/css';
    $config['base_js'] = $config['base_domain'] . '/js';

    // COOKIES

    $config['cookie_path'] = "/";
    $config['cookie_domain'] = "." . $config['root_domain'];
    $config['cookie_expiry'] = strtotime("+14 day");

    // Site Title
    $config['product_name'] = 'LimeLight Framework';
    $config['copyright_name'] = 'LimeLight Framework - All Rights Reserved';
    $config['site_title'] = 'LimeLight Framework';

    // Emailing options
    $config['return_path'] = 'support@' . $config['root_domain']; // Required for some mail servers (refused without)
    $config['error_to'] = 'notices@inteliclic.com'; // Who should I send error to? You can comma separate ofcourse. user@domain.com, user2@domain.com
    $config['error_from'] = 'error@' . $config['root_domain']; // Who should the error come from?

    // Company Information
    $config['support_email'] = 'support@' . $config['root_domain'];
    $config['support_phone'] = '123-123-1234';
    $config['address_inline'] = 'Jabaaa Test 123 Test St., Tester, CA 6021 United States';
    $config['address_formatted'] = 'Jabaaa Test<br /> 123 Test St.,<br /> Tester, CA 6021 United States';

    // Google Analytics Code
    $config['google_analytics_code'] = ''; // UA-XXXXX-X | Blank for none

    // Funnel
    $config['funnel'] = array(1 => 'index.php', 2 => 'multiple.php', 3 => 'upsell.php', 4 => 'thankyou.php');

    // Currency
    $config['currency'] = '$'; // $ | £ | ¥ | ¢ | €

    // Countries
    $config['countries'] = array('US' => 'United States', 'CA' => 'Canada', 'GB' => 'United Kingdom', 'AU' => 'Australia'); // Global countries for entire site

    // Shipping Delay
    $config['ship']['us'] = 5;
    $config['ship']['ca'] = 5;
    $config['ship']['gb'] = 5;
    $config['ship']['au'] = 5;

    // Session Form Fields
    $config['index_fields_include'] = array('AFFID','AFID','SID','C1','C2','C3','AID','OPT','click_id');
    $config['index_fields_exclude'] = array('product_id','prospect_id','campaign_id','shipping_id');
    $config['payment_fields'] = array('shipToFirstName','shipToLastName','shipToAddress1','shipToCity','shipToState','shipToPostalCode','shipToCountry','shipToPhone','email');
    $config['payment_fields_include'] = array('idLog','campaignId','AFID','AFFID','AID','SID','C1','C2','C3','OPT','click_id','idPerson','shippingId','sourceCode','products');
    $config['payment_fields_exclude'] = array('cc_number','cc_month','cc_year','cc_cvv','product_id','prospect_id','campaign_id','shipping_id');

    // Turn on or off the coupon module
	$config['coupon_module'] = false;  // Coupon Module true or false

    // Language Files
    include_once($config['base_includes'] . '/language/' . $config['language'] . '.php');

    // Include Files
    include_once($config['base_config'] . '/api.php');

    // Classes
    //include_once($config['base_classes'] . '/db.mysql.connector.php');
    include_once($config['base_classes'] . '/db.connector.php');
    include_once($config['base_classes'] . '/db.pagination.php');
    include_once($config['base_classes'] . '/email.interface.php');
    include_once($config['base_classes'] . '/core.interface.php');
    include_once($config['base_classes'] . '/core.database.php');
    include_once($config['base_classes'] . '/site.interface.php');
    include_once($config['base_classes'] . '/site.database.php');
    include_once($config['base_classes'] . '/curl.request.php');
    include_once($config['base_classes'] . '/curl.response.php');
    include_once($config['base_classes'] . '/api.limelight.v1.0.php');
    if($config['coupon_module']){
        include_once($config['base_classes'] . '/coupon.interface.php');
        include_once($config['base_classes'] . '/coupon.database.php');
    }

?>