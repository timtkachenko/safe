<?php

namespace Ypt\JqGridBundle\Grid;

/**
 * A class to output values expected by the view
 *
 * @author Fernando Carlétti
 * @author Yuri Teixeira
 */
class GridView
{
    /**
     * @var \Ypt\JqGridBundle\Grid\Grid
     */
    protected $grid;



    public function __construct(\Ypt\JqGridBundle\Grid\Grid $grid) {
        $this->grid = $grid;
    }



    /**
     * @return \Ypt\JqGridBundle\Grid\Grid
     */
    public function getGridModel()
    {
        return $this->grid;
    }

    /**
     * @return string
     */
    public function getColumnsNames()
    {
        return json_encode($this->grid->getColumnsNames());
    }

    /**
     * @return string
     */
    public function getColumnsModels()
    {
        $result = json_encode($this->grid->getColumnsModels(true));

        // The json encode was turning this function name to string, causing some trouble
        $result = str_replace('"openDatePickerFilter"', 'openDatePickerFilter', $result);
        $result = str_replace('"decodeWhisper"', 'decodeWhisper', $result);
        $result = str_replace('"encodeWhisper"', 'encodeWhisper', $result);

        $namespace = $this->grid->getEventsNamespace();

        if (!is_null($namespace)) {
            $namespace = str_replace('.', '\.', $namespace);
            $result = preg_replace('/"(' . $namespace . '(\.[a-zA-Z0-9_]+)+)"/', '$1', $result);
        }

        return $result;
    }

    /**
     * @return string
     */
    public function getGridOptions()
    {
        $result = json_encode($this->grid->getGridOptions());

        $namespace = $this->grid->getEventsNamespace();

        if (!is_null($namespace)) {
            $namespace = str_replace('.', '\.', $namespace);
            $result = preg_replace('/"(' . $namespace . '(\.[a-zA-Z0-9_]+)+)"/', '$1', $result);
        }

        return $result;
    }

    /**
     * @return string
     */
    public function getNavigationOptions()
    {
        return json_encode($this->grid->getNavigationOptions());
    }
}