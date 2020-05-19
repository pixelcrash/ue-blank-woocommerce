<?php

add_action("wp_ajax_newsletter_footer_signup", "newsletter_footer_signup");
add_action("wp_ajax_nopriv_newsletter_footer_signup", "newsletter_footer_signup");

function newsletter_footer_signup() {

   if ( !wp_verify_nonce( $_REQUEST['nonce'], "newsletter_form_signup")) {
      echo "nonce wrong";
   }  else{
     
     $name = $_REQUEST["fname"];
     $email = $_REQUEST["femail"];
     $mail = explode('@', $email);
     $date = date('d/m/Y');
     $datetime = date('d/m/Y H:i:s');
     $quelle = "Newsletter Fusszeile";
     $newsletter = 1;
     $title = "Neuer Abonnent Newsletter: " . $name; 
     
     global $user_ID;
      $new_post = array(
      'post_title' => $title,
      'post_content' => $title . " Quelle: " . $quelle . " Datum: " . $datetime,
      'post_status' => 'private',
      'post_date' => date('Y-m-d H:i:s'),
      'post_author' => 1,
      'post_type' => 'anfragen',
      'post_category' => array(0)
      );
      $post_id = wp_insert_post($new_post);
      
      update_field('field_5cc302ba73c0a', $name, $post_id); //Name
      update_field('field_5cc30d3f20aa2', $mail[0], $post_id); //EMAIL BEFORE
      update_field('field_5cc30d5920aa3', $mail[1], $post_id); //EMAIL AFTER
      update_field('field_5cc3034273c11', $quelle, $post_id); //QUELLE 
      update_field('field_5cc3032873c10', $newsletter, $post_id); //NEWSLETTER
      update_field('field_5cc302dd73c0d', $date, $post_id); //DATE
     
     echo "1";
   } 

   
  

   die();

}

