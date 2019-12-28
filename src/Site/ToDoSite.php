<?php


namespace Nemundo\ToDo\Site;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Sql\Field\CountField;
use Nemundo\Db\Sql\Field\DistinctField;
use Nemundo\Db\Sql\Field\Field;
use Nemundo\Db\Sql\Join\SqlJoinType;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Block\Hr;
use Nemundo\Model\Join\ModelJoin;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Process\Content\Data\ContentGroup\ContentGroupModel;
use Nemundo\Process\Content\Data\ContentGroup\ContentGroupReader;
use Nemundo\Process\Group\Data\GroupUser\GroupUserModel;
use Nemundo\Process\Group\Data\GroupUser\GroupUserReader;
use Nemundo\ToDo\Com\ToDoTable;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Page\ToDoPage;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Web\Site\AbstractSite;

class ToDoSite extends AbstractSite
{

    /**
     * @var ToDoSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title='To Do';
        $this->url = 'todo';
        //$this->menuActive = false;

        ToDoSite::$site = $this;

        new DoneSite($this);

    }

    public function loadContent()
    {
        //(new ToDoPage())->render();

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        // restricted area


        /*$reader = new ContentGroupReader();
        //$reader->filter->andEqual($reader->)


       foreach ( $reader->getData() as $contentGroupRow) {


       }*/


        $table=new AdminClickableTable($page);

        $reader = new ToDoReader();
        $reader->model->loadWorkflow();
        $reader->model->workflow->loadProcess();

        /*$field = new Field($reader);
        $field->fieldName = 'DISTINCT id';
        $field->aliasFieldName = 'distinct_id';*/

      $field= new DistinctField($reader);
      $field->tableName = $reader->model->tableName;


        //$reader->addField()

        $contentGroupModel = new ContentGroupModel();
        $groupUserModel=new GroupUserModel();

        $join=new ModelJoin($reader);
        //$join->joinType = SqlJoinType::RIGHT_JOIN;
        $join->type = $reader->model->id;
        $join->externalModel=$contentGroupModel;
        $join->externalType = $contentGroupModel->contentId;

        //$reader->addFieldByModel($contentGroupModel);


        $join=new ModelJoin($reader);
        //$join->joinType = SqlJoinType::RIGHT_JOIN;
        $join->type =$contentGroupModel->groupId;
        $join->externalModel=$groupUserModel;
        $join->externalType = $groupUserModel->groupId;


//        $reader->filter->andEqual($contentGroupModel->groupId,'780a0094-b408-45ca-801a-4871e3b31fc2');
        $reader->filter->andEqual($groupUserModel->userId, (new UserSessionType())->userId);

        $reader->addOrder($reader->model->workflow->number);

        foreach ($reader->getData() as $toDoRow) {

            $row=new BootstrapClickableTableRow($table);
            $row->addText($toDoRow->workflow->workflowNumber);
            $row->addText($toDoRow->toDo);

          //  $row->addClickableSite($toDoRow->workflow->getViewSite());

        }


        (new Hr($page));

        $table = new ToDoTable($page);
        $table->showDoneItem = true;


        $page->render();


    }

}