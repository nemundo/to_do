<?php


namespace Nemundo\ToDo\Workflow\View;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Process\Content\Item\ContentItem;
use Nemundo\Process\Workflow\Com\Table\BaseWorkflowTable;
use Nemundo\Process\Content\View\AbstractContentView;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;

class ToDoView extends AbstractContentView
{

    public function getContent()
    {

        $table = new BaseWorkflowTable($this);
        $table->workflowId=$this->dataId;
        
        //$item = new ContentItem($this->dataId);
        $type =new ToDoProcess();
        $type->getViewSite($this->dataId);


        $btn = new AdminSiteButton($this);
        $btn->site =  $type->getViewSite($this->dataId);


        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}