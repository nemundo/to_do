<?php


namespace Nemundo\ToDo\Workflow\Status;


use Nemundo\Process\Status\AbstractStatus;
use Nemundo\Process\Template\Status\CancelStatus;
use Nemundo\Process\Template\Status\CommentStatus;
use Nemundo\Process\Template\Status\DocumentStatus;
use Nemundo\ToDo\Workflow\Form\ToDoForm;

class CreateStatus extends AbstractStatus
{

    protected function loadStatus()
    {

        $this->label = 'Erstellung';
        $this->id = 'a31aa6fa-8905-4d21-bb80-c142c337eb0a';
        $this->formClass= ToDoForm::class;

        $this->nextStatusClass= DoneStatus::class;
        $this->addMenuStatusClass(CommentStatus::class);
        $this->addMenuStatusClass(DocumentStatus::class);
        $this->addMenuStatusClass( CancelStatus::class);

    }

}