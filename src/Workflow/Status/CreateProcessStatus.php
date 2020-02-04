<?php


namespace Nemundo\ToDo\Workflow\Status;


use Nemundo\Process\Group\Content\Add\AddGroupContentType;
use Nemundo\Process\Template\Content\Comment\CommentContentType;
use Nemundo\Process\Template\Content\File\FileContentType;
use Nemundo\Process\Template\Content\Html\HtmlContentType;
use Nemundo\Process\Template\Content\LargeText\LargeTextContentType;
use Nemundo\Process\Template\Content\Text\TextContentType;
use Nemundo\Process\Template\Status\CancelStatus;
use Nemundo\Process\Template\Status\CommentProcessStatus;
use Nemundo\Process\Template\Status\DeadlineChangeProcessStatus;
use Nemundo\Process\Template\Status\DocumentProcessStatus;
use Nemundo\Process\Template\Status\UserAssignmentProcessStatus;
use Nemundo\Process\Workflow\Content\Status\AbstractProcessStatus;
use Nemundo\ToDo\Workflow\Form\ToDoEditForm;
use Nemundo\ToDo\Workflow\Form\ToDoProcessForm;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;

class CreateProcessStatus extends AbstractProcessStatus
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Erstellung (ToDo)';
        $this->typeId = 'a31aa6fa-8905-4d21-bb80-c142c337eb0a';
        $this->formClass = ToDoEditForm::class;
        $this->editable = true;

        $this->nextMenuClass = DoneProcessStatus::class;

        $this->addMenuClass(FileContentType::class);
        $this->addMenuClass(TextContentType::class);
        //$this->addMenuClass(CommentProcessStatus::class);
        //$this->addMenuClass(DocumentProcessStatus::class);
        $this->addMenuClass(UserAssignmentProcessStatus::class);
        $this->addMenuClass(DeadlineChangeProcessStatus::class);
        $this->addMenuClass(CancelStatus::class);
        $this->addMenuClass(ToDoProcess::class);
        $this->addMenuClass(AddGroupContentType::class);
        $this->addMenuClass(HtmlContentType::class);
        $this->addMenuClass(LargeTextContentType::class);
        $this->addMenuClass(CommentContentType::class);

    }




}