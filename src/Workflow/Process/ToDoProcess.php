<?php


namespace Nemundo\ToDo\Workflow\Process;


use Nemundo\Process\Parameter\WorkflowParameter;
use Nemundo\Process\Process\AbstractProcess;
use Nemundo\Process\Site\WorkflowItemSite;
use Nemundo\ToDo\Workflow\Status\CreateStatus;
use Nemundo\ToDo\Workflow\View\ToDoView;

class ToDoProcess extends AbstractProcess
{

    protected function loadProcess()
    {

        $this->process = 'ToDo';
        $this->id = '6925df2d-ee59-49d4-aa8b-c03e0900f589';
        $this->prefixNumber = 'TODO-';
        $this->startNumber = 200;

        $this->viewClass= ToDoView::class;

        $this->startStatus = new CreateStatus();

    }

}