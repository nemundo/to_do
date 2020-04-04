<?php


namespace Nemundo\ToDo\Workflow\Form;


use Nemundo\Core\Debug\Debug;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Process\Workflow\Content\Form\AbstractStatusForm;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;

class ToDoProcessForm extends AbstractStatusForm
{

    /**
     * @var ToDoProcess
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $todo;


    public function getContent()
    {

        $this->todo = new BootstrapTextBox($this);
        $this->todo->label = 'To Do';
        $this->todo->validation = true;
        $this->todo->autofocus=true;

        //$p = new Paragraph($this);
        //$p->content = 'parentid' . $this->parentId;


        //(new Debug())->write($this->dataId);

        //$p = new Paragraph($this);
        //$p->content = 'dataid' . $this->dataId;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        //$process = new ToDoProcess();
        //$process->parentId = $this->parentId;
        $this->contentType->toDo = $this->todo->getValue();
        $this->contentType->saveType();

        //exit;

        /*
        if ($this->appendParameter) {
            $this->redirectSite->addParameter(new WorkflowParameter($process->getDataId()));
        }*/

    }

}