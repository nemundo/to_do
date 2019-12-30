<?php


namespace Nemundo\ToDo\Workflow\Builder;


use Nemundo\Process\Group\Content\Add\AddGroupContentItem;
use Nemundo\Process\Workflow\Content\Item\Process\AbstractWorkflowItem;
use Nemundo\ToDo\Data\ToDo\ToDo;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;
use Nemundo\User\Session\UserSession;

class ToDoBuilder extends AbstractWorkflowItem
{

    /**
     * @var string
     */
    public $toDo;


    protected function saveData()
    {

        $this->contentType = new ToDoProcess();
        $this->subject = $this->toDo;

        //$this->assignment->setUserIdentification((new UserSession())->userId);
        //$this->assignment->setUsergroupIdentification(())

        //$this->saveWorkflow();

        $data = new ToDo();
        $data->id = $this->dataId;
        $data->updateOnDuplicate = true;
        $data->toDo = $this->toDo;
        //$data->workflowId = $this->dataId;
        $data->userId = (new UserSession())->userId;
        $data->save();


        /*
        $item = new AddGroupContentItem();
        $item->parentId = $this->dataId;
        $item->saveItem();*/


        /*
                $item = new UserAssignmentItem();
                $item->parentId= $this->dataId;
                $item->userId = (new UserSession())->userId;
                $item->saveItem();*/

    }

}