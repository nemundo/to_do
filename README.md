# To Do App

To Do App for Nemundo Framework.

### Composer Installation
```
composer require nemundo/todo
```

### Submodule Installation
```
git submodule add https://github.com/nemundo/to_do.git lib/todo
```

```
$lib = new Library($autoload);
$lib->source = __DIR__ . '/lib/todo/src/';
$lib->namespace = 'Nemundo\\ToDo';
```

### Installation
```
(new \Nemundo\ToDo\Install\ToDoInstall())->install();
```


### Widget
```
(new \Nemundo\ToDo\Widget\ToDoWidget($document));

(new \Nemundo\ToDo\Site\ToDoSite($controller));

```