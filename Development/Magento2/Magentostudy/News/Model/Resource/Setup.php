<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magentostudy\News\Model\Resource;

/**
 * News resource setup
 */
class Setup extends \Magento\Framework\Module\DataSetup
{
    /**
     * News factory
     *
     * @var \Magentostudy\News\Model\NewsFactory
     */
    protected $_newsFactory;

    /**
     * @param \Magento\Framework\Module\Setup\Context $context
     * @param string $resourceName
     * @param \Magentostudy\News\Model\NewsFactory $newsFactory
     * @param string $moduleName
     * @param string $connectionName
     */
    public function __construct(
        \Magento\Framework\Module\Setup\Context $context,
        $resourceName,
        \Magentostudy\News\Model\NewsFactory $newsFactory,
        $moduleName = 'Magentostudy_News',
        $connectionName = \Magento\Framework\Module\Updater\SetupInterface::DEFAULT_SETUP_CONNECTION
    ) {
        $this->_newsFactory = $newsFactory;
        parent::__construct($context, $resourceName, $moduleName, $connectionName);
    }

    /**
     * Create news
     *
     * @return \Magentostudy\News\Model\News
     */
    public function createNews()
    {
        return $this->_newsFactory->create();
    }
}
