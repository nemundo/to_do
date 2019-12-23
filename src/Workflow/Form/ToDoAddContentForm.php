<?php


namespace Nemundo\ToDo\Workflow\Form;


use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Process\Content\Form\AbstractContentForm;
use Nemundo\Process\Content\Item\ContentItem;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;

class ToDoAddContentForm extends AbstractContentForm
{

    /**
     * @var BootstrapListBox
     */
    private $todo;

    public function getContent()
    {
        $this->todo = new BootstrapListBox($this);

        $reader = new ToDoReader();
        $reader->model->loadWorkflow();
        foreach ($reader->getData() as $toDoRow) {
            $this->todo->addItem($toDoRow->workflowId, $toDoRow->workflow->getSubject());
        }

        return parent::getContent(); // TODO: Change the autogenerated stub
    }


    protected function onSubmit()
    {


        $item = new ContentItem();
        $item->contentType = new ToDoProcess();  // ToDoAddContentType();
        $item->parentId = $this->parentId;
        $item->dataId = $this->todo->getValue();
        $item->saveItem();

        // TODO: Implement onSubmit() method.
    }

}