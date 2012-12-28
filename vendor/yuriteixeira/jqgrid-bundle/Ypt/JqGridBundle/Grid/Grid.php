<?php

namespace Ypt\JqGridBundle\Grid;

use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

use Ypt\JqGridBundle\FilterMapper\FilterMapperFactory;

/**
 * A class to define the grid for a JqGrid table
 *
 * @author pascal
 * @author Yuri Teixeira
 */
class Grid
{
    /**
     * @var \Symfony\Component\DependencyInjection\Container
     */
    protected $container;

    /**
     * @var \Knp\Component\Pager\Paginator
     */
    protected $paginator;

    /**
     * @var array
     */
    protected $paginatorOptions = array();

    /**
     * @var \Symfony\Component\Routing\Router
     */
    protected $router;

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    protected $entityManager;

    /**
     * @var \Twig_TemplateInterface
     */
    protected $templating;

    /**
     * @var \Symfony\Component\HttpFoundation\Session\Session
     */
    protected $session;

    /**
     * @var array
     */
    protected $columns;

    /**
     * @var string
     */
    protected $caption;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var bool
     */
    protected $onlyData;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $gridOptions;

    /**
     * @var array
     */
    protected $navigationOptions;

    /**
     * @var string
     */
    protected $datePickerFormat;

    /**
     * @var string
     */
    protected $datePickerPhpFormat;

    /**
     * @var \Doctrine\ORM\QueryBuilder
     */
    protected $queryBuilder;

    /**
     * @var string
     */
    protected $hash;

    /**
     * @var \Ypt\JqGridBundle\Grid\Grid
     */
    protected $subGrid;

    /**
     * @var string
     */
    protected $entityName;

    /**
     * @var string
     */
    protected $eventsNamespace;



    /**
     * @param \Symfony\Component\DependencyInjection\Container $container
     */
    public function __construct($container)
    {
        $this->container = $container;

        $this->paginator = $this->container->get('knp_paginator');
        $this->router = $this->container->get('router');
        $this->request = $this->container->get('request');
        $this->entityManager = $this->container->get('doctrine.orm.entity_manager');
        $this->templating = $this->container->get('templating');
        $this->session = $this->request->getSession();

        $this->columns = array();
        $this->caption = '';
        $this->url = '';
        $this->onlyData = $this->request->isXmlHttpRequest() ? true : false;

        $now = new \DateTime();
        $this->name = md5($now->format('Y-m-d H:i:s:u'));

        $this->resetOptions();
    }



     // --- Common getters and setters ---

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
     * @return string A Jquery Datepicker Plugin date format
     *
     * @see http://jqueryui.com/demos/datepicker/
     */
    public function getDatePickerFormat()
    {
        return $this->datePickerFormat;
    }

    /**
     * Set Paginator Options
     *
     * @param $options
     */
    public function setPaginatorOptions($options)
    {
        $this->paginatorOptions = $options;
    }

