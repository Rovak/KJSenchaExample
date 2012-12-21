<?php

namespace Application\Service;

use Closure;
use Traversable;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ResponseCollection;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AbstractService implements ServiceLocatorAwareInterface, EventManagerAwareInterface
{
    /**
     * @var EventManagerInterface
     */
    protected $events;

    /**
     * @var ServiceLocatorInterface
     */
    protected $locator;

    /**
     * {@inheritDoc}
     */
    public function setServiceLocator(ServiceLocatorInterface $locator)
    {
        $this->locator = $locator;
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceLocator()
    {
        return $this->locator;
    }

    /**
     * Method merges return values of each listener's response into original $argv array and returns it.
     *
     * @param  string  $event
     * @param  array   $argv
     * @param  Closure $callback
     * @return array
     */
    protected function triggerParamsMergeEvent($event, $argv = array(), $callback = null)
    {
        $eventRet = $this->triggerEvent($event, $argv, $callback);
        foreach ($eventRet as $event) {
            if (is_array($event) || $event instanceof Traversable) {
                $argv = array_merge_recursive($argv, $event);
            }
        }

        return $argv;
    }

    /**
     * @param  string             $event
     * @param  array              $argv
     * @param  Closure|null       $callback
     * @return ResponseCollection
     */
    protected function triggerEvent($event, $argv = array(), $callback = null)
    {
        return $this->getEventManager()->trigger($event, $this, $argv, $callback);
    }

    /**
     * Set the event manager instance used by this context
     *
     * @param  EventManagerInterface $events
     * @return mixed
     */
    public function setEventManager(EventManagerInterface $events)
    {
        $events->setIdentifiers(array(__CLASS__, get_called_class()));
        $this->events = $events;
        $this->attachDefaultListeners();

        return $this;
    }

    /**
     * Retrieve the event manager
     *
     * Lazy-loads an EventManager instance if none registered.
     *
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        if (null === $this->events) {
            $this->setEventManager($this->getServiceLocator()->get('EventManager'));
        }

        return $this->events;
    }

    /**
     * attach default listeners
     *
     * @return void
     */
    protected function attachDefaultListeners()
    {

    }
}
