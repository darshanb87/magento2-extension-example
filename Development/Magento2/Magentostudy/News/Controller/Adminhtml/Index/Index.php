<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magentostudy\News\Controller\Adminhtml\Index;

class Index extends \Magento\Backend\App\Action
{
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
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'Magentostudy_News::news_manage'
        )->_addBreadcrumb(
            __('News'),
            __('News')
        )->_addBreadcrumb(
            __('Manage News'),
            __('Manage News')
        );
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('News'));
        $this->_view->renderLayout();
    }
}
