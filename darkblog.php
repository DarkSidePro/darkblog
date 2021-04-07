<?php
/**
* 2007-2020 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2020 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once('vendor/autoload.php');
require_once('src/Controller/DemoController.php');

use DarkSidePro\DarkBlog\Entity\DarkBlogTest;


class DarkBlog extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'darkblog';
        $this->tab = 'seo';
        $this->version = '1.0.0';
        $this->author = 'Dark-Side.pro';
        $this->need_instance = 1;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('DS: Products Blog');
        $this->description = $this->l('This module add blog to your store');

        $this->confirmUninstall = $this->l('Are you sure?');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    private function createTab()
    {
        $response = true;
        $parentTabID = Tab::getIdFromClassName('AdminDarkSideMenu');
        if ($parentTabID) {
            $parentTab = new Tab($parentTabID);
        } else {
            $parentTab = new Tab();
            $parentTab->active = 1;
            $parentTab->name = array();
            $parentTab->class_name = "AdminDarkSideMenu";
            foreach (Language::getLanguages() as $lang) {
                $parentTab->name[$lang['id_lang']] = "Dark-Side.pro";
            }
            $parentTab->id_parent = 0;
            $parentTab->module = '';
            $response &= $parentTab->add();
        }
        $parentTab_2ID = Tab::getIdFromClassName('AdminDarkSideMenuSecond');
        if ($parentTab_2ID) {
            $parentTab_2 = new Tab($parentTab_2ID);
        } else {
            $parentTab_2 = new Tab();
            $parentTab_2->active = 1;
            $parentTab_2->name = array();
            $parentTab_2->class_name = "AdminDarkSideMenuSecond";
            foreach (Language::getLanguages() as $lang) {
                $parentTab_2->name[$lang['id_lang']] = "Dark-Side Config";
            }
            $parentTab_2->id_parent = $parentTab->id;
            $parentTab_2->module = '';
            $response &= $parentTab_2->add();
        }
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = "AdminSettings";
        $tab->name = array();
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['id_lang']] = "DS: Blog";
        }
        $tab->id_parent = $parentTab_2->id;
        $tab->module = $this->name;
        $response &= $tab->add();
        
        /*$tab = new Tab();
        $tab->active = 1;
        $tab->class_name = "AdminCategory";
        $tab->name = array();
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['id_lang']] = "DS: Blog Category";
        }
        $tab->id_parent = $parentTab_2->id;
        $tab->module = $this->name;
        $response &= $tab->add();

        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = "AdminPosts";
        $tab->name = array();
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['id_lang']] = "DS: Blog Posts";
        }
        $tab->id_parent = $parentTab_2->id;
        $tab->module = $this->name;
        $response &= $tab->add();

        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = "AdminComments";
        $tab->name = array();
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['id_lang']] = "DS: Blog Comments";
        }
        $tab->id_parent = $parentTab_2->id;
        $tab->module = $this->name;
        $response &= $tab->add();

        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = "AdminTags";
        $tab->name = array();
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['id_lang']] = "DS: Blog Tags";
        }
        $tab->id_parent = $parentTab_2->id;
        $tab->module = $this->name;
        $response &= $tab->add();*/
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = "AdminTest";
        $tab->name = array();
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['id_lang']] = "DS: Test";
        }
        $tab->id_parent = $parentTab_2->id;
        $tab->module = $this->name;
        $response &= $tab->add();
        return $response;
    }

    private function tabRem()
    {
        $id_tab = Tab::getIdFromClassName('AdminSettings');
        if ($id_tab) {
            $tab = new Tab($id_tab);
            $tab->delete();
        }

        /*$id_tab = Tab::getIdFromClassName('AdminTags');
        if ($id_tab) {
            $tab = new Tab($id_tab);
            $tab->delete();
        }

        $id_tab = Tab::getIdFromClassName('AdminComments');
        if ($id_tab) {
            $tab = new Tab($id_tab);
            $tab->delete();
        }

        $id_tab = Tab::getIdFromClassName('AdminPosts');
        if ($id_tab) {
            $tab = new Tab($id_tab);
            $tab->delete();
        }

        $id_tab = Tab::getIdFromClassName('AdminCategory');
        if ($id_tab) {
            $tab = new Tab($id_tab);
            $tab->delete();
        }*/


        $parentTab_2ID = Tab::getIdFromClassName('AdminDarkSideMenuSecond');
        if ($parentTab_2ID) {
            $tabCount_2 = Tab::getNbTabs($parentTab_2ID);
            if ($tabCount_2 == 0) {
                $parentTab_2 = new Tab($parentTab_2ID);
                $parentTab_2->delete();
            }
        }
        $parentTabID = Tab::getIdFromClassName('AdminDarkSideMenu');
        if ($parentTabID) {
            $tabCount = Tab::getNbTabs($parentTabID);
            if ($tabCount == 0) {
                $parentTab = new Tab($parentTabID);
                $parentTab->delete();
            }
        }
        return true;
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('DSBLOG_LIVE_MODE', false);

        include(dirname(__FILE__).'/sql/install.php');

        $this->createTab();

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('displayHome') &&
            $this->registerHook('registerGDPRConsent') &&
            $this->registerHook('actionDeleteGDPRCustomer') &&
            $this->registerHook('actionExportGDPRData') &&
            $this->registerHook('displayCustomerAccount') &&
            $this->registerHook('displayProductTab') &&
            $this->registerHook('displayFooterProduct') &&
            $this->registerHook('displayProductTabContent') && 
            $this->registerHook('actionAdminTagsFormModifier');
    }

    public function uninstall()
    {
        Configuration::deleteByName('DSBLOG_LIVE_MODE');

        $this->tabRem();

        include(dirname(__FILE__).'/sql/uninstall.php');

        return parent::uninstall();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {           
        if (((bool)Tools::isSubmit('submitDsblogModule')) == true) {
            $this->postProcess();
        }  

        $id_lang = Context::getContext()->language->id;
        $id_shop = Context::getContext()->shop->id;
        $blogCategory = new PrestaShopCollection('BlogPosts', $id_lang);
        //$blogCategory -> join('dupa');
        $hardLimit = 3;
        //$blogResultCategoryTest = $blogCategory->getAll(TRUE);
        //var_dump($blogResultCategoryTest);
        $blogResultCategory = $blogCategory->getResults();
        $arrayTest[] = array();
        foreach (array_slice($blogResultCategory, 0, $hardLimit)  as $chuj) {
            $arrayTest[] = [
                'id_dsblogposts' => $chuj->id_dsblogposts,
                'content' => $chuj->content
            ];
        }

        var_dump($arrayTest);



        //var_dump($id_shop);


      // $blogCategory->where('id_shop'. '='. strval($id_shop));

   // $blogCategory->sqlWhere('a1.id_shop = '.$id_shop);

      //  $blogResultCategory = $blogCategory->getResults();

  





/*
        $id_lang = Context::getContext()->language->id;
        $id_shop = Context::getContext()->shop->id;

        $dupa = new PrestaShopCollection('BlogPost', (int) $id_lang);


        var_dump($dupa);

        $dupa1 = $dupa->getResults();
        foreach ($dupa1 as $chuj) {
            $arrayTest['id'] = $chuj->id;
            $arrayTest['name'] = $chuj->name;
        }



        /*

        $id_lang=Language::getLanguages(true);

        var_dump($id_lang);


          /*
        
        $id_lang=(int)Context::getContext()->language->id;
        $start=0;
        $limit=100;
        $order_by='id_product';
        $order_way='DESC';
        $id_category = false; 
        $only_active =true;
        $context = null;

        $product = new Product;

        $all_products = ($product->getProducts($id_lang, $start, $limit, $order_by, $order_way, $id_category, $only_active ,$context));

        $arrayTags = array();
        foreach ($all_products as $temp) {
            $arrayTags[] = [ 'id' => 'on', 'name' =>$temp['name'], 'val' => $temp['id_product']];
        }

        var_dump($arrayTags);

        /*


        
        $id_lang = Context::getContext()->language->id;
        
        //$categories = new PrestaShopCollection('Category', $id_lang);


        $zmienna = new PrestaShopCollection('BlogCategory', (int) $id_lang);

        var_dump($id_lang);

        $test = $zmienna->getResults();
        foreach ($test as $gender) {
            $arrayTest['id'] = $gender->id;
            $arrayTest['name'] = $gender->name;
        }

        var_dump($arrayTest);

        */

        $this->context->smarty->assign('module_dir', $this->_path);

        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        return $output.$this->renderForm();
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitDsblogModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                'title' => $this->l('Settings'),
                'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Live mode'),
                        'name' => 'DSBLOG_LIVE_MODE',
                        'is_bool' => true,
                        'desc' => $this->l('Use this module in live mode'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-envelope"></i>',
                        'desc' => $this->l('Enter a valid email address'),
                        'name' => 'DSBLOG_ACCOUNT_EMAIL',
                        'label' => $this->l('Email'),
                    ),
                    array(
                        'type' => 'password',
                        'name' => 'DSBLOG_ACCOUNT_PASSWORD',
                        'label' => $this->l('Password'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        return array(
            'DSBLOG_LIVE_MODE' => Configuration::get('DSBLOG_LIVE_MODE', true),
            'DSBLOG_ACCOUNT_EMAIL' => Configuration::get('DSBLOG_ACCOUNT_EMAIL', 'contact@prestashop.com'),
            'DSBLOG_ACCOUNT_PASSWORD' => Configuration::get('DSBLOG_ACCOUNT_PASSWORD', null),
        );
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
    public function hookBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name) {
            $this->context->controller->addJS($this->_path.'views/js/back.js');
            $this->context->controller->addCSS($this->_path.'views/css/back.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
    }

    public function hookDisplayHome()
    {
        /* Place your code here. */
    }

    public function actionAdminTagsFormModifier(){
        return array(
            'object' => 'BlogTags',
            'fields' => 'created_at',
            'fields_value' => new DataTime(),
        );
    }

}
