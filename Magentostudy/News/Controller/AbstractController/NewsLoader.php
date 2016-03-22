<?php
namespace Magentostudy\News\Controller\AbstractController;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Registry;

class NewsLoader implements NewsLoaderInterface
{
    /**
     * @var \Magentostudy\News\Model\NewsFactory
     */
    protected $newsFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $url;

    /**
     * @param \Magentostudy\News\Model\NewsFactory $newsFactory
     * @param OrderViewAuthorizationInterface $orderAuthorization
     * @param Registry $registry
     * @param \Magento\Framework\UrlInterface $url
     */
    public function __construct(
        \Magentostudy\News\Model\NewsFactory $newsFactory,
        Registry $registry,
        \Magento\Framework\UrlInterface $url
    ) {
        $this->newsFactory = $newsFactory;
        $this->registry = $registry;
        $this->url = $url;
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return bool
     */
    public function load(RequestInterface $request, ResponseInterface $response)
    {
        $newsId = (int)$request->getParam('id');
        if (!$newsId) {
            $request->initForward();
            $request->setActionName('noroute');
            $request->setDispatched(false);
            return false;
        }

        $news = $this->newsFactory->create()->load($newsId);
        $this->registry->register('current_news', $news);
        return true;
    }
}
