<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/* 
   Adapted from um_ldap and muauth
   
*/



/* ******************************************************************

 Params:
   $email - an purported email address
 Returns:
   True or False, as you would expect based on the function name
****************************************************************** */
function is_valid_email($email) {

    // eregi() is depricated > PHP 5.1
    // Ben B.

    return (!filter_var(trim($email), FILTER_VALIDATE_EMAIL));
}


/* ******************************************************************

 Params:
   $accountName - The SSO / Pawprint
   $credential - The password
   $ldapServer - LDAP Server, defaults to 'ldap.missouri.edu'
   $ldapPort - LDAP Port, defaults to 3268
   &$errorMsg - Output parameter to catch an error message
 Returns:
   FALSE on Error, else an array with with information.
****************************************************************** */
function authenticateToUMLDAP($accountName,$credential) {
                              $ldapServer = 'ldap.missouri.edu';
                              $ldapPort = 3268;
                              $errorMsg = "";
                              $requireSecure = true;

    $error           = array();
    $query_result    = array();
    $attributes      = array("samaccountname", "proxyAddresses", "mail", "displayName");
    $formatted_result = array();

    $connection = ldap_connect($ldapServer, $ldapPort);

    if (! $connection ) {
   $errorMsg = "Failed to connect to $ldapServer:$ldapPort";
   return false;
    }

    if ( ! ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3) ){
   $errorMsg = "Failed to Set Protocol version 3";
   return false;
    }

    if ( ! ldap_set_option($connection, LDAP_OPT_REFERRALS, 0) ) {
   $errorMsg = "Failed to connect disable referrals from server";
   return false;
    }


    if ( ! ldap_start_tls($connection) && $requireSecure) {
   $errorMsg = "Unable to get a TLS connection, are you using the correct port?";
   return false;
    }

    // Try one until we connect
    $valid_domains = array("tig.mizzou.edu", "col.missouri.edu", "umsystem.umsystem.edu");    
    foreach ($valid_domains as $domain){
        if ($bind_status = ldap_bind($connection,$accountName."@".$domain,$credential))
            break;
    }

    // A break above leaves $bind_status = true;
	// echo "\n $bind_status";
    if ($bind_status) { 

        $ldapresults = ldap_search($connection, 'dc=edu', "(samaccountname=$accountName)", $attributes);
	// echo "\n $ldapresults";
        if (!$ldapresults) {
      $errorMsg = "Failed to look up after bind";
	  // echo "$errorMsg";
      return false;
        }
        else {
      // THIS VALUE IS CHECK BELOW
            $result_count = ldap_count_entries($connection, $ldapresults);
			// echo "$result_count\n";
            $query_result = ldap_get_entries($connection, $ldapresults);
			// echo "$query_result";
            ldap_close($connection);
        }
    }
    /* LDAP Bind failed */
    else {

        ldap_close($connection);

   $errorMsg = "Failed to bind to ($connection) as: $username";
   return false;
    }

$formatted_result;
    if ($result_count == 0) {
        // $formatted_result['result'] = '0';
        // $formatted_result['message'] = 'Invalid Username or Password';
		return FALSE;
    }
    else {
        $formatted_result['result'] = $result_count;
        $formatted_result['user']['fullname'] = $query_result[0]["displayname"][0];
        $formatted_result['user']['username'] = $query_result[0]["samaccountname"][0];
        // $formatted_result['user']['emails']   = get_email($query_result);
		 return $formatted_result;
    }
   
}


?>

