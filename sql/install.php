<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <DARK SIDE TEAM> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Poul-Henning Kamp
 * ----------------------------------------------------------------------------
 */
$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog` (
    `id_dark_blog` int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY  (`id_dark_blog`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';


$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_test` (
    `id_dark_blog_test` int(11) NOT NULL AUTO_INCREMENT,
    `test_string` varchar(500),
    PRIMARY KEY  (`id_dark_blog_test`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_test_lang` (
    `id_dark_blog_test` int(11) NOT NULL,
    `id_lang` int(11) NOT NULL,
    `id_shop` int(11) NOT NULL,
    `test_lang` varchar(500),
    PRIMARY KEY  (`id_dark_blog_test`, `id_lang`, `id_shop`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_category` (
    `id_dark_blog_category` int(11) NOT NULL AUTO_INCREMENT,
    `created_at` datetime,
    `parent` int(11),
    `active` boolean,
    PRIMARY KEY  (`id_dark_blog_category`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_category_lang` (
    `id_dark_blog_category` int(11),
    `id_lang` int(11),
    `id_shop` int(11),
    `name` varchar(50),
    `description` varchar(500),
    `meta_title` varchar(50),
    `meta_description` varchar(200),
    `img` varchar(500),
    `img_alt` varchar(500),
    `opengraph` varchar(500),
    `slug` varchar(500),
    PRIMARY KEY  (`id_dark_blog_category`, `id_lang`, `id_shop`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_comments` (
    `id_dark_blog_comments` int(11) NOT NULL AUTO_INCREMENT,
    `id_dark_blog_user` int(11),
    `id_dark_blog_posts` int(11),
    `id_parentcomment` int(11),
    `active` boolean,
    `created_at` datetime,
    `updated_at` datetime,
    PRIMARY KEY  (`id_dark_blog_comments`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_comments_lang` (
    `id_dark_blog_comments` int(11),
    `id_lang` int(11),
    `id_shop` int(11),
    `slug` varchar(500),
    `text` varchar(500),
    PRIMARY KEY  (`id_dark_blog_comments`, `id_lang`, `id_shop`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_comments_likes` (
    `id_dark_blog_comments_likes` int(11) NOT NULL AUTO_INCREMENT,
    `id_dark_blog_user` int(11),
    `id_dark_blog_comments` int(11),
    `is_liked` boolean,
    PRIMARY KEY  (`id_dark_blog_comments_likes`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_posts` (
    `id_dark_blog_posts` int(11) NOT NULL AUTO_INCREMENT,
    `id_dark_blog_user` int(11),
    `active` boolean,
    `created_at` datetime,
    `updated_at` datetime,
    PRIMARY KEY  (`id_dark_blog_posts`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_posts_lang` (
    `id_dark_blog_posts` int(11),
    `id_lang` int(11),
    `id_shop` int(11),
    `title` varchar(500),
    `img` varchar(500),
    `img_alt` varchar(128),
    `content` mediumtext,
    `short_description` varchar(160),
    `link` varchar (500),
    `meta_title` varchar (50),
    `meta_description` varchar (200),
    `opengraph` varchar (50),
    PRIMARY KEY  (`id_dark_blog_posts`, `id_lang`, `id_shop`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_posts_blog_category` (
    `id_dark_blog_posts_blog_category` int(11) NOT NULL AUTO_INCREMENT,
    `id_dark_blog_posts` int(11),
    `id_dark_blog_category` int(11),
    PRIMARY KEY  (`id_dark_blog_posts_blog_category`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_posts_likes` (
    `id_dark_blog_posts_likes` int(11) NOT NULL AUTO_INCREMENT,
    `id_dark_blog_user` int(11),
    `id_dark_blog_posts` int(11),
    `is_liked` boolean,
    PRIMARY KEY  (`id_dark_blog_posts_likes`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_posts_presta_category` (
    `id_dark_blog_posts_presta_category` int(11) NOT NULL AUTO_INCREMENT,
    `id_dark_blog_posts` int(11),
    `id_category` int(11),
    PRIMARY KEY  (`id_dark_blog_posts_presta_category`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_posts_presta_group` (
    `id_dark_blog_posts_presta_group` int(11) NOT NULL AUTO_INCREMENT,
    `id_dark_blog_posts` int(11),
    `id_group` int(11),
    PRIMARY KEY  (`id_dark_blog_posts_presta_group`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_posts_presta_product` (
    `id_dark_blog_posts_presta_product` int(11) NOT NULL AUTO_INCREMENT,
    `id_dark_blog_posts` int(11),
    `id_product` int(11),
    PRIMARY KEY  (`id_dark_blog_posts_presta_product`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_posts_tags` (
    `id_dark_blog_posts_tags` int(11) NOT NULL AUTO_INCREMENT,
    `id_dark_blog_posts` int(11),
    `id_dark_blog_tags` int(11),
    PRIMARY KEY  (`id_dark_blog_posts_tags`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_posts_views` (
    `id_dark_blog_posts_views` int(11) NOT NULL AUTO_INCREMENT,
    `id_dark_blog_posts` int(11),
    `views` int(11),
    PRIMARY KEY  (`id_dark_blog_posts_views`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_tags` (
    `id_dark_blog_tags` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255),
    `created_at` datetime,
    `updated_at` datetime,
    PRIMARY KEY  (`id_dark_blog_tags`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_user` (
    `id_dark_blog_user` int(11) NOT NULL AUTO_INCREMENT,
    `presta_id` int(11),
    `table` varchar(20),
    `username` varchar(20),
    `status_dark_blog_user` int(11),
    PRIMARY KEY  (`id_dark_blog_user`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 

$sql[]  = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'dark_blog_user_views` (
    `id_dark_blog_user_views` int(11) NOT NULL AUTO_INCREMENT,
    `id_dark_blog_user` int(11),
    `id_dark_blog_posts` int(11),
    PRIMARY KEY  (`id_dark_blog_user_views`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'; 


foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}