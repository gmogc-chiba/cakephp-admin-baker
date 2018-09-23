<?php
namespace AdminBaker\Shell\Task;

use Cake\Console\Shell;
use Cake\Core\Configure;
use Bake\Shell\Task\BakeTask;

class AdminBakerTask extends BakeTask
{
    public $tasks = [
        'Bake.BakeTemplate',
    //     'Bake.Test',
    ];

    public function main($name = null)
    {
        parent::main();
        $name = $this->_getName($name);

        $this->bake($name);
    }

    public function bake($name = null)
    {
        $this->out("\n" . "Baking admin-baker files...", 1, Shell::QUIET);

        $out = $this->bakeLayout();
        $this->bakeElements($name);
        $this->bakeView();
        $this->bakeController();

        return $out;
    }

    public function bakeLayout()
    {
        $this->pathFragment = 'Template/Layout/';
        $contents = $this->BakeTemplate->generate('AdminBaker.Template/Layout/layout');
        $path = $this->getPath();
        $filename = $path . 'admin_baker.ctp';
        $this->createFile($filename, $contents);

        return $contents;
    }

    public function bakeElements($name)
    {
        $this->bakeHeader($name);
        $this->bakeSidebar($name);
    }

    public function bakeHeader($name)
    {
        $this->pathFragment = 'Template/Element/AdminBaker/';
        $this->BakeTemplate->set(['name' => $name]);
        $contents = $this->BakeTemplate->generate('AdminBaker.Template/Element/header');
        $path = $this->getPath();
        $filename = $path . 'header.ctp';
        $this->createFile($filename, $contents);

        return $contents;
    }

    public function bakeSidebar($name)
    {
        $this->pathFragment = 'Template/Element/AdminBaker/';
        $this->BakeTemplate->set(['name' => $name]);
        $contents = $this->BakeTemplate->generate('AdminBaker.Template/Element/sidebar');
        $path = $this->getPath();
        $filename = $path . 'sidebar.ctp';
        $this->createFile($filename, $contents);

        return $contents;
    }

    public function bakeView()
    {
        $this->pathFragment = 'View/';
        $contents = $this->BakeTemplate->generate('AdminBaker.View/view');
        $path = $this->getPath();
        $filename = $path . 'AdminBakerView.php';
        $this->createFile($filename, $contents);

        return $contents;
    }

    public function bakeController()
    {
        $this->pathFragment = 'Controller/';
        $contents = $this->BakeTemplate->generate('AdminBaker.Controller/controller');
        $path = $this->getPath();
        $filename = $path . 'AdminBakerController.php';
        $this->createFile($filename, $contents);

        return $contents;

    }
}