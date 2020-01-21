<?php


namespace Nemundo\ToDo\Workflow\View;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Debug\Debug;
use Nemundo\Html\Block\Hr;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Process\Content\Com\Dropdown\ContentTypeDropdown;
use Nemundo\Process\Content\Com\Table\SourceTable;
use Nemundo\Process\Content\Parameter\ContentTypeParameter;
use Nemundo\Process\Content\View\AbstractContentView;
use Nemundo\Process\Workflow\Com\Layout\WorkflowLayout;

use Nemundo\Process\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Process\Workflow\Parameter\StatusParameter;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;
use Nemundo\Web\Site\Site;

class ToDoProcessView extends AbstractContentView
{


    public function getContent()
    {

        /** @var ToDoProcess $process */
        $process = $this->contentType;

        $title = new AdminTitle($this);
        $title->content = $this->contentType->getSubject();

        $layout = new WorkflowLayout($this);


        $workflowReader = new ToDoReader();  // new WorkflowReader();
        $workflowReader->model->loadWorkflow();
        $workflowReader->model->workflow->loadStatus();
        $workflowReader->model->workflow->loadContent();

        $workflowRow = $workflowReader->getRowById($this->dataId);

        $workflowStatus = $workflowRow->workflow->status->getContentType();
        $formStatus = (new StatusParameter())->getStatus();

        //(new Debug())->write($workflowStatus->typeLabel);
        //(new Debug())->write($formStatus);

        $dropdown = new ContentTypeDropdown($layout->col2);

        foreach ($workflowStatus->getMenuList() as $menu) {
            $dropdown->addContentType($menu);
        }


        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->exists()) {

            $contentType = $contentTypeParameter->getContentType();

           $form =  $contentType->getForm($layout->col2);
            $form->parentId=$process->getContentId();
            $form->redirectSite = new Site();
        }

        $table = new AdminTable($layout->col3);

        foreach ($process->getChild() as $contentRow) {

            $p = new Paragraph($layout->col3);
            $p->content = $contentRow->user->displayName;

            $p = new Paragraph($layout->col3);
            $p->content = $contentRow->dateTime->getShortDateTimeWithSecondLeadingZeroFormat();

            $child = $contentRow->getContentType();
            $child->getView($layout->col3);

            (new Hr($layout->col3));

            $row = new TableRow($table);
            $row->addText($child->getSubject());

        }


        /*foreach ($process->getParentContent() as $customRow) {
            (new Debug())->write($customRow->subject);
        }*/

        //(new Debug())->write($this->dataId);

        $table =new SourceTable($layout->col3);
        $table->contentType = $process;

        /*
        $menu = new ProcessMenu($layout->col1);
        $menu->process = $this->contentType;
        $menu->workflowId = $this->dataId;
        $menu->formStatus = $formStatus;
        $menu->workflowStatus = $workflowStatus;
        $menu->site = clone(ToDoSite::$site);
        $menu->site->addParameter(new ToDoParameter($this->dataId));


        /*
        if ($formStatus !== null) {
            $widget = new AdminWidget($layout->col2);
            $widget->widgetTitle = $formStatus->typeLabel;

            $form = new StatusFormContainer($widget);
            $form->formStatus = $formStatus;
            $form->workflowStatus = $workflowStatus;
            //$form->appendWorkflowParameter=true;

            $form->site = clone(ToDoSite::$site);
            $form->workflowId = $this->dataId;
            //$form->appendWorkflowParameter = $this->appendWorkflowParameter;
        }


        //$container = new WorkflowStreamContainer($layout->col2);
        //$container->parentId = $this->dataId;




        /*
        $workflowStatus = null;
        $formStatus = null;
        $workflowTitle = null;

        if ($this->redirectSite == null) {
            $this->redirectSite = new Site();
        }
        $this->redirectSite->addParameter(new WorkflowParameter());

        //(new Debug())->write($this->dataId);

        if ($this->dataId !== null) {

            $workflowReader = new WorkflowReader();
            $workflowReader->model->loadProcess();
            $workflowReader->model->loadStatus();
            $workflowRow = $workflowReader->getRowById($this->dataId);

            $workflowStatus = $workflowRow->status->getContentType();
            $formStatus = (new StatusParameter())->getStatus();
            $workflowTitle = $workflowRow->getSubject();


        } else {

            $formStatus = $this->contentType;
            $workflowStatus = $formStatus;
            $workflowTitle = 'Neu';

        }

        if ($formStatus === null) {
            $formStatus = $workflowStatus->getNextMenu();
        }

        $title = new AdminTitle($this);
        $title->content = $workflowTitle;

        $layout = new WorkflowLayout($this);


        if ($this->dataId !== null) {


            //(new Debug())->write($this->contentType->getDataId());

            if ($this->contentType->hasView()) {
                $this->contentType->getView($layout->col3);
            }

        }

        $menu = new ProcessMenu($layout->col1);
        $menu->process = $this->contentType;
        $menu->workflowId = $this->dataId;
        $menu->formStatus = $formStatus;
        $menu->workflowStatus = $workflowStatus;
        $menu->site = clone($this->redirectSite);
        $menu->site->addParameter(new WorkflowParameter($this->dataId));

        if ($formStatus !== null) {
            $widget = new AdminWidget($layout->col2);
            $widget->widgetTitle = $formStatus->typeLabel;

            $form = new StatusFormContainer($widget);
            $form->formStatus = $formStatus;
            $form->workflowStatus = $workflowStatus;
            //$form->appendWorkflowParameter=true;

            $form->site = clone($this->redirectSite);
            $form->workflowId = $this->dataId;
            $form->appendWorkflowParameter = $this->appendWorkflowParameter;
        }


        $container = new WorkflowStreamContainer($layout->col2);
        $container->parentId = $this->dataId;


        //$view = new  new DocumentParentContainer($layout->col3);
        //$view->parentId = $this->dataId;

        $container = new AufgabeParentContainer($layout->col3);
        $container->parentId = $this->dataId;


        $table = new SourceTable($layout->col3);
        $table->parentId = $this->dataId;


        $btn = new AdminEventButton($layout->col3);
        $btn->content = 'History anzeigen (Toggle)';

        $table = new WorkflowLogTable($layout->col3);
        $table->parentId = $this->dataId;

        */


        return parent::getContent(); // TODO: Change the autogenerated stub
    }


}