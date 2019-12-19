<?php


namespace Nemundo\ToDo\Workflow\Builder;


use Nemundo\Process\Template\Item\UserAssignmentItem;
use Nemundo\Process\Workflow\Content\Item\Process\AbstractWorkflowItem;
use Nemundo\Process\Workflow\Content\Item\Process\MigrationProcessItemTrait;
use Nemundo\ToDo\Data\ToDo\ToDo;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;
use Nemundo\User\Session\UserSession;

class ToDoBuilder extends AbstractWorkflowItem
{

    /**
     * @var string
     */
    public $toDo;



    public function saveItem()
    {

        $this->contentType = new ToDoProcess();
        $this->subject = $this->toDo;

        //$this->assignment->setUserIdentification((new UserSession())->userId);
        //$this->assignment->setUsergroupIdentification(())
        $this->saveWorkflow();



        $data = new ToDo();
        $data->updateOnDuplicate=true;
        $data->workflowId = $this->dataId;
        $data->userId = (new UserSession())->userId;
        $data->toDo = $this->toDo;
        $data->save();


        
/*
        $item = new UserAssignmentItem();
        $item->parentId= $this->dataId;
        $item->userId = (new UserSession())->userId;
        $item->saveItem();*/

    }

}