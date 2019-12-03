<?php


namespace Nemundo\ToDo\Workflow\Builder;


use Nemundo\Process\Builder\AbstractWorkflowBuilder;
use Nemundo\ToDo\Data\ToDo\ToDo;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;
use Nemundo\User\Session\UserSession;

class ToDoBuilder extends AbstractWorkflowBuilder
{

    public $toDo;

    protected function loadWorkflow()
    {
        $this->process=new ToDoProcess();
        // TODO: Implement loadWorkflow() method.
    }

    public function createWorkflow()
    {


       $workflowId= $this->saveWorkflow($this->toDo);


        $data = new ToDo();
        $data->workflowId=$workflowId;
        $data->userId = (new UserSession())->userId;
        $data->toDo = $this->toDo;
       $dataId=  $data->save();




        // TODO: Implement createWorkflow() method.
    }

}