<?php

namespace Ypt\JqGridBundle\FilterMapper;

use Ypt\JqGridBundle\Grid\Grid;
use Ypt\JqGridBundle\Grid\Column;

class FilterMapperFactory
{
    const FORMATTER_DATE = 'date';

    /**
     * @param \Ypt\JqGridBundle\Grid\Grid   $grid
     * @param \Ypt\JqGridBundle\Grid\Column $column
     *
     * @return \Ypt\JqGridBundle\FilterMapper\AbstractFilterMapper
     */
    public static function getFilterMapper(Grid $grid, Column $column) {
        if ($column->getFieldFormatter() == self::FORMATTER_DATE) {

            return new DateRangeFilterMapper($grid, $column);

        } elseif ($column->getFieldHaving()) {

            return new HavingFilterMapper($grid, $column);

        } else {

            return new ComparisionFilterMapper($grid, $column);
        }
    }
}
