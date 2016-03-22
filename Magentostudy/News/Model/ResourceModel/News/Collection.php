<?php
/**
 * News Resource Collection
 */
namespace Magentostudy\News\Model\ResourceModel\News;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magentostudy\News\Model\News', 'Magentostudy\News\Model\ResourceModel\News');
    }
}
