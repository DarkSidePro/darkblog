<?php

// modules/your-module/src/Controller/DemoController.php
    
namespace DarkBlog\Controller;
    
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;

class DemoController extends FrameworkBundleAdminController
{
    public function demoAction()
    {
        ECHO 'Prestashopy to chuje';
        //return $this->render('@Modules/your-module/templates/admin/demo.html.twig');
    }
}