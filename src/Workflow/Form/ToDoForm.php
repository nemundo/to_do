<?php


namespace Nemundo\ToDo\Workflow\Form;


use Nemundo\Core\Debug\Debug;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Process\Workflow\Content\Form\AbstractStatusForm;
use Nemundo\Process\Workflow\Parameter\WorkflowParameter;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Workflow\Builder\ToDoBuilder;

class ToDoForm extends AbstractStatusForm
{

    /**
     * @var BootstrapTextBox
     */
    private $todo;


    public function getContent()
    {

        $this->todo = new BootstrapTextBox($this);
        $this->todo->label = 'To Do';
        $this->todo->validation = true;

        //(new Debug())->write($this->parentId);

/*
        $p = new Paragraph($this);
        $p->content = 'parentid'.$this->parentId;

        $p = new Paragraph($this);
        $p->content = 'dataid'.$this->dataId;


        if ($this->parentId !==null) {
            $this->loadUpdateForm();
        }*/

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {


        $reader = new ToDoReader();
        $reader->model->loadWorkflow();
        $reader->filter->andEqual($reader->model->workflowId, $this->parentId);
        $todoRow = $reader->getRow();

        $this->todo->value = $todoRow->workflow->subject;  // - >workflow->subject;

    }


    protected function onSubmit()
    {

        $builder = new ToDoBuilder();
        $builder->parentId = $this->parentId;
        $builder->toDo = $this->todo->getValue();
        $builder->saveItem();

        if ($this->appendParameter) {
            $this->redirectSite->addParameter(new WorkflowParameter($builder->dataId));
        }


    }


}