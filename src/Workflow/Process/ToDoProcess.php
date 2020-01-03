<?php


namespace Nemundo\ToDo\Workflow\Process;


use Nemundo\Process\Workflow\Content\Item\Process\WorkflowItem;
use Nemundo\Process\Workflow\Content\Process\AbstractProcess;
use Nemundo\Process\Workflow\Content\Status\ProcessStatusTrait;
use Nemundo\ToDo\Content\ToDoContentList;
use Nemundo\ToDo\Data\ToDo\ToDo;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Workflow\Form\ToDoForm;
use Nemundo\ToDo\Workflow\Status\CreateProcessStatus;
use Nemundo\ToDo\Workflow\View\ToDoView;
use Nemundo\User\Session\UserSession;

class ToDoProcess extends AbstractProcess
{

    use ProcessStatusTrait;



    /**
     * @var string
     */
    public $toDo;

    protected function loadContentType()
    {

        $this->contentLabel = 'To Do (Aufgabe)';
        $this->contentId = '6925df2d-ee59-49d4-aa8b-c03e0900f589';
        $this->prefixNumber = 'TODO-';
        $this->startNumber = 200;
        $this->startContentType = new CreateProcessStatus();
        $this->formClass=ToDoForm::class;
        $this->viewClass = ToDoView::class;
        $this->listClass=ToDoContentList::class;

    }




    protected function saveData()
    {

        $this->subject = $this->toDo;

        //$this->assignment->setUserIdentification((new UserSession())->userId);
        //$this->assignment->setUsergroupIdentification(())

        //$this->saveWorkflow();

        $data = new ToDo();
        $data->id = $this->dataId;
        $data->updateOnDuplicate = true;
        $data->toDo = $this->toDo;
        //$data->workflowId = $this->dataId;
        //$data->userId = (new UserSession())->userId;
        $data->save();

        $this->addSearchText($this->toDo);

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



    public function getDataRow()
    {

        $reader= new ToDoReader();
        $reader->model->loadWorkflow();
        $row = $reader->getRowById($this->dataId);

        return $row;

    }

}