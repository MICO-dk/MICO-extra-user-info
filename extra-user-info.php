<?php
/**
 * @wordpress-plugin
 * Plugin Name:     Extra user info
 * Description:     Lets the user add extra meta info to the wordpress user profile
 * Version:         1.0.0
 * Author:          Nina Cecilie Højholdt // MICO
 * Author URI:      http://www.mico.dk
 */

require_once('headline-extra-user-info.php');
require_once('class-extra-user-info.php');


$headline = new HeadlineExtraUserInfo("Ekstra information");


$members = new ExtraUserInfo(array(
    'field_title' => 'Titel / stilling',
    'field_description' => 'Brugerens titel / stilling',
    'field_name' => 'titel'
    )
);

$test = new ExtraUserInfo(array(
    'field_title' => 'Test felt',
    'field_description' => 'Test beskrivelse',
    'field_name' => 'test',
    )
);

?>