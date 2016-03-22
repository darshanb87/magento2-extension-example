<?php
namespace Magentostudy\News\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
	/**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
	
    /**
     * Check the permission to run it
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magentostudy_News::news_manage');
    }

    /**
     * News List action
     *
     * @return void
     */
    public function execute()
    {
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(
            'Magentostudy_News::news_manage'
        )->addBreadcrumb(
            __('News'),
            __('News')
        )->addBreadcrumb(
            __('Manage News'),
            __('Manage News')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('News'));
		return $resultPage;
    }
}
