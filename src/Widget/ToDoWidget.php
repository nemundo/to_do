<?php


namespace Nemundo\ToDo\Widget;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Process\Workflow\Site\WorkflowItemSite;
use Nemundo\ToDo\Com\ToDoTable;
use Nemundo\ToDo\Site\ToDoSite;
use Nemundo\ToDo\Workflow\Form\ToDoForm;


class ToDoWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {
        $this->widgetTitle = 'To Do';
        //$this->widgetSite = ToDoSite::$site;
    }


    public function getContent()
    {

        $form = new ToDoForm($this);
        //$form->redirectSite = WorkflowItemSite::$site;
        $form->appendParameter =false;

        $table = new ToDoTable($this);
        $table->showDoneItem = false;

        return parent::getContent();

    }

}