    /**
     * Get Paginator Options
     *
     * @return array
     */
    public function getPaginatorOptions()
    {
        return $this->paginatorOptions;
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

    /**
     * @return string A PHP date format
     *
     * @see http://br2.php.net/manual/en/function.date.php
     */
    public function getDatePickerPhpFormat()
    {
        return $this->datePickerPhpFormat;
    }

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
     * @param string $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param string $route Url from where the grid will fetch data
     */
    public function setUrl($route)
    {
        $this->url = $route;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        if (!$this->url) {
            $this->url = $this->router->generate($this->request->get('_route'));
        }

        return $this->url;
    }

    /**
     * @return bool If true (Ajax Request), returns json. Else (Regular request), renders html
     */
    public function isOnlyData()
    {
        return $this->onlyData;
    }

    /**
     * @return string A hash that identifies the grid
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param \Ypt\JqGridBundle\Grid\Grid $grid
     */
    public function setSubGrid(\Ypt\JqGridBundle\Grid\Grid $grid)
    {
        $this->subGrid = $grid;
    }

    /**
     * @return \Ypt\JqGridBundle\Grid\Grid
     */
    public function getSubGrid()
    {
        return $this->subGrid;
    }

    /**
     * Return an array with column definitions
     *
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @return array
     */
    public function getGridOptions()
    {
        return $this->gridOptions;
    }

    /**
     * @return array
     */
    public function getNavigationOptions()
    {
        return $this->navigationOptions;
    }

    /**
     * @param string $entityName
     */
    public function setEntityName($entityName)
    {
        $this->entityName = $entityName;
    }

    /**
     * @return string
     */
    public function getEntityName()
    {
        return $this->entityName;
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }



    // --- Auxiliar methods ---

    /**
     * Set the grid default options
     */
    protected function resetOptions()
    {
        $this->gridOptions = array(
            'width' => '100%',
            'height' => '100%',
            'rowNum' => 20,
            'rowList' => array(20, 50, 100, 500, 1000),
            'datatype' => 'json',
            'viewrecords' => true,
        );

        $this->navigationOptions = array(
            'view' => false,
            'search' => false,
            'edit' => false,
            'add' => false,
            'del' => false,
        );
    }

    /**
     * Add a new column definition to grid
     */
    public function addColumn($name, array $columnModel)
    {
        $column = new Column($this->container, $name);
        $column->setColumnModel($columnModel);

        $this->columns[] = $column;
        return $column;
    }

    /**
     * Return an array with the column names inside the column definitions
     *
     * @return string
     */
    public function getColumnsNames()
    {
        $columnNames = array();

        /* @var Column $column */
        foreach ($this->columns as $column) {
            $columnNames[] = $column->getName();
        }

        return $columnNames;
    }

    public function getColumnsModels($toView = false)
    {
        $columnsModels = array();

        /* @var Column $column */
        foreach ($this->columns as $column) {
            $columnsModels[] =
                $toView ?
                    $column->getColumnModelToView($this->name) :
                    $column->getColumnModel();
        }

        return $columnsModels;
    }

    /**
     * Set the query builder that will be used to get data to the grid
     *
     * @param \Doctrine\ORM\QueryBuilder $queryBuilder
     */
    public function setSource(QueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
        $this->createHash();
    }

    /**
     * Return the culture locale set on config
     *
     * @return string
     */
    public function getCulture()
    {
        $locale = $this->request->get('_locale') ?: \Locale::getDefault();
        return $locale;
    }

    /**
     * Create a hash to represent the grid
     */
    public function createHash()
    {
        $this->hash = 'grid_' . md5($this->request->get('_controller') . '_' . $this->getName());
        $this->session->set($this->getHash(), 'Y');
    }

    /**
     * Set the grid options based on the passed key/value array
     *
     * @param array $options
     */
    public function setGridOptions(array $options)
    {
        foreach ($options as $key => $value) {
            $this->gridOptions[$key] = $value;
        }
    }

    /**
     * @param array $options
     */
    public function setNavigationOptions(array $options)
    {
        foreach ($options as $key => $value) {
            $this->navigationOptions[$key] = $value;
        }
    }



    // --- Main methods ---

    /**
     * Collect filter parameters from url and builds related criteria on query builder
     *
     * @see http://www.trirand.com/jqgridwiki/doku.php?id=wiki:search_config)
     * @todo Move code from the switch to classes and load them with a factory
     */
    protected function generateFilters()
    {
        $filtersParam = $this->request->query->get('filters');
        $filters = json_decode($filtersParam, true);

        $rules = $filters['rules'];
        $groupOperator = $filters['groupOp']; // AND or OR

        if ($rules) {
            foreach ($rules as $rule) {

                /* @var \Ypt\JqGridBundle\Grid\Column $column */
                foreach ($this->columns as $column) {

                    if ($column->getFieldIndex() == $rule['field']) {
                        $filterMapper = FilterMapperFactory::getFilterMapper($this, $column);
                        $filterMapper->execute($rule, $groupOperator);
                    }
                }
            }
        }
    }

    /**
     * Evaluate the "fetch data" request sent by the jqgrid
     * applying column order, filters and pagination
     *
     * @return array
     *
     * @throws \Exception
     */
    public function getData()
    {
        if ($this->session->get($this->getHash()) == 'Y') {

            $page        = $this->request->query->get('page');
            $limit       = $this->request->query->get('rows');
            $sortIndex   = $this->request->query->get('sidx');
            $sortOrder   = $this->request->query->get('sord');
            $search      = $this->request->query->get('_search', 'false');
            $isSearching = $search == 'true' ? true : false;

            if ($sortIndex) {
                $this->queryBuilder->orderBy($sortIndex, $sortOrder);
            }

            if ($isSearching) {
                $this->generateFilters();
            }

            $pagination = $this->paginator->paginate(
                $this->queryBuilder->getQuery()->setHydrationMode(Query::HYDRATE_ARRAY),
                $page,
                $limit,
                $this->getPaginatorOptions()
            );

            $totalRows = $pagination->getTotalItemCount();
            $totalPages = $totalRows > 0 ? ceil($totalRows / $limit) : 0;

            $response = array(
                'page' => $page,
                'total' => $totalPages,
                'records' => $totalRows
            );

            foreach ($pagination as $key => $row) {
                $value = array();

                /* @var Column $column */
                foreach ($this->columns as $column) {

                    $fieldValue = ' ';

                    // Getting the field value through various strategies
                    if (array_key_exists($column->getFieldName(), $row)) {

                        $fieldValue = $row[$column->getFieldName()];

                    } elseif (array_key_exists(0, $row) && array_key_exists($column->getFieldName(), $row[0])) {

                        $fieldValue = $row[0][$column->getFieldName()];

                    } elseif ($column->getFieldValue()) {

                        $fieldValue = $column->getFieldValue();

                    } elseif ($column->getFieldTwig()) {

                        $fieldValue = $this->templating->render(
                            $column->getFieldTwig(),

                            array(
                                'row' => $row
                            )
                        );
                    }

                    // Applying field value conversions
                    if ($fieldValue instanceof \DateTime) {

                        /* @var \DateTime $fieldValue */
                        if ($column->getFieldFormatter() == 'date' || $column->getFieldFormatter() == 'datetime') {
                            $fieldValue = $fieldValue->format('Y-m-d H:i:s');
                        }
                    }

                    $value[] = $fieldValue;
                }

                $response['rows'][$key]['cell'] = $value;
            }

            return $response;

        } else {

            throw \Exception('Invalid query');
        }
    }

    /**
     * Returns the an array with a GridView instance for normal requests and json for AJAX requests
     *
     * @return array | \Symfony\Component\HttpFoundation\Response
     */
    public function render()
    {
        if ($this->isOnlyData()) {

            $data = $this->getData();
            $json = json_encode($data);

            $response = new Response();
            $response->setContent($json);
            $response->headers->set('Content-Type', 'application/json');

            return $response;

        } else {

            return array(
                'gridView' => new GridView($this)
            );
        }
    }

    /**
     * @param string $namespace
     */
    public function setEventsNamespace($namespace)
    {
        $this->eventsNamespace = $namespace;
    }

    /**
     * @return string
     */
    public function getEventsNamespace()
    {
        return $this->eventsNamespace;
    }
}