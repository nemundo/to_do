<?php


namespace Nemundo\ToDo\Workflow\Process;


use Nemundo\Process\App\Assignment\Content\Group\AssignmentContentType;
use Nemundo\Process\Template\Content\User\UserContentType;
use Nemundo\Process\Template\Status\UserAssignmentProcessStatus;
use Nemundo\Process\Workflow\Content\Process\AbstractProcess;
use Nemundo\Process\Workflow\Content\Status\ProcessStatusTrait;
use Nemundo\Process\Workflow\Content\View\ProcessView;
use Nemundo\ToDo\Content\ToDoContentList;
use Nemundo\ToDo\Data\ToDo\ToDo;
use Nemundo\ToDo\Data\ToDo\ToDoDelete;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Data\ToDo\ToDoUpdate;
use Nemundo\ToDo\Parameter\ToDoParameter;
use Nemundo\ToDo\Site\ToDoSite;
use Nemundo\ToDo\Workflow\Form\ToDoProcessForm;
use Nemundo\ToDo\Workflow\Status\CreateProcessStatus;
use Nemundo\ToDo\Workflow\View\ToDoProcessView;
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
        $this->processViewClass= ProcessView::class;
        $this->listClass = ToDoContentList::class;
        $this->viewSite = ToDoSite::$site;
        $this->parameterClass=ToDoParameter::class;

    }


    protected function onCreate()
    {

        $this->workflowSubject = $this->toDo;

        $data = new ToDo();
        $data->toDo = $this->toDo;
        $this->dataId = $data->save();

        $status = new CreateProcessStatus();
        $status->parentId = $this->getContentId();
        $status->saveType();

        $status = new AssignmentContentType();
        $status->parentId=$this->getContentId();
        $status->groupId=(new UserContentType((new UserSession())->userId))->getGroupId();
        $status->saveType();

    }


    protected function onFinished()
    {

        $update = new ToDoUpdate();
        $update->workflowId=$this->workflowId;
        $update->updateById($this->dataId);

       /*
        $item = new UserAssignmentProcessStatus();
        $item->parentId = $this->getContentId();
        $item->userId = (new UserSession())->userId;
        $item->saveType();*/


    }


     protected function onSearchIndex()
     {
         $this->addSearchText($this->toDo);

     }


     protected function onDelete()
     {
         (new ToDoDelete())->deleteById($this->dataId);
     }


    public function getDataRow()
    {

        $reader = new ToDoReader();
        $reader->model->loadWorkflow();
        $row = $reader->getRowById($this->dataId);

        return $row;

    }

}