<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magentostudy\News\Block;

/**
 * News content block
 */
class News extends \Magento\Framework\View\Element\Template
{
    /**
     * News collection
     *
     * @var Magentostudy\News\Model\Resource\News\Collection
     */
    protected $_newsCollection = null;
    
    /**
     * Page factory
     *
     * @var \Magento\Cms\Model\PageFactory
     */
    protected $_newsCollectionFactory;
    
    /** @var \Magentostudy\News\Helper\Data */
    protected $_dataHelper;
    
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magentostudy\News\Model\Resource\News\CollectionFactory $newsCollectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magentostudy\News\Model\Resource\News\CollectionFactory $newsCollectionFactory,
        \Magentostudy\News\Helper\Data $dataHelper,
        array $data = []
    ) {
        $this->_newsCollectionFactory = $newsCollectionFactory;
        $this->_dataHelper = $dataHelper;
        parent::__construct(
            $context,
            $data
        );
    }
    
    /**
     * Retrieve news collection
     *
     * @return Magentostudy_News_Model_Resource_News_Collection
     */
    protected function _getCollection()
    {
        $collection = $this->_newsCollectionFactory->create();
        return $collection;
    }
    
    /**
     * Retrieve prepared news collection
     *
     * @return Magentostudy_News_Model_Resource_News_Collection
     */
    public function getCollection()
    {
        if (is_null($this->_newsCollection)) {
            $this->_newsCollection = $this->_getCollection();
            //$this->_newsCollection->prepareForList($this->getCurrentPage());
        }

        return $this->_newsCollection;
    }
    
    /**
     * Fetch the current page for the news list
     *
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->getData('current_page') ? $this->getData('current_page') : 1;
    }
    
    /**
     * Return URL to item's view page
     *
     * @param Magentostudy_News_Model_News $newsItem
     * @return string
     */
    public function getItemUrl($newsItem)
    {
        return $this->getUrl('*/*/view', array('id' => $newsItem->getId()));
    }
    
    /**
     * Return URL for resized News Item image
     *
     * @param Magentostudy_News_Model_News $item
     * @param integer $width
     * @return string|false
     */
    public function getImageUrl($item, $width)
    {
        return $this->_dataHelper->resize($item, $width);
    }
}
