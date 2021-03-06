<?php


namespace Nemundo\ToDo\Workflow\Process;


use Nemundo\Process\App\Notification\Category\TaskCategory;
use Nemundo\Process\Template\Content\User\UserContentType;
use Nemundo\Process\Workflow\Content\Process\AbstractProcess;
use Nemundo\ToDo\Content\App\ToDoApp;
use Nemundo\ToDo\Content\ToDoContentList;
use Nemundo\ToDo\Data\ToDo\ToDo;
use Nemundo\ToDo\Data\ToDo\ToDoDelete;
use Nemundo\ToDo\Data\ToDo\ToDoModel;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Parameter\ToDoParameter;
use Nemundo\ToDo\Site\ToDoSite;
use Nemundo\ToDo\Workflow\Form\ToDoProcessForm;
use Nemundo\ToDo\Workflow\Status\CreateProcessStatus;
use Nemundo\ToDo\Workflow\View\ToDoView;
use Nemundo\User\Type\UserSessionType;


class ToDoProcess extends AbstractProcess
{

    //use ProcessStatusTrait;

    /**
     * @var string
     */
    public $toDo;

    //public $groupId;

    protected function loadContentType()
    {

        $this->typeLabel = 'To Do';
        $this->typeId = '6925df2d-ee59-49d4-aa8b-c03e0900f589';
        $this->prefixNumber = 'TODO-';
        $this->startNumber = 200;
        $this->startContentType = new CreateProcessStatus();
        $this->formClass = ToDoProcessForm::class;
        $this->viewClass = ToDoView::class;
        //$this->processViewClass= ProcessView::class;
        $this->listClass = ToDoContentList::class;
        $this->viewSite = ToDoSite::$site;
        $this->parameterClass = ToDoParameter::class;

        $this->workflowModel = new ToDoModel();

    }


    protected function onCreate()
    {

        $data = new ToDo();
        $data->active = true;
        $data->number = $this->getNumber();
        $data->workflowNumber = $this->getWorkflowNumber();
        $data->toDo = $this->toDo;
        $data->dateTime = $this->dateTime;
        $data->assignmentId = (new UserContentType((new UserSessionType())->userId))->getGroupId();
        $this->dataId = $data->save();



    }


    protected function onFinished()
    {

        $status = new CreateProcessStatus();
        $status->parentId = $this->getContentId();
        $status->saveType();


        $groupId = (new UserContentType((new UserSessionType())->userId))->getGroupId();
        $this->sendGroupNotification($groupId, new TaskCategory());


        //$this->sendFavoriteNotification();

    }


    protected function onIndex()
    {

        parent::onIndex();

        $row = $this->getDataRow();
        $this->addSearchWord($row->toDo);

    }


    protected function onDelete()
    {
        (new ToDoDelete())->deleteById($this->dataId);
    }


    protected function onDataRow()
    {

        $reader = new ToDoReader();
        $reader->model->loadStatus();
        $reader->model->loadAssignment();
        $reader->model->assignment->loadGroupType();
        $reader->model->loadUser();
        $this->dataRow = $reader->getRowById($this->dataId);

    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|\Nemundo\ToDo\Data\ToDo\ToDoRow
     */
    public function getDataRow()
    {
        return parent::getDataRow(); // TODO: Change the autogenerated stub
    }

    public function getSubject()
    {

        $dataRow = $this->getDataRow();
        $subject = $dataRow->workflowNumber . ' ' . $dataRow->toDo;

        return $subject;

    }


    protected function getSourceContentId()
    {

        $contentId = (new ToDoApp())->getContentId();
        return $contentId;
        // TODO: Implement getSourceContentId() method.
    }

}