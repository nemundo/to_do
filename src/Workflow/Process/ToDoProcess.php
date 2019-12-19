<?php


namespace Nemundo\ToDo\Workflow\Process;


use Nemundo\Process\Workflow\Content\Process\AbstractProcess;
use Nemundo\Process\Workflow\Content\Status\ProcessStatusTrait;
use Nemundo\ToDo\Workflow\Status\CreateProcessStatus;
use Nemundo\ToDo\Workflow\View\ToDoView;

class ToDoProcess extends AbstractProcess
{

    use ProcessStatusTrait;

    protected function loadProcess()
    {

        $this->label = 'To Do (Aufgabe)';
        $this->process = 'ToDo';
        $this->id = '6925df2d-ee59-49d4-aa8b-c03e0900f589';
        $this->prefixNumber = 'TODO-';
        $this->startNumber = 200;
        $this->startStatus = new CreateProcessStatus();
        $this->viewClass = ToDoView::class;


    }


}