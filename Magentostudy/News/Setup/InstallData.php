<?php

namespace Magentostudy\News\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{

	/**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

// Set up data rows
$dataRows = [
    [
        'title'          => 'Magento Developer Certification Exams Now Available Worldwide',
        'author'         => 'Beth Gomez',
        'published_at'   => '2011-12-22',
        'content'        => '<p>In October, Magento launched the beta version of the Magento Certified Developer exam. Dozens of experienced Magento developers flocked to the X.commerce Innovate 2011 Conference &ndash; and to several other beta exam locations around the world &ndash; to take the exam. Many of them earned passing grades, becoming the world&rsquo;s first Magento Certified Developers.<br /><br />With the successful beta behind us, we are excited to announce the global launch of our Certification program. <strong>Now, developers can take the Magento Certified Developer exam at over 5,000 Prometric Testing Centers worldwide.</strong><br /><br />Find out how to register, prepare for, and take the certification exam on the Magento U Certification website.<br /><br /><strong>What you should know about Magento Developer Certification:</strong><br /><br /></p>
<ul>
<li>Magento Developer Certification is the first and only Magento-sponsored and approved professional certification program.</li>
<li>Magento Developer Certification Exams were developed by a team of experts from across the Magento ecosystem to accurately test and verify real-world development skills.</li>
<li>Developers who pass the exam can differentiate themselves in the marketplace by using the Magento Developer Certification badge on their resume/CV, and &ndash; starting in early 2012 &ndash; by listing themselves in the Magento Certification directory, a key resource for finding and verifying Magento Certified Developers. </li>
</ul>
<p><br />We&rsquo;ve made it easy for developers to purchase vouchers, download study guides, and register to take the exam. Visit the Magento U Certification website to learn more about Magento Developer Certification and how it can help your business.</p>',
    ],
    [
        'title'          => 'Introducing Magento Enterprise Premium!',
        'author'         => 'Pedram Yasharel',
        'published_at'   => '2011-11-23',
        'content'        => '<p>We have just launched the Magento Enterprise Premium package, the ultimate packaged solution for large-scale eCommerce implementations. This package has been tailored specifically for large-scale eCommerce implementations that need the scale, expertise and support necessary to run a high volume business.<br /><br />Here are the components we are pleased to offer, as part of this new, premium solution:<br /><br /></p>
<ul>
<li>Multiple Magento Enterprise licenses - 2 production and 1 development license</li>
<li>Platinum level SLA Magento Support with live 24x7 phone support</li>
<li>Magento Expert Consulting - architectural advisory and comprehensive code review dedicated to your business needs</li>
<li>Training course &ldquo;eCommerce with Magento&rdquo;</li>
</ul>
<p><br />With this new package, merchants get the advantage of the best-in-class features of Magento Enterprise, such as multi-store fronts with a single admin interface, persistent shopping cart, RMA, private sales, marketing and merchandising tools and so much more, all with the added support, consulting, training and scalability to meet the needs of your eCommerce business.<br /><br />We are very excited to offer this and invite you to learn more about this new, premium offering.</p>'
    ],
    [
        'title'          => 'Magento Supports Facebook Open Graph 2.0!',
        'author'         => 'Baruch Toledano',
        'published_at'   => '2011-10-18',
        'content'        => '<p>The advantage of Facebook as a marketing tool for your online store just became a lot more powerful. Magento has introduced support for the new <strong>&ldquo;Want&rdquo;</strong> and <strong>&ldquo;Own&rdquo;</strong> Facebook buttons, driving social based traffic for all Magento online stores. The social buttons can be easily installed on product and catalog pages and are provided as a Magento <a title="core" href="http://www.magentocommerce.com/magento-connect/Magento+Core/extension/8041/social_facebook" target="_blank">core</a> extension for Magento Community and Enterprise.<br /><br />Customers can now express themselves better than ever by adding items they &ldquo;Want&rdquo; on their Facebook pages for everyone to see and buy for them). Wish lists and Facebook profiles can now be closely linked.<br />&nbsp;<br />With the &ldquo;Own&rdquo; button marketing goes organic as consumers showcase items they are proud to own. Your customers become an extension of your marketing efforts as they are now able to answer questions, write reviews and provide recommendations on the products they own.<br /><br />Magento is the first eCommerce platform to offer integration for the &ldquo;Want&rdquo; and &ldquo;Own&rdquo; buttons with the Facebook Open Graph 2.0 extension. Give your products and your business the latest Facebook connection.</p>'
    ],
];

		// Generate news items
		foreach ($dataRows as $data) {
			//$this->createNews()->setData($data)->save();
			$setup->getConnection()->insert($setup->getTable('magentostudy_news'), $data);
		}
	}
}