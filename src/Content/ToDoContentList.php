<?php


namespace Nemundo\ToDo\Content;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Db\Sql\Field\DistinctField;
use Nemundo\Model\Join\ModelJoin;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Process\Content\Data\ContentGroup\ContentGroupModel;
use Nemundo\Process\Content\View\AbstractContentList;
use Nemundo\Process\Group\Data\GroupUser\GroupUserModel;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\User\Type\UserSessionType;

class ToDoContentList extends AbstractContentList
{
    public function getContent()
    {

        $table = new AdminClickableTable($this);

        $reader = new ToDoReader();
        $reader->model->loadWorkflow();
        $reader->model->workflow->loadProcess();

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
        $reader->addOrder($reader->model->workflow->number);

        foreach ($reader->getData() as $toDoRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($toDoRow->workflow->workflowNumber);
            $row->addText($toDoRow->toDo);

            $row->addClickableSite($this->getRedirectSite($toDoRow->id));

        }

        return parent::getContent();

    }

}