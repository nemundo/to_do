<?php


namespace Nemundo\ToDo\Workflow\Status;


use Nemundo\Process\Group\Content\Add\AddGroupContentType;
use Nemundo\Process\Template\Status\CancelStatus;
use Nemundo\Process\Template\Status\CommentProcessStatus;
use Nemundo\Process\Template\Status\DeadlineChangeProcessStatus;
use Nemundo\Process\Template\Status\DocumentProcessStatus;
use Nemundo\Process\Template\Status\UserAssignmentProcessStatus;
use Nemundo\Process\Workflow\Content\Status\AbstractProcessStatus;
use Nemundo\ToDo\Workflow\Form\ToDoForm;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;

class CreateProcessStatus extends AbstractProcessStatus
{

    protected function loadContentType()
    {

        $this->contentLabel = 'Erstellung';
        $this->contentId = 'a31aa6fa-8905-4d21-bb80-c142c337eb0a';
        $this->formClass = ToDoForm::class;
        $this->editable = false;

        $this->nextMenuClass = DoneProcessStatus::class;


        $this->addMenuClass(CommentProcessStatus::class);
        $this->addMenuClass(DocumentProcessStatus::class);
        $this->addMenuClass(UserAssignmentProcessStatus::class);
        $this->addMenuClass(DeadlineChangeProcessStatus::class);
        $this->addMenuClass(CancelStatus::class);
        $this->addMenuClass(ToDoProcess::class);
        $this->addMenuClass(AddGroupContentType::class);

    }

}