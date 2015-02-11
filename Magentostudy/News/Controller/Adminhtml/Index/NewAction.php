<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magentostudy\News\Controller\Adminhtml\Index;

class NewAction extends \Magento\Backend\App\Action
{
    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magentostudy_News::save');
    }

    /**
     * Forward to edit
     *
     * @return void
     */
    public function execute()
    {
        $this->_forward('edit');
    }
}
