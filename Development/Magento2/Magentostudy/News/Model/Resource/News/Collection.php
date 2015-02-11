<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/**
 * Directory Country Resource Collection
 */
namespace Magentostudy\News\Model\Resource\News;

class Collection extends \Magento\Framework\Model\Resource\Db\Collection\AbstractCollection
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magentostudy\News\Model\News', 'Magentostudy\News\Model\Resource\News');
    }
}
