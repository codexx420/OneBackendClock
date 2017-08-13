<?php
namespace OneBackendClock;
use \Shopware\Components;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Components\Plugin\Context\UpdateContext;
use Shopware\Models\Widget\Widget;

/**
 * Class OneBackendClock
 */
class OneBackendClock extends Components\Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Dispatcher_ControllerPath_Backend_OneBackendClockWidget' => 'onGetBackendControllerPath',
            'Enlight_Controller_Action_PostDispatch_Backend_Index' => 'onPostDispatchBackendIndex'
        ];
    }

    /**
     * @return string
     */
    public function onGetBackendControllerPath() {
        $this->container->get("template")->addTemplateDir($this->getPath() . '/Resources/views');
        return $this->getPath() . '/Controllers/Backend/OneBackendClockWidget.php';
    }

    /**
     * @param \Enlight_Controller_ActionEventArgs $args
     */
    public function onPostDispatchBackendIndex(\Enlight_Controller_ActionEventArgs $args)
    {
        $request = $args->getRequest();
        $view = $args->getSubject()->View();

        $view->addTemplateDir($this->getPath() . '/Resources/views');

        if ($request->getActionName() === 'index') {
            $view->extendsTemplate('backend/index/one_backend_clock/app.js');
        }
    }

    /**
     * @param InstallContext $context
     * @return bool
     */
    public function install(InstallContext $context)
    {
        $plugin = $context->getPlugin();
        $widget = new Widget();

        $widget->setName('one-backend-clock');
        $widget->setPlugin($plugin);
        $plugin->getWidgets()->add($widget);

        parent::install($context);
        return true;
    }

    /**
     * @param UninstallContext $context
     * @return bool
     */
    public function uninstall(UninstallContext $context)
    {
        $plugin = $context->getPlugin();
        $em = $this->container->get('models');
        $widget = $plugin->getWidgets()->first();

        $em->remove($widget);
        $em->flush();

        parent::uninstall($context);
        return true;
    }

    /**
     * @param UpdateContext $context
     * @return bool
     */
    public function update(UpdateContext $context)
    {
        return true;
    }

}