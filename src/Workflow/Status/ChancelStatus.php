<?php


namespace Nemundo\ToDo\Workflow\Status;


use Nemundo\Process\Form\StatusForm;
use Nemundo\Process\Status\AbstractStatus;
use Nemundo\ToDo\Workflow\Form\ToDoForm;

class ChancelStatus extends AbstractStatus
{

    protected function loadStatus()
    {
        $this->label = 'chancel';
        $this->id = '94793550-dc33-436b-88bb-7b1d3e0d0e37';
        $this->formClass= StatusForm::class;
        $this->closeWorkflow=true;

        //$this->nextStatus=new DoneStatus();

    }

}