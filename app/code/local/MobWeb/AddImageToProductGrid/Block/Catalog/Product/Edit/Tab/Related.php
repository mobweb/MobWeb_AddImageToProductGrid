<?php
class MobWeb_AddImageToProductGrid_Block_Catalog_Product_Edit_Tab_Related extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Related
{
    public function setCollection($collection)
    {
        $storeId = (int) $this->getRequest()->getParam('store', 0);
        $store = Mage::app()->getStore($storeId);
        
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
        $this->addColumn('image', array(
            'header' => Mage::helper('catalog')->__('Image'),
            'align' => 'left',
            'index' => 'image',
            'width'     => '70',
            'renderer' => 'MobWeb_AddImageToProductGrid_Block_Adminhtml_Template_Grid_Renderer_Image'
        ));

        return parent::_prepareColumns();
    }
}