<?php


namespace Nemundo\ToDo\Workflow\Process;


use Nemundo\Process\Template\Status\UserAssignmentProcessStatus;
use Nemundo\Process\Workflow\Content\Process\AbstractProcess;
use Nemundo\Process\Workflow\Content\Status\ProcessStatusTrait;
use Nemundo\ToDo\Content\ToDoContentList;
use Nemundo\ToDo\Data\ToDo\ToDo;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Workflow\Form\ToDoProcessForm;
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

        $this->typeLabel = 'To Do';
        $this->typeId = '6925df2d-ee59-49d4-aa8b-c03e0900f589';
        $this->prefixNumber = 'TODO-';
        $this->startNumber = 200;
        $this->startContentType = new CreateProcessStatus();
        $this->formClass = ToDoProcessForm::class;
        $this->viewClass = ToDoView::class;
        $this->listClass = ToDoContentList::class;

    }


    protected function onCreate()
    {

        $this->workflowSubject = $this->toDo;
        $this->assignment->setUserIdentification((new UserSession())->userId);

        $data = new ToDo();
        $data->id = $this->getDataId();  // $this->dataId;
        $data->updateOnDuplicate = true;
        $data->toDo = $this->toDo;
        //$data->userId = (new UserSession())->userId;
        $data->save();

        $this->addSearchText($this->toDo);

        /*
        $item = new AddGroupContentItem();
        $item->parentId = $this->dataId;
        $item->saveItem();*/


        $status=new CreateProcessStatus();
        $status->parentId=$this->dataId;
        $status->saveType();


        $item = new UserAssignmentProcessStatus();
        $item->parentId = $this->dataId;  //parentId;  //dataId;
        $item->userId = (new UserSession())->userId;
        $item->saveType();

    }







    public function getDataRow()
    {

        $reader = new ToDoReader();
        $reader->model->loadWorkflow();
        $row = $reader->getRowById($this->dataId);

        return $row;

    }

}