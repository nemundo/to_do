<?php


namespace Nemundo\ToDo\Workflow\Status;


use Nemundo\Process\Status\AbstractStatus;
use Nemundo\Process\Template\Status\CancelStatus;
use Nemundo\Process\Template\Status\CommentStatus;
use Nemundo\Process\Template\Status\DocumentStatus;
use Nemundo\Process\Template\Status\UserAssignmentStatus;
use Nemundo\ToDo\Workflow\Form\ToDoForm;

class CreateStatus extends AbstractStatus
{

    protected function loadContentType()
    {

        $this->label = 'Erstellung';
        $this->id = 'a31aa6fa-8905-4d21-bb80-c142c337eb0a';
        $this->formClass= ToDoForm::class;
        $this->editable=true;

        $this->nextStatusClass= DoneStatus::class;
        $this->addMenuStatusClass(CommentStatus::class);
        $this->addMenuStatusClass(DocumentStatus::class);
        $this->addMenuStatusClass( CancelStatus::class);
        $this->addMenuStatusClass(UserAssignmentStatus::class);

    }

}