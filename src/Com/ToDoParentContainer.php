<?php


namespace Nemundo\ToDo\Com;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Model\Join\ModelJoin;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Process\Content\Com\Container\AbstractParentContainer;
use Nemundo\Process\Content\Data\Content\ContentModel;
use Nemundo\ToDo\Data\ToDo\ToDoReader;

class ToDoParentContainer extends AbstractParentContainer
{

    public function getContent()
    {

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('To Do');
        $header->addText('Assign to');
        $header->addText('Done');

        $toDoReader = new ToDoReader();
        $toDoReader->model->loadWorkflow();
        $toDoReader->model->workflow->loadProcess();
        $toDoReader->model->workflow->process->loadContentType();

        $externalModel = new ContentModel();
        $externalModel->loadUserCreated();

        $join = new ModelJoin($toDoReader);
        $join->type = $toDoReader->model->workflowId;
        $join->externalModel = $externalModel;
        $join->externalType = $externalModel->dataId;

        $toDoReader->filter->andEqual($externalModel->parentId, $this->parentId);

        $toDoReader->checkExternal($externalModel);
        $toDoReader->addFieldByModel($externalModel);

        $toDoReader->addOrder($toDoReader->model->workflow->number);
        foreach ($toDoReader->getData() as $toDoRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($toDoRow->workflow->getSubject());
            $row->addText($toDoRow->workflow->assignment->getValue());
            $row->addYesNo($toDoRow->done);

            $row->addClickableSite($toDoRow->workflow->getViewSite());

        }

        return parent::getContent();

    }

}