<?php

namespace Ypt\JqGridBundle\Grid;

/**
 * A factory class to generate grid objects
 *
 * @author Fernando Carlétti
 * @author Yuri Teixeira
 */
class Factory
{
    /**
     * @var \Symfony\Component\DependencyInjection\Container
     */
    protected $container;

    /**
     * @var string
     */
    protected $datePickerFormat;

    /**
     * @var string
     */
    protected $datePickerPhpFormat;



    /**
     * @param \Symfony\Component\DependencyInjection\Container $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * @param string $gridClassName The name of the Grid descendent class that will be instaciated
     *
     * @return \Ypt\JqGridBundle\Grid\Grid
     */
    public function createGrid($gridClassName = '\Ypt\JqGridBundle\Grid\Grid')
    {
        $gridClass = new \ReflectionClass($gridClassName);

        /* @var \Ypt\JqGridBundle\Grid\Grid $grid */
        $grid = $gridClass->newInstance($this->container);

        $grid->setDatePickerFormat($this->datePickerFormat);
        $grid->setDatePickerPhpFormat($this->datePickerPhpFormat);

        return $grid;
    }

    /**
     * @param string $format A Jquery Datepicker Plugin date format
     *
     * @see http://jqueryui.com/demos/datepicker/
     */
    public function setDatePickerFormat($format)
    {
        $this->datePickerFormat = $format;
    }

    /**
     * @param string $format A PHP date format
     *
     * @see http://br2.php.net/manual/en/function.date.php
     */
    public function setDatePickerPhpFormat($format)
    {
        $this->datePickerPhpFormat = $format;
    }
}