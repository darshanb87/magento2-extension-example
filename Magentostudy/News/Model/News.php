<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magentostudy\News\Model;

use Magento\Framework\Object\IdentityInterface;

/**
 * News Model
 *
 * @method \Magento\Cms\Model\Resource\Page _getResource()
 * @method \Magento\Cms\Model\Resource\Page getResource()
 */
class News extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Configuration paths for email templates and identities
     */
    const XML_PATH_NEWS_EMAIL_TEMPLATE = 'news/email/email_template';
    
    const XML_PATH_NEWS_EMAIL_IDENTITY = 'news/email/sender_email_identity';
    
    /**
     * @var \Magento\Customer\Model\Resource\Customer\CollectionFactory
     */
    protected $_customersFactory;
    
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;
    
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;
    
    /**
     * @var \Magento\Framework\Mail\Template\TransportBuilder
     */
    protected $_transportBuilder;
    
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magentostudy\News\Model\Resource\News');
    }

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param Customer\CollectionFactory $customersFactory
     * @param \Magento\Framework\Model\Resource\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\Db $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
        \Magento\Customer\Model\Resource\Customer\CollectionFactory $customersFactory,
        \Magento\Framework\Model\Resource\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\Db $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
        $this->_customersFactory = $customersFactory;
        $this->_storeManager = $storeManager;
        $this->_scopeConfig = $scopeConfig;
        $this->_transportBuilder = $transportBuilder;
    }
    
    /**
     * send News in email to all customers
     *
     * @return $this
     */
    public function sendNews()
    {
        $newsCollection = $this->getCollection();
        foreach ($newsCollection as $news) {
            
            /** @var $collection \Magento\Customer\Model\Resource\Customer\Collection */
            $customerCollection = $this->_customersFactory->create();
            foreach ($customerCollection as $customer) {
                $storeId = $customer->getStoreId();

                $templateParams = ['news' => $news, 'store' => $this->getStore($storeId)];
                
                /** @var \Magento\Framework\Mail\TransportInterface $transport */
                $transport = $this->_transportBuilder->setTemplateIdentifier(
                    $this->_scopeConfig->getValue(self::XML_PATH_NEWS_EMAIL_TEMPLATE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId)
                )->setTemplateOptions(
                    ['area' => \Magento\Framework\App\Area::AREA_FRONTEND, 'store' => $storeId]
                )->setTemplateVars(
                    $templateParams
                )->setFrom(
                    $this->_scopeConfig->getValue(self::XML_PATH_NEWS_EMAIL_IDENTITY, \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId)
                )->addTo(
                    $customer->getEmail(),
                    $customer->getFirstname().' '.$customer->getLastname()
                )->getTransport();
                $transport->sendMessage();
            }
        }
        
        return $this;
    }
    
    /**
     * Retrieve store where customer was created
     *
     * @return \Magento\Store\Model\Store
     */
    public function getStore($storeId)
    {
        return $this->_storeManager->getStore($storeId);
    }
}
