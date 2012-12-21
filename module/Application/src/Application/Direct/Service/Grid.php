<?php

namespace Application\Direct\Service;

use Application\Service\AbstractService;

/**
 * Direct Grid Example
 *
 * Generates row data to output to the Grid example
 *
 * The data will build an ArrayCollection with increasing numbers
 * and the result is being filtered, sorted etc by the Criteria API
 * which is taken from the Doctrine\Common library
 *
 * @see http://docs.doctrine-project.org/en/latest/reference/working-with-associations.html#filtering-collections
 */
class Grid extends AbstractService
{
    /**
     * Simple request which demonstrates service usage
     * 
     * @param array $values
     * @return array
     */
    public function getGrid($values)
    {
        $sm = $this->getServiceLocator();
        
        /* @var $rowMapper \Application\Mapper\RowMapper */
        $rowMapper = $sm->get('app_mapper_row');
        
        return $rowMapper
            ->generateRowData(array('name', 'info'))
            ->toArray();
    }
}