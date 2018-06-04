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
        public function getContent(){
            return $this->display(__FILE__,'getContent.tpl');
        }
    }