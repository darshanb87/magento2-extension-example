<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */


/**
 * Customer Widget Form Image File Element Block
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Magentostudy\News\Block\Adminhtml\Form\Element;

class Image extends Magento\Framework\Data\Form\Element\Image
{ 
    /**
     * Get image preview url
     *
     * @return string
     */
    protected function _getUrl()
    {
        return $this->getValue();
    }
}
