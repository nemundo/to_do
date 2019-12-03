<?php


namespace Nemundo\ToDo\Workflow\Process;


use Nemundo\Process\Process\AbstractProcess;
use Nemundo\ToDo\Workflow\Status\CreateStatus;

class ToDoProcess extends AbstractProcess
{

    protected function loadProcess()
    {

        $this->process = 'ToDo';
        $this->id = '6925df2d-ee59-49d4-aa8b-c03e0900f589';
        $this->prefixNumber = 'TODO-';
        $this->startNumber = 200;

        $this->startStatus = new CreateStatus();

    }

}