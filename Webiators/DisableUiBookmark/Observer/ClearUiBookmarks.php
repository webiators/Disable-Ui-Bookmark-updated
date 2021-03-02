<?php
/**
 * @category   Webiators
 * @package    Webiators_DisableUiBookmark
 * @author     Webiators Team
 * @copyright  Copyright (c) Webiators Technologies. ( https://webiators.com ).
 */

namespace Webiators\DisableUiBookmark\Observer;

use Magento\Framework\Event\ObserverInterface;

class ClearUiBookmarks implements ObserverInterface
{
    public function __construct(
        \Magento\Ui\Model\Bookmark $bookmark
    ) {
        $this->bookmark = $bookmark;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $connection = $this->bookmark->getCollection()->getConnection();
        $tableName = $this->bookmark->getCollection()->getMainTable();
        $connection->truncateTable($tableName);
    }
}