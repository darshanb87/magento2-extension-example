<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/* @var $installer \Magento\Setup\Module\SetupModule */

$installer = $this;
$installer->startSetup();

/**
 * Creating table magentostudy_news
 */
$table = $installer->getConnection()->newTable(
    $installer->getTable('magentostudy_news')
)->addColumn(
    'news_id',
    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
    null,
    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
    'Entity Id'
)->addColumn(
    'title',
    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    255,
    ['nullable' => true],
    'News Title'
)->addColumn(
    'author',
    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    255,
    ['nullable' => true,'default' => null],
    'Author'
)->addColumn(
    'content',
    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    '2M',
    ['nullable' => true,'default' => null],
    'Content'
)->addColumn(
    'image',
    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
    null,
    ['nullable' => true,'default' => null],
    'News image media path'
)->addColumn(
    'created_at',
    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
    null,
    ['nullable' => false],
    'Created At'
)->addColumn(
    'published_at',
    \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
    null,
    ['nullable' => true,'default' => null],
    'World publish date'
)->addIndex(
    $installer->getIdxName(
        'magentostudy_news',
        ['published_at'],
        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_INDEX
    ),
    ['published_at'],
    ['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_INDEX]
)->setComment(
    'News item'
);
$installer->getConnection()->createTable($table);
$installer->endSetup();