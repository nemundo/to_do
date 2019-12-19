<?php


namespace Nemundo\ToDo\Workflow\Status;


use Nemundo\Process\Template\Status\CancelStatus;
use Nemundo\Process\Template\Status\CommentProcessStatus;
use Nemundo\Process\Template\Status\DeadlineChangeProcessStatus;
use Nemundo\Process\Template\Status\DocumentProcessStatus;
use Nemundo\Process\Template\Status\UserAssignmentProcessStatus;
use Nemundo\Process\Workflow\Content\Status\AbstractProcessStatus;
use Nemundo\ToDo\Workflow\Form\ToDoForm;

class CreateProcessStatus extends AbstractProcessStatus
{

    protected function loadContentType()
    {

        $this->label = 'Erstellung';
        $this->id = 'a31aa6fa-8905-4d21-bb80-c142c337eb0a';
        $this->formClass = ToDoForm::class;
        $this->editable = false;

        $this->nextStatusClass = DoneProcessStatus::class;

        $this->addMenuStatusClass(CommentProcessStatus::class);
        $this->addMenuStatusClass(DocumentProcessStatus::class);
        $this->addMenuStatusClass(UserAssignmentProcessStatus::class);
        $this->addMenuStatusClass(DeadlineChangeProcessStatus::class);
        $this->addMenuStatusClass(CancelStatus::class);

    }

}