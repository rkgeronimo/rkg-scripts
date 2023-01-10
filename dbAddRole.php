<?php

// Add role member based on paid membership

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

    global $wpdb;

    $tableName = $wpdb->prefix."rkg_member_subscription";
    $foundPayment= $wpdb->get_row(
        "SELECT * FROM "
        .$tableName
        ." WHERE user = ".$user->id." AND year = '2022'"
    );

    if ($foundPayment) {
        $user->add_role('member');
    }
    $i++;
}
