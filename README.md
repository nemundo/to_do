# To Do App

To Do App for Nemundo Framework.

### Composer Installation
```
composer require nemundo/todo
```

### Submodule Installation
```
git submodule add https://github.com/nemundo/srf.git lib/srf
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