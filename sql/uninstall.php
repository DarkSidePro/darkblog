<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <DARK SIDE TEAM> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Poul-Henning Kamp
 * ----------------------------------------------------------------------------
 */

/**
 * In some cases you should not drop the tables.
 * Maybe the merchant will just try to reset the module
 * but does not want to loose all of the data associated to the module.
 */
$sql = array();

$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_test';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_test_lang';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_category';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_category_lang';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_comments';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_comments_lang';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_comments_likes';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_posts';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_posts_lang';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_posts_blog_category';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_posts_likes';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_posts_presta_category';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_posts_presta_group';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_posts_presta_product';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_posts_tags';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_posts_views';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_tags';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_user';
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'dark_blog_user_views';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
