<?php

namespace NXC\SafeBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Knp\Menu\ItemInterface as MenuItemInterface;

use Sonata\AdminBundle\Route\RouteCollection;

class WhisperAdmin extends Admin
{
//    /**
//     * Конфигурация левого меню при отображении и редатировании записи
//     *
//     * @param \Knp\Menu\ItemInterface $menu
//     * @param $action
//     * @param null|\Sonata\AdminBundle\Admin\Admin $childAdmin
//     *
//     * @return void
//     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, Admin $childAdmin = null) {
//        $menu->addChild(
//                $action == 'edit' ? 'Просмотр новости' : 'Редактирование новости', array('uri' => $this->generateUrl(
//                    $action == 'edit' ? 'show' : 'edit', array('id' => $this->getRequest()->get('id'))))
//        );
//    }
      protected $baseRouteName = 'nxc_safe_whisper_admin';
      protected $baseRoutePattern = 'nxc/safe/whisper';

    /**
     * Конфигурация отображения записи
     *
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
                ->add('id', null, array('label' => 'Идентификатор'))
                ->add('user', null, array('label' => 'Заголовок'))
                ->add('whisper')
                ->add('approved')
                ->add('created')
                ->add('updated');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('user')
            ->add('whisper')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('user')
            ->add('whisper')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('user')
            ->add('whisper')
        ;
    }
}
