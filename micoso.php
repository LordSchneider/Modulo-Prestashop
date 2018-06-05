<?php
    class MiCoso extends Module
    {
        public function install(){
            parent::install();
            $sql_file=dirname(__FILE__).'/install/install.sql';
            $this->loadSQLFile($sql_file);
            $this->registerHook('displayProductTabContent');
            if (!parent::install()) {
                return false;
            }
            $sql_file=dirname(__FILE__).'/install/install.sql';
            if (!$this->loadSQLFile($sql_file)) {
                return false;
            }
            if (!$this->registerHook('displayProductTabContent')) {
                return false;
            }
            Configuration::updateValue('MYMOD_GRADES','1');
            Configuration::updateValue('MYMOD_COMMENTS','1');
            return true;
        }

        public function __construct()
        {
            $this->name='Micoso';
            $this->tab='front_office_features';
            $this->displayName='Modulo de pruebas';
            $this->version='1.0';
            $this->author='Ignacio Casado';
            $this->description='Modulo de prueba';
            $this->bootstrap=true;
            parent::__construct();
        }
        public function processConfiguration(){
            if (Tools::isSubmit('my_form')){
                $enable_grades=Tools::getValue('enable_grades');
                $enable_comments=Tools::getValue('enable_comments');
                Configuration::updateValue('MYMOD_GRADES',$enable_grades);
                Configuration::updateValue('MYMOD_COMMENTS',$enable_comments);
                $this->context->smarty->assign('confirmation', 'ok');
            }
        }
        public function assignConfiguration(){
            $enable_grades=Configuration::get('MYMOD_GRADES');
            $enable_comments=Configuration::get('MYMOD_COMMENTS');
            $this->context->smarty->assign('enable_grades',$enable_grades);
            $this->context->smarty->assign('enable_comments',$enable_comments);
            
        }
        public function getContent(){
            $this->processConfiguration();
            $this->assignConfiguration();
            return $this->display(__FILE__,'getContent.tpl');
        }
        public function hookDisplayProductTabContent($params){
            return $this->display(__FILE__,'displayProductTabContent.tpl');
        }
        public function DisplayProductTabContent(){
            if (Tools::isSubmit('mymod_pc_submit_comment')) {
                $id_produc=Tools::getValue('id_product');
                $grade=Tools::getValue('grade');
                $comment=Tools::getValue('comment');
                $insert=array(
                    'id_product'=>(int) $id_produc,
                    'grade'=>(int) $grade,
                    'comment'=>pSQL($comment),
                    'date_add'=>date('Y-m-d-H:i:s'),
                );
                
                Db::getInstance()->insert('mymod_comment',$insert);
            }
        }
        public function assignProductTabContent(){
            $enable_grades=Configuration::get('MYMOD_GRADES');
            $enable_comments=Configuration::get('MYMOD_COMMENTS');
            $id_produc=Tools::getValue('id_product');
            $comment=Db::getInstace()->executeS('SELECT * FROM '._DB_PREFIX_.'mymod_comment WHERE id_product = '.(int)$id_produc);
            $this->context->smarty->assign('enable_grades',$enable_grades);
            $this->context->smarty->assign('enable_comments',$enable_comments);
            $this->context->smarty->assign('comments',$comment);
            $this->context->controller->addCSS($this->_path.'views/css/micoso.css','all');
            $this->context->controller->addJS($this->_path.'views/js/micoso.js','all');
            $this->context->smarty->assign('enable_comments',$enable_comments);
            $this->context->smarty->assign('comments',$comment);
            Db::getInstance()->insert('mymod_comment',$insert);
            $this->context->smarty->assign('new_comment_posted','true');
        }
        public function uninstall(){
            if (!parent::uninstall()) {
                return false;
            }
            $sql_file=dirname(__FILE__).'/install/uninstall.sql';
            if (!$this->loadSQLFile($sql_file)) {
                return false;
            }
            Configuration::deleteByName('MYMOD_GRADES');
            Configuration::deleteByName('MYMOD_COMMENTS');
            return true;
        }
        public function loadSQLFile($sql_file){
            $sql_content=file_get_contents($sql_file);
            $sql_content=str_replace('PREFIX_','_DB_PREFIX',$sql_content);
            $sql_request=preg_split("/;\s*[\r\n]+/",$sql_content);
            $result=true;
            if (!empty($request)) {
                $result &=Db::getInstance()->execute(trim($request));
                return $result;
            }
        }
    }
