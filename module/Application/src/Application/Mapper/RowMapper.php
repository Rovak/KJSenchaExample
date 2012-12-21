<?php

namespace Application\Mapper;

use Application\Service\AbstractService;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Mapper that generates row data to demonstrate the usage
 * of a service inside a Direct API request
 */
class RowMapper extends AbstractService
{
    /**
     * Generate rows
     * 
     * @param array $fields
     * @param type $num
     * @return \Application\Mapper\ArrayCollection
     */
    public function generateRowData(array $fields, $num = 50)
    {
        $data = new ArrayCollection();

        for ($i = 0; $i < $num; $i++) {
            $row = array();
            foreach ($fields as $field) {
                $row[$field] = ucfirst($field) . ' ' . $i;
            }
            $data->add((object) $row);
        }

        return $data;
    }

}