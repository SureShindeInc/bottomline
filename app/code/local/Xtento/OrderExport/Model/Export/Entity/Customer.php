<?php

/**
 * Product:       Xtento_OrderExport (1.3.6)
 * ID:            zBz5rQGncoKSGGGFx+5QMonW+L3uUtQguMNYVlhDmXU=
 * Packaged:      2014-01-21T10:44:10+00:00
 * Last Modified: 2013-01-16T15:25:11+01:00
 * File:          app/code/local/Xtento/OrderExport/Model/Export/Entity/Customer.php
 * Copyright:     Copyright (c) 2014 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

class Xtento_OrderExport_Model_Export_Entity_Customer extends Xtento_OrderExport_Model_Export_Entity_Abstract
{
    protected $_entityType = Xtento_OrderExport_Model_Export::ENTITY_CUSTOMER;

    protected function _construct()
    {
        $this->_collection = Mage::getResourceModel('customer/customer_collection');
        parent::_construct();
    }

    public function setCollectionFilters($filters)
    {
        foreach ($filters as $filter) {
            foreach ($filter as $attribute => $filterArray) {
                if ($attribute == 'increment_id') {
                    $attribute = 'entity_id';
                }
                $this->_collection->addAttributeToFilter($attribute, $filterArray);
            }
        }
        return $this->_collection;
    }
}