JqGridBundle
============

A fork of michelpa/JqGridBundle, a JqGrid Plugin implementation for Symfony2, with some improvements:

* An updated version of Jquery JqGrid Plugin (currently 4.4.0)
* Some improvements (sub-grid support)
* Some fixes (date filter working for both date and datetime field types)
* More concise, readable and debugable code (making your implementation and adaptions more pleasant)

[Demo of original version here, but to work with my bundle, need some updates on layout and on method calls. Please continue reading](https://github.com/michelpa/demoJqGrid)


**Compatibility**: Tested with Symfony > 2.1


Installation
------------

1. If you are using composer, just add "yuriteixeira/jqgrid-bundle": "dev-master" to your composer.json,
install through it and you can skip steps 2 and 3.

2. **Add this bundle to your vendor/ dir**

    Add the following lines in your dypt file:

      [YptJqGridBundle]
        git=git://github.com/michelpa/JqGridBundle.git
        target=/bundles/Ypt/JqGridBundle

    Run the vendor script:

      ./bin/vendors install

3. **Add the "Ypt" namespace to your autoloader**

    <?php
    // app/autoload.php

     $loader->registerNamespaces(array(
         'Ypt' => __DIR__.'/../vendor/bundles',
          // your other namespaces
   ));
  

4. **Enable the bundle in the kernel**

    ```
      <?php
         // app/ApplicationKernel.php
         public function registerBundles()
         {
             return array(
                 // ...
                 new Ypt\JqGridBundle\YptJqGridBundle(),
                 // ...
             );
         }
    ```

5. **Add assets to your layout**

    ```
      <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet" />

      {% stylesheets
          '@YptJqGridBundle/Resources/public/css/ui.jqgrid.css'
      %}
          <link href="{{ asset_url }}" type="text/css" rel="stylesheet" />
      {% endstylesheets %}

    ```

    ```
      bundles/yptjqgrid/css/ui.jqgrid.css
    ```

6. **Configuration**

in config.yml:


	ypt_jq_grid: ~


 or if you want to specify the date format (for datepicker), you've got to set the date format in js AND in php format (conversion):

 
	ypt_jq_grid:
	    datepicker_format: dd/mm/yy
	    datepickerphp_format: d/m/Y
