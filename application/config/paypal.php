<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
It's highly recommended to use sandbox account for testing purpose
*/


// -------------TEST PAYPAL-------------

// $config['mode']          = "sandbox";
// $config['client_id']     = "Adim8Ad6LEpnKjyeEh-UqlA-BJE8sk6z35CdtsFZ6DDYZJlueXJq7g529qhrF-bcVaHEiQT9yFBizAuq";
// $config['client_secret'] = "ECn3Ox77GkU-7oOf0x7Fcz6DqeR1yQelKdWwEZMcin_11m-lFVqo3s2_F92Lx7q5jlev-JT4DdQpDkuy";
// $config['currency']      = 'USD';




// -------------lIVE PAYPAL-------------
$config['mode']          = "live";
$config['client_id']     = "Aby4P79NJ14ekPK6HnQW3i_-4SoJe2tJdlIx8U0w3MrmmZI5UzXDKfqlSrm_NqzCZ-2Oo7DZMUti9O13";
$config['client_secret'] = "ED7WbfJJOPv009JT-Y3IfP7PQB335BIfSIVioo8RW_uLEyNPKhP0-rkLyT2ScTQ16xViCyUt46lNQ3VH";
$config['currency']      = 'GBP';  // Set to GBP for UK Pounds



// $config['mode']          = "sandbox"; //for live account use the key "live"
// $config['client_id']     = CLIENTID;
// $config['client_secret'] = CLIENTSECRET;
// $config['currency']      = 'USD';