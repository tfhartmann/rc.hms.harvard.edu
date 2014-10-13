<?php

/**
 * This is the PHP for the support form
 */

if (isset($_POST['form_support_email'])) {
  //if "email" is filled out, send email

  //$mailto = "Nam_Pho@hms.harvard.edu"; // test
  //$mailto = "submit-it-ritg@rt.med.harvard.edu"; // prod actually makes a ticket
  $mailto = "rcops@hms.harvard.edu"; // prod actually makes a ticket
  $email = strip_tags($_POST['form_support_email']);
  $subject = strip_tags($_POST['form_support_subject']);
  $first_name = strip_tags($_POST['form_support_first_name']);
  $last_name = strip_tags($_POST['form_support_last_name']);
  $group = strip_tags($_POST['form_support_group']);

  $message = "This ticket was submitted via http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "

-------------------------------------------------------------------------------
Requestor's contact information:

        $first_name $last_name	<$email>
        Group:\t\t$group
-------------------------------------------------------------------------------

";

  $message .= strip_tags($_POST['form_support_message']);

  //print($message);

  // actually mail out the converted form  
  mail($mailto, $subject, $message, "From:" . $email);
  
  echo "
   	<h1>Submit a New Support Request</h1>
    	<br />
	<p>You can close this window; you will get an e-mail with your ticket number shortly.</p>
	<br />
	<p>Thank you for using our web form.</p>
	<br />
	<p> -- HMS Research Computing </p>
  ";

  //print_r(array_values(get_defined_vars())); // debug
}

/**
 * This is the PHP for the new user form
 */

if (isset($_POST['form_register_email'])) {
  //if "email" is filled out, send email

  //$mailto = "Nam_Pho@hms.harvard.edu"; // test
  //$mailto = "submit-it-ritg@rt.med.harvard.edu"; // prod actually makes a ticket
  $mailto = "rcops@hms.harvard.edu";
  $email = strip_tags($_POST['form_register_email']) ;
  $first_name = strip_tags($_POST['form_register_first_name']);
  $last_name = strip_tags($_POST['form_register_last_name']);
  $ecommons = strip_tags($_POST['form_register_ecommons']);
  $subject = "New Orchestra HPC user: ".$first_name." ".$last_name." (".$ecommons.")";
  $group = strip_tags($_POST['form_register_group']);
  $research = strip_tags($_POST['form_register_research']);
  $storage = strip_tags($_POST['form_register_storage']);
  $compute = strip_tags($_POST['form_register_compute']);
  $software = strip_tags($_POST['form_register_software']);

  $message = "This ticket was submitted via http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "

-------------------------------------------------------------------------------
Requestor's contact information:

        $first_name $last_name <$email>
        Group:\t\t$group
-------------------------------------------------------------------------------

eCommons ID: $ecommons

Research summary: $research

Data storage estimate: $storage

Computational resource usage estimate: $compute

Software requirements: $software

";

  //print($message);

  // actually mail out the converted form  
  mail($mailto, $subject, $message, "From:" . $email);
  
  echo "
    <h1>Orchestra New User Account Request</h1>
    <br />
    <p>You can close this window; you will get an e-mail with your ticket number shortly.</p>
    <br />
    <p>Thank you for using our web form.</p>
    <br />
    <p> -- HMS Research Computing </p>
  ";

  //print_r(array_values(get_defined_vars())); // debug
}

/**
 * This is the PHP for more storage
 */

if (isset($_POST['form_storage_email'])) {
  //if "email" is filled out, send email

  $mailto = "Nam_Pho@hms.harvard.edu"; // test
  //$mailto = "submit-it-ritg@rt.med.harvard.edu"; // prod actually makes a ticket
  //$mailto = "rcops@hms.harvard.edu";
  $email = strip_tags($_POST['form_storage_email']) ;
  $first_name = strip_tags($_POST['form_storage_first_name']);
  $last_name = strip_tags($_POST['form_storage_last_name']);
  $ecommons = strip_tags($_POST['form_storage_ecommons']);
  $subject = "Storage Increase Request: ".$first_name." ".$last_name." (".$ecommons.")";

  $group = strip_tags($_POST['form_storage_group']);
  $storage_request = strip_tags($_POST['form_storage_xtrastorage']);
  $storage_growth = strip_tags($_POST['form_storage_xtrastorage-growth']);


  $message = "This ticket was submitted via http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "

-------------------------------------------------------------------------------
Requestor's contact information:

        $first_name $last_name <$email>
        Group:\t\t$group
-------------------------------------------------------------------------------

eCommons ID: $ecommons

Group/Lab: $group

Storage Request: $storage_request

Storage Growth: $storage_growth

";

  //print($message);

  // actually mail out the converted form  
  mail($mailto, $subject, $message, "From:" . $email);
  
  echo "
    <h1>Orchestra Storage Increase Request</h1>
    <br />
    <p>You can close this window; you will get an e-mail with your ticket number shortly.</p>
    <br />
    <p>Thank you for using our web form.</p>
    <br />
    <p> -- HMS Research Computing </p>
  ";

  //print_r(array_values(get_defined_vars())); // debug
}

?>
