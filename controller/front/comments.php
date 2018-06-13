<?php
class MiCosoCommentsModuleFrontController extends ModuleFrontController{
    public function initList(){
        $this->setTemplate('list.tpl');
        $comments=Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'mymod_comment` WHERE `id_product` = '.(int)$this->product->id.' ORDER BY `date_add` DESC');
        $this->context->smarty->assign('comments', $comments);
		$this->context->smarty->assign('product', $this->product);
		$this->context->smarty->assign('page', $page);
		$this->context->smarty->assign('nb_pages', $nb_pages);
    }
    public function initContent()
	{
        parent::initContent();
        $id_product=(int) Tools::getValue('id_product');
        $module_action=Tools::getValue('module_action');
		$actions_list= array(
            'list'=>'initList'
        );
        if ($id_product>0 && isset($actions_list[$module_action])) {
            $this->$actions_list[$module_action]();
        }
	}
}
