<?php


namespace Nemundo\ToDo\Workflow\Status;


use Nemundo\Process\Status\AbstractStatus;
use Nemundo\ToDo\Workflow\Form\CommentForm;
use Nemundo\ToDo\Workflow\View\CommentView;

class CommentStatus extends AbstractStatus
{

    protected function loadStatus()
    {
   $this->label = 'Comment';
   $this->id = '0a4dc850-c269-4cc9-8127-d5d16fe502c5';
   $this->formClass=CommentForm::class;
   $this->viewClass=CommentView::class;
   $this->changeStatus=false;

    }

}