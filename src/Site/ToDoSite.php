<?php


namespace Nemundo\ToDo\Site;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Parameter\ToDoParameter;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;

class ToDoSite extends AbstractSite
{

    /**
     * @var ToDoSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'To Do';
        $this->url = 'todo';
        //$this->menuActive = false;

        ToDoSite::$site = $this;

        new DoneSite($this);

    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $layout = new BootstrapTwoColumnLayout($page);
        $layout->col1->columnWidth = 2;
        $layout->col2->columnWidth = 10;


        $table = new AdminClickableTable($layout->col1);

        $reader = new ToDoReader();
        $reader->model->loadWorkflow();
        $reader->model->workflow->loadContent();

        $reader->addOrder($reader->model->workflow->number);

        foreach ($reader->getData() as $toDoRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($toDoRow->workflow->getSubject());

            $site = clone(ToDoSite::$site);
            $site->addParameter(new ToDoParameter($toDoRow->id));
            $row->addClickableSite($site);

        }


        $toDoParameter = new ToDoParameter();
        if ($toDoParameter->exists()) {

            $process = new ToDoProcess($toDoParameter->getValue());

            $title = new AdminTitle($layout->col2);
            $title->content = $process->getSubject();

            $view = $process->getProcessView($layout->col2);
            $view->redirectSite = clone(ToDoSite::$site);
            $view->redirectSite->addParameter(new ToDoParameter());

        } else {

            $process = new ToDoProcess();

            $form = $process->getForm($layout->col2);
            $form->redirectSite = new Site();

        }

        $page->render();

    }

}