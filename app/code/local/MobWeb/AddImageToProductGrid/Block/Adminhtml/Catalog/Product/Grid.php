<?php
class MobWeb_AddImageToProductGrid_Block_Adminhtml_Catalog_Product_Grid extends Mage_Adminhtml_Block_Catalog_Product_Grid
{
    public function setCollection($collection)
    {
        $store = $this->_getStore();

        if ($store->getId() && !isset($this->_joinAttributes['image'])) {
            $collection->joinAttribute(
                'image',
                'catalog_product/image',
                'entity_id',
                null,
                'left',
                $store->getId()
            );
        }
        else {
            $collection->addAttributeToSelect('image');
        }

        parent::setCollection($collection);
    }
    
    protected function _prepareColumns()
    {
        $this->addColumnAfter('image', array(
            'header' => Mage::helper('catalog')->__('Image'),
            'align' => 'left',
            'index' => 'image',
            'width'     => '70',
            'renderer' => 'MobWeb_AddImageToProductGrid_Block_Adminhtml_Template_Grid_Renderer_Image'
        ), 'entity_id');

        return parent::_prepareColumns();
    }
}