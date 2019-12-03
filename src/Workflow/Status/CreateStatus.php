<?php


namespace Nemundo\ToDo\Workflow\Status;


use Nemundo\Process\Status\AbstractStatus;
use Nemundo\ToDo\Workflow\Form\ToDoForm;

class CreateStatus extends AbstractStatus
{

    protected function loadStatus()
    {
        $this->label = 'Erstellung';
        $this->id = 'a31aa6fa-8905-4d21-bb80-c142c337eb0a';
        $this->formClass= ToDoForm::class;
        // TODO: Implement loadStatus() method.

        $this->nextStatus=new DoneStatus();

        $this->addMenuStatus(new CommentStatus());
        $this->addMenuStatus(new ChancelStatus());  //ChancelStatus::class);


    }

}