<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magentostudy\News\Model\Resource\News\Grid;

/**
 * News collection
 *
 * Class Collection
 */
class Collection extends \Magento\Framework\Model\Resource\Db\Collection\AbstractCollection
{
    
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magentostudy\News\Model\News', 'Magentostudy\News\Model\Resource\News');
        $this->_map['fields']['news_id'] = 'main_table.news_id';
    }
}