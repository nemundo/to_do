<?php


namespace Nemundo\ToDo\Workflow\Builder;


use Nemundo\Process\Item\AbstractWorkflowItem;
use Nemundo\ToDo\Data\ToDo\ToDo;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;
use Nemundo\User\Session\UserSession;

class ToDoBuilder extends AbstractWorkflowItem  // AbstractWorkflowBuilder
{

    public $toDo;

    protected function loadWorkflow()
    {
        $this->contentType = new ToDoProcess();
        // TODO: Implement loadWorkflow() method.
    }

    public function saveItem()
    {


        $this->subject = $this->toDo;

        $this->assignment->setUserIdentification((new UserSession())->userId);


        //$this->assignment->setUsergroupIdentification(())

        $this->saveWorkflow();

        $data = new ToDo();
        $data->workflowId = $this->dataId;  // workflowId;
        $data->userId = (new UserSession())->userId;
        $data->toDo = $this->toDo;
        $data->save();


        // TODO: Implement createWorkflow() method.
    }

}