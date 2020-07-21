<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
//  clear stored database data
$books = get_post(['post-type' => 'book', 'numberposts' => -1]);

foreach ($books as $book) {
    wp_delete_post($book->ID, true);
}
