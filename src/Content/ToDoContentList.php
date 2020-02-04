<?php


namespace Nemundo\ToDo\Content;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Field\DistinctField;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Model\Join\ModelJoin;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Process\Config\ProcessConfig;
use Nemundo\Process\Content\Data\ContentGroup\ContentGroupModel;
use Nemundo\Process\Content\View\AbstractContentList;
use Nemundo\Process\Group\Data\GroupUser\GroupUserModel;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Parameter\ToDoParameter;
use Nemundo\ToDo\Site\ToDoSite;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Workflow\App\ToDo\Site\ToDoItemSite;

class ToDoContentList extends AbstractContentList
{
    public function getContent()
    {


        $table = new AdminClickableTable($this);


        $reader = new ToDoReader();
        $reader->model->loadStatus();
        $reader->model->loadAssignment();


        //$reader->model->loadWorkflow();
        //$reader->model->workflow->loadContent();

//        $reader->addOrder($reader->model->workflow->number);
        $reader->addOrder($reader->model->number, SortOrder::DESCENDING);

        $reader->limit =ProcessConfig::PAGINATION_LIMIT;


        $header = new TableHeader($table);
        $header->addText($reader->model->workflowClosed->label);
        $header->addText($reader->model->workflowNumber->label);
        $header->addText($reader->model->status->label);
        $header->addText($reader->model->assignment->label);
        $header->addText($reader->model->deadline->label);

        $header->addText($reader->model->dateTime->label);



        foreach ($reader->getData() as $toDoRow) {

            $row = new BootstrapClickableTableRow($table);

            $row->addYesNo($toDoRow->workflowClosed);

            //$row->addText($toDoRow->workflow->getSubject());
            $row->addText($toDoRow->workflowNumber.' '. $toDoRow->toDo);


            $row->addText($toDoRow->status->contentType);

            $row->addText($toDoRow->assignment->group);

            //$row->addText($toDoRow->deadline->getShortDateLeadingZeroFormat());

            $row->addText($toDoRow->dateTime->getShortDateLeadingZeroFormat());

            $site = clone(ToDoSite::$site);
            $site->addParameter(new ToDoParameter($toDoRow->id));
            $row->addClickableSite($site);

        }


        /*
        $table = new AdminClickableTable($this);

        $reader = new ToDoReader();
        //$reader->model->loadWorkflow();
        //$reader->model->workflow->loadProcess();

        $field = new DistinctField($reader);
        $field->tableName = $reader->model->tableName;

        $contentGroupModel = new ContentGroupModel();
        $groupUserModel = new GroupUserModel();

        $join = new ModelJoin($reader);
        $join->type = $reader->model->id;
        $join->externalModel = $contentGroupModel;
        $join->externalType = $contentGroupModel->contentId;

        $join = new ModelJoin($reader);
        $join->type = $contentGroupModel->groupId;
        $join->externalModel = $groupUserModel;
        $join->externalType = $groupUserModel->groupId;

        $reader->filter->andEqual($groupUserModel->userId, (new UserSessionType())->userId);
        $reader->addOrder($reader->model->number);

        foreach ($reader->getData() as $toDoRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($toDoRow->workflowNumber);
            $row->addText($toDoRow->toDo);

            $row->addClickableSite($this->getRedirectSite($toDoRow->id));

        }*/

        return parent::getContent();

    }

}