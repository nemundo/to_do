<?php


namespace Nemundo\ToDo\Workflow\Status;


use Nemundo\Process\Template\Content\Comment\CommentContentType;
use Nemundo\Process\Template\Content\File\FileContentType;
use Nemundo\Process\Template\Content\Html\HtmlContentType;
use Nemundo\Process\Template\Content\LargeText\LargeTextContentType;
use Nemundo\Process\Template\Content\Text\TextContentType;
use Nemundo\Process\Template\Status\Cancel\CancelProcessStatus;
use Nemundo\Process\Workflow\Content\Status\AbstractProcessStatus;
use Nemundo\ToDo\Workflow\Form\ToDoEditForm;
use Nemundo\ToDo\Workflow\Form\ToDoProcessForm;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;
use Schleuniger\Content\Zuweisung\ZuweisungStatus;

class CreateProcessStatus extends AbstractProcessStatus
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Erstellung (ToDo)';
        $this->typeId = 'a31aa6fa-8905-4d21-bb80-c142c337eb0a';
        $this->formClass = ToDoEditForm::class;

        $this->changeStatus=true;

        //$this->editable = true;

        $this->nextMenuClass = DoneProcessStatus::class;

        $this->addMenuClass(FileContentType::class);
        $this->addMenuClass(TextContentType::class);
        //$this->addMenuClass(CommentProcessStatus::class);
        //$this->addMenuClass(DocumentProcessStatus::class);
        //$this->addMenuClass(UserAssignmentProcessStatus::class);
        //$this->addMenuClass(DeadlineChangeProcessStatus::class);
        $this->addMenuClass(CancelProcessStatus::class);
        $this->addMenuClass(ToDoProcess::class);
        //$this->addMenuClass(AddGroupContentType::class);
        $this->addMenuClass(HtmlContentType::class);
        $this->addMenuClass(LargeTextContentType::class);
        $this->addMenuClass(CommentContentType::class);

        $this->addMenuClass(ZuweisungStatus::class);


    }




}