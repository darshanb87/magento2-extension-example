<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magentostudy\News\Controller\AbstractController;

use Magento\Framework\App\Action;

abstract class View extends Action\Action
{
    /**
     * @var \Magentostudy\News\Controller\AbstractController\NewsLoaderInterface
     */
    protected $newsLoader;

    /**
     * @param Action\Context $context
     * @param OrderLoaderInterface $orderLoader
     */
    public function __construct(Action\Context $context, NewsLoaderInterface $newsLoader)
    {
        $this->newsLoader = $newsLoader;
        parent::__construct($context);
    }

    /**
     * News view page
     *
     * @return void
     */
    public function execute()
    {
        if (!$this->newsLoader->load($this->_request, $this->_response)) {
            return;
        }

        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}
