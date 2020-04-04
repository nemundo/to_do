<?php


namespace Nemundo\ToDo\Site;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Process\Config\ProcessConfig;
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


        $nav = new AdminNavigation($page);
        $nav->site=ToDoSite::$site;


       //$form= (new ToDoProcess())->getForm($page);
       // $form->redirectSite=new Site();

        $layout = new BootstrapTwoColumnLayout($page);
        $layout->col1->columnWidth = 6;
        $layout->col2->columnWidth = 6;


        $table = new AdminClickableTable($layout->col1);

        $toDoReader = new ToDoReader();
        $toDoReader->model->loadStatus();
        $toDoReader->model->loadAssignment();


        //$reader->model->loadWorkflow();
        //$reader->model->workflow->loadContent();

//        $reader->addOrder($reader->model->workflow->number);
        $toDoReader->addOrder($toDoReader->model->number, SortOrder::DESCENDING);

        $toDoReader->limit =ProcessConfig::PAGINATION_LIMIT;


        $header = new TableHeader($table);
        $header->addText($toDoReader->model->workflowClosed->label);
        $header->addText($toDoReader->model->workflowNumber->label);
        $header->addText($toDoReader->model->status->label);
        $header->addText($toDoReader->model->assignment->label);
        $header->addText($toDoReader->model->deadline->label);

        $header->addText($toDoReader->model->dateTime->label);



        foreach ($toDoReader->getData() as $toDoRow) {

            $row = new BootstrapClickableTableRow($table);

            $row->addYesNo($toDoRow->workflowClosed);

            //$row->addText($toDoRow->workflow->getSubject());
            $row->addText($toDoRow->workflowNumber.' '. $toDoRow->toDo);


            $row->addText($toDoRow->status->contentType->contentType);

            $row->addText($toDoRow->assignment->group);

            //$row->addText($toDoRow->deadline->getShortDateLeadingZeroFormat());

            $row->addText($toDoRow->dateTime->getShortDateLeadingZeroFormat());


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