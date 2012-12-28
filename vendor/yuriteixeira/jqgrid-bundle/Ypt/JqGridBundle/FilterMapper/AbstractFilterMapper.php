<?php

namespace Ypt\JqGridBundle\FilterMapper;

use Ypt\JqGridBundle\Grid\Grid;
use Ypt\JqGridBundle\Grid\Column;

abstract class AbstractFilterMapper
{
    protected $grid;
    protected $column;

    /**
     * @param \Ypt\JqGridBundle\Grid\Grid   $grid
     * @param \Ypt\JqGridBundle\Grid\Column $column
     */
    public function __construct(Grid $grid, Column $column) {
        $this->grid = $grid;
        $this->column = $column;
    }

    /**
     * @abstract
     *
     * @param array  $rule
     * @param string $groupOperator
     *
     * @return mixed
     */
    abstract public function execute(array $rule, $groupOperator = 'OR');
}
