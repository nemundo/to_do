<?php


namespace Nemundo\ToDo\Workflow\Item;


use Nemundo\Process\Workflow\Content\Item\Status\AbstractStatusItem;
use Nemundo\ToDo\Data\ToDo\ToDoUpdate;
use Nemundo\ToDo\Workflow\Status\DoneProcessStatus;

class DoneItem extends AbstractStatusItem
{

    public function saveItem()
    {
        $this->contentType = new DoneProcessStatus();

        $this->contentType = new DoneProcessStatus();

        $update = new ToDoUpdate();
        $update->done=true;
        $update->filter->andEqual($update->model->workflowId, $this->parentId);
        $update->update();

        $this->saveWorkflowLog();
        // TODO: Implement saveItem() method.
    }

}