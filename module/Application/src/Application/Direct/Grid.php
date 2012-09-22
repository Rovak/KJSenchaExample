<?php

namespace Application\Direct;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * Direct Grid Example
 */
class Grid
{

    protected function getData()
    {
        $fields = array('name', 'info');

        $data = new ArrayCollection();

        for ($i = 0; $i < 50; $i++) {
            $row = array();
            foreach ($fields as $field) {
                $row[$field] = ucfirst($field) . ' ' . $i;
            }
            $data->add((object) $row);
        }

        return $data;
    }

    public function getGrid($values)
    {
        $criteria = Criteria::create()
            ->setFirstResult($values['start'])
            ->setMaxResults($values['limit']);
        
        // Add sorting
        if (!empty($values['sort'])) {
            $orderBy = array();
            foreach ($values['sort'] as $sort) {
                $orderBy[$sort['property']] = $sort['direction'];
            }
            $criteria->orderBy($orderBy);
        }
        
        $data = $this->getData()->matching($criteria);

        return $data->toArray();
    }

}