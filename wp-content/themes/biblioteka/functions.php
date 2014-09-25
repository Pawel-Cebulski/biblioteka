<?php

add_action('after_switch_theme', 'theme_activation_function');

function theme_activation_function() {
    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    $new_sql_table = $wpdb->prefix . 'biblioteka';
    if ($wpdb->get_var("SHOW TABLES LIKE '$new_sql_table'") != $new_sql_table) {
        $sql = "CREATE TABLE `$new_sql_table` (
                  `id` int(11) NOT NULL,
                  `title` char NOT NULL,
                  `author` char NOT NULL,
                  `year` year NOT NULL,
                  `publisher` char NOT NULL,
                  `description` longtext NOT NULL COMMENT 'Liczba 1',                  
                  PRIMARY KEY (`id`)
                  )ENGINE=InnoDB COMMENT='Lista historychnych losowań';";
        dbDelta($sql);
    }
    
    
}
