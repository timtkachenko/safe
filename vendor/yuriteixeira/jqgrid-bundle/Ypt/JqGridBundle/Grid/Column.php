<?php

namespace Ypt\JqGridBundle\Grid;

/**
 * A class to define a column for a JqGrid table
 *
 * @author pascal
 * @author Yuri Teixeira
 *
 * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:colmodel_options
 */
class Column
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $columnModel;

    /**
     * @var \Symfony\Component\DependencyInjection\Container
     */
    protected $container;



    /**
     * @param \Symfony\Component\DependencyInjection\Container $container
     * @param string $name
     */
    public function __construct($container, $name = '')
    {
        $this->container = $container;

        if ($name) {
            $this->name = $name;
        }
    }



    // --- Common Getters & Setters ---

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param array $columnModel
     */
    public function setColumnModel(array $columnModel)
    {
        $this->columnModel = $columnModel;
    }

    /**
     * @return array
     */
    public function getColumnModel()
    {
        return $this->columnModel;
    }



    /**
     * Generic getter for any jqgrid column model attribute
     *
     * @param string $fieldname
     * @return mixed
     */
    protected function getField($fieldname)
    {
        if (array_key_exists($fieldname, $this->columnModel)) {
            return $this->columnModel[$fieldname];
        } else {
            return false;
        }
    }



    // --- Getters to help access some important column model attributes quickly ---

    /**
     * @return string
     */
    public function getFieldName()
    {
        return $this->getField('name');
    }

    /**
     * @return mixed
     */
    public function getFieldValue()
    {
        return $this->getField('value');
    }

    /**
     * @return string
     */
    public function getFieldIndex()
    {
        return $this->getField('index');
    }

    /**
     * @return string
     */
    public function getFieldTwig()
    {
        return $this->getField('twig');
    }

    /**
     * @return string
     */
    public function getFieldHaving()
    {
        return $this->getField('having');
    }

    /**
     * @return string
     */
    public function getFieldFormatter()
    {
        return $this->getField('formatter');
    }



    /**
     * Decorate specific column model attributes with
     * values expected to build the view
     *
     * @param string $prefix
     *
     * @return array
     */
    public function getColumnModelToView($prefix = '')
    {
        $translator = $this->container->get('translator');
        $datePickerMessage = $translator->trans('datepicker.choose');

        $hasDatePicker =
            array_key_exists('datepicker', $this->columnModel) &&
            $this->columnModel['datepicker'];

        if ($hasDatePicker) {
            $this->columnModel['searchoptions'] = array(
                'dataInit' => 'openDatePickerFilter',
                'attr' => array(
                    'title' => $datePickerMessage
                )
            );
        }

        unset($this->columnModel['twig']);
        unset($this->columnModel['having']);
        unset($this->columnModel['value']);
        unset($this->columnModel['datepicker']);

        // Prefixing name of column, if prefix is informed
        if (array_key_exists('name', $this->columnModel)) {
            $this->columnModel['name'] = $prefix . '_' . $this->columnModel['name'];
        }

        return $this->columnModel;
    }
}