<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <DARK SIDE TEAM> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Poul-Henning Kamp
 * ----------------------------------------------------------------------------
 */
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