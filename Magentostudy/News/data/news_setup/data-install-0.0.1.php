<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/* @var $this \Magento\Customer\Model\Resource\Setup */
$installer = $this;
$installer->startSetup();
/**
 * @var $model Magentostudy_News_Model_News
 */

// Set up data rows
$dataRows = [
    [
        'title'          => 'News Article 1',
        'author'         => 'Darshan Bhavsar',
        'published_at'   => '2015-02-11',
        'content'        => '<p><p>News Article 1. News Article 1. News Article 1.</p>',
    ],
    [
        'title'          => 'News Article 2',
        'author'         => 'Darshan Bhavsar',
        'published_at'   => '2015-02-11',
        'content'        => '<p>News Article 2. News Article 2. News Article 2.</p>'
    ],
    [
        'title'          => 'News Article 3',
        'author'         => 'Darshan Bhavsar',
        'published_at'   => '2015-02-11',
        'content'        => '<p>News Article 3. News Article 3. News Article 3.</p>'
    ],
];

// Generate news items
foreach ($dataRows as $data) {
    $this->createNews()->setData($data)->save();
}
