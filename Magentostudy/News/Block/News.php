<?php
namespace Magentostudy\News\Block;

/**
 * News content block
 */
class News extends \Magento\Framework\View\Element\Template
{
    /**
     * News collection
     *
     * @var Magentostudy\News\Model\ResourceModel\News\Collection
     */
    protected $_newsCollection = null;
    
    /**
     * News factory
     *
     * @var \Magentostudy\News\Model\NewsFactory
     */
    protected $_newsCollectionFactory;
    
    /** @var \Magentostudy\News\Helper\Data */
    protected $_dataHelper;
    
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magentostudy\News\Model\Resource\News\CollectionFactory $newsCollectionFactory
	 * @param \Magentostudy\News\Helper\Data $dataHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magentostudy\News\Model\ResourceModel\News\CollectionFactory $newsCollectionFactory,
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
     * @return Magentostudy_News_Model_ResourceModel_News_Collection
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
            $this->_newsCollection->setCurPage($this->getCurrentPage());
            $this->_newsCollection->setPageSize($this->_dataHelper->getNewsPerPage());
            $this->_newsCollection->setOrder('published_at','asc');
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
    
    /**
     * Get a pager
     *
     * @return string|null
     */
    public function getPager()
    {
        $pager = $this->getChildBlock('news_list_pager');
        if ($pager instanceof \Magento\Framework\Object) {
            $newsPerPage = $this->_dataHelper->getNewsPerPage();

            $pager->setAvailableLimit([$newsPerPage => $newsPerPage]);
            $pager->setTotalNum($this->getCollection()->getSize());
            $pager->setCollection($this->getCollection());
            $pager->setShowPerPage(TRUE);
            $pager->setFrameLength(
                $this->_scopeConfig->getValue(
                    'design/pagination/pagination_frame',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                )
            )->setJump(
                $this->_scopeConfig->getValue(
                    'design/pagination/pagination_frame_skip',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                )
            );

            return $pager->toHtml();
        }

        return NULL;
    }
}
