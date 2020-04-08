<?php


namespace Nemundo\ToDo\Workflow\Status;


use Nemundo\Process\Workflow\Content\Form\StatusForm;
use Nemundo\Process\Workflow\Content\Status\AbstractProcessStatus;
use Nemundo\ToDo\Data\ToDo\ToDoUpdate;

class DoneProcessStatus extends AbstractProcessStatus
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Done';
        $this->typeId = '6794c336-a173-4dbb-8f1c-2a1cbfd80eff';
        $this->closeWorkflow = true;
        $this->changeStatus = true;

    }


    protected function onCreate()
    {

        $update = new ToDoUpdate();
        $update->done = true;
        $update->updateById($this->parentId);

    }


    public function getMessage() {


        $message = 'Task was done';
        return $message;

        //parent::getMessage();
        //$message =

    }


}