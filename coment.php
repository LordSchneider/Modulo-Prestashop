<?php
class MyModCommentsCommentsModuleFrontController extends ModuleFrontController{
    public function initList(){
        $comments=Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'mymod_comment` WHERE `id_product` = '.(int)$this->product->id.' ORDER BY `date_add` DESC');
        $this->context->smarty->assign('comments', $comments);
		$this->context->smarty->assign('product', $this->product);
		$this->context->smarty->assign('page', $page);
		$this->context->smarty->assign('nb_pages', $nb_pages);
        $this->setTemplate('list.tpl');
    }
    public function initContent()
	{
		parent::initContent();
		$actions_list = array('list' => 'initList');
		$id_product = (int)Tools::getValue('id_product');
		$module_action = Tools::getValue('module_action');
		$this->product = new Product((int)$id_product, false, $this->context->cookie->id_lang);
		if ($id_product > 0 && isset($actions_list[$module_action]))
			$this->$actions_list[$module_action]();
	}
}