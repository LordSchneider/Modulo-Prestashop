<?php
    class MiCoso extends Module
    {
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
            if (Tools::isSubmit('mymod_pc_form')){
                $enable_grades=Tools::getValue('enable_grades');
                $enable_comments=Tools::('enable_comments');
                Configuration::updateValue('MYMOD_GRADES',$enable_grades);
                Condifuration::updateValue('MYMOD_COMMENTS',$enable_comments);
                $this->context->smarty->assign('confirmation','ok');
            }
        }
        public function getContent(){
            return $this->display(__FILE__,'getContent.tpl');
        }
    }
