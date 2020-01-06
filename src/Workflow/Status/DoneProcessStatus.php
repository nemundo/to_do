<?php


namespace Nemundo\ToDo\Workflow\Status;


use Nemundo\Process\Workflow\Content\Form\StatusForm;
use Nemundo\Process\Workflow\Content\Status\AbstractProcessStatus;
use Nemundo\ToDo\Data\ToDo\ToDoUpdate;

class DoneProcessStatus extends AbstractProcessStatus
{

    protected function loadContentType()
    {
        $this->contentLabel = 'Done';
        $this->contentId = '6794c336-a173-4dbb-8f1c-2a1cbfd80eff';
        $this->formClass = StatusForm::class;
        $this->closeWorkflow = true;
        $this->changeStatus = true;

    }


    protected function onCreate()
    {

        $update = new ToDoUpdate();
        $update->done = true;
        $update->updateById($this->parentId);

    }

}