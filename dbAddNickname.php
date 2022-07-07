<?php

update_user_meta(1, "first_name", "Geronimo");
update_user_meta(1, "last_name", "Goyaałé");
$users = get_users();

$i = 1;
foreach ($users as $user) {
    $output = update_user_meta($user->ID, "nickname", $user->user_login);

    echo $i;
    echo " - ";
    echo $user->ID;
    echo " - ";
    echo $output ? 'true' : 'false';
    echo " - ";

    $name = get_user_meta($user->ID, "first_name", true);
    $name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
    update_user_meta($user->ID, "first_name", $name);

    echo $name;
    echo " -  ";

    $lastname = get_user_meta($user->ID, "last_name", "true");
    $lastname = mb_convert_case($lastname, MB_CASE_TITLE, "UTF-8");
    update_user_meta($user->ID, "last_name", $lastname);

    echo $lastname;
    echo " -  ";

    $display = $name." ".$lastname;
    wp_update_user(array('ID' => $user->ID, 'display_name' => $display));
    echo $display;
    echo "\n";
    $i++;
}
