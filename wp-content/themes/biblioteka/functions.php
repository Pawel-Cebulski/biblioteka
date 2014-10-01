<?php

add_action('after_switch_theme', 'theme_activation_function');

function theme_activation_function() {
    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    $new_sql_table = $wpdb->prefix . 'biblioteka';
    if ($wpdb->get_var("SHOW TABLES LIKE '$new_sql_table'") != $new_sql_table) {
        $sql = "CREATE TABLE `$new_sql_table` (
                  `id` int(11) NOT NULL,
                  `title` tinytext NOT NULL,
                  `author` tinytext NOT NULL,
                  `year` year NOT NULL,
                  `publisher` tinytext NOT NULL,
                  `description` longtext NOT NULL COMMENT 'Liczba 1',                  
                  PRIMARY KEY (`id`)
                  )ENGINE=InnoDB COMMENT='Lista historychnych losowań';";
        dbDelta($sql);
    }
}

add_action('wp_enqueue_scripts', 'biblioteka_css');

function biblioteka_css() {
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}

add_action('init', 'load_my_ajax');

function load_my_ajax() {

    wp_register_script("my_ajax_code", get_template_directory_uri() . '/ajax.js', array('jquery'));
    wp_localize_script('my_ajax_code', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

    wp_enqueue_script('jquery');
    wp_enqueue_script('my_ajax_code');
}

add_action("wp_ajax_nopriv_add_new_book", "add_new_book");

function add_new_book() {
    global $wpdb;
    $tablename = $wpdb->prefix . 'biblioteka';
    $max_id = $wpdb->get_var("SELECT MAX(id) FROM $tablename");
    $new_id = $max_id + 1;
    $new_book = array(
        'id' => $new_id,
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'year' => $_POST['year'],
        'publisher' => $_POST['publisher'],
        'description' => $_POST['description'],
    );
    $wpdb->insert($tablename, $new_book);
    $result = json_encode(array('status' => "ok", 'new_book' => $new_book, 'message' => "Poprawnie dodano nową książkę."));
    echo $result;
    die();
}

add_action("wp_ajax_nopriv_delete_book", "delete_book");

function delete_book() {
//    var_dump($_POST);
    global $wpdb;
    $tablename = $wpdb->prefix . 'biblioteka';
    $book_id = $_POST['book_id'];
    $row = array(
        'ID' => $book_id
    );
    $wpdb->delete($tablename, $row);
    $result = json_encode(array('status' => "ok", 'deleted_book_id' => $book_id, 'message' => "Poprawnie usunięto książkę."));
    echo $result;
    die();
}

add_action("wp_ajax_nopriv_edit_book", "edit_book");

function edit_book() {
    global $wpdb;
    $tablename = $wpdb->prefix . 'biblioteka';
    $book_id = $_POST['book_id'];
    $book = array(
        'id' => $book_id,
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'year' => $_POST['year'],
        'publisher' => $_POST['publisher'],
        'description' => $_POST['description'],
    );
    $where = array(
        'id' => $book_id
    );
    $wpdb->update($tablename, $book, $where);
    $result = json_encode(array('status' => "ok", 'edit_book' => $book, 'message' => "Poprawnie zapisano książkę."));
    echo $result;
    die();
}
