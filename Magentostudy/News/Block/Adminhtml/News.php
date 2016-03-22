<?php
namespace Magentostudy\News\Block\Adminhtml;

class News extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_news';
        $this->_blockGroup = 'Magentostudy_News';
        $this->_headerText = __('News');
        $this->_addButtonLabel = __('Add New News');
        parent::_construct();
        if ($this->_isAllowedAction('Magentostudy_News::save')) {
            $this->buttonList->update('add', 'label', __('Add New News'));
        } else {
            $this->buttonList->remove('add');
        }
    }
    
    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
