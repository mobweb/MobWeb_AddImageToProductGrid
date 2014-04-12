<?php 
class MobWeb_AddImageToProductGrid_Block_Adminhtml_Template_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $img = $row->getData($this->getColumn()->getIndex());
        if($img && strpos($img, 'no_selection') !== 0) {
            return sprintf('<img src="%s" width="60px" />', Mage::getBaseUrl('media') . 'catalog/product' . $img);
        }

        return '';
    }
}