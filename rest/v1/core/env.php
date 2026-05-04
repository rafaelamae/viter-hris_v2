<?php

//For local computer configuration
define('WEB_API_KEY_PATH', require __DIR__ . "/../../../apikey.php");
//For production/deployment configuration
// define('WEB_API_KEY_PATH', require &_SERVER['DOCUMENT_ROOT']. "/../../apikey.php");

// // For set email
define('FROM', 'HRIS');
define('VERIFY_ACCOUNT', 'Account Verification');
define('VERIFY_PASSWORD', 'Reset Password');
define('VERIFY_EMAIL', 'Email Verification');
// // Email Verification
// define('USERNAME', 'noreply@groupoptix.com');
// define('PASSWORD', "1s$42*Gs1CvBezsI");
// define('HOST', 'smtp.hostinger.com');
// define('PORT', '587');
// define('SMTPSECURE', 'tls');

// // GROUP OPTIX HOSTINGER EMAIL
define("USERNAME", "noreply@groupoptix.com");
define("PASSWORD", "1s$42*Gs1CvbEzsI");
// // GROUP OPTIX HOSTINGER
define("HOST", "smtp.hostinger.com");
define("PORT", 587);
define("SMTPSECURE", "tls");

//ROOT DOMAIN
define('ROOT_DOMAIN', 'http://localhost:5173');
define('IMAGES_URL', 'http://localhost:5173/img');
// //PRODUCTION
// define('ROOT_DOMAIN', 'http://www.example.com');
// define('IMAGES_URL', 'http://www.example.comimg');