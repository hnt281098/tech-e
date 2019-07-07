<?php
namespace Backend\Controller;

use Backend\Controller\AppController;
use Cake\Log\Log;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public $helpers = ['Form','Paginator','Html', 'Session'];
    public $components = ['RequestHandler'];

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    // public function display(...$path)
    // {
    //     $count = count($path);
    //     if (!$count) {
    //         return $this->redirect('/');
    //     }
    //     if (in_array('..', $path, true) || in_array('.', $path, true)) {
    //         throw new ForbiddenException();
    //     }
    //     $page = $subpage = null;

    //     if (!empty($path[0])) {
    //         $page = $path[0];
    //     }
    //     if (!empty($path[1])) {
    //         $subpage = $path[1];
    //     }
    //     $this->set(compact('page', 'subpage'));

    //     try {
    //         $this->render(implode('/', $path));
    //     } catch (MissingTemplateException $exception) {
    //         if (Configure::read('debug')) {
    //             throw $exception;
    //         }
    //         throw new NotFoundException();
    //     }
    // }

    public function index($currentPage = 'users', $type = 'children', $action ='', $statusId = 1, $message = '')
    {
        if (!empty($this->request->query('currentPage'))) {
            $currentPage = $this->request->query('currentPage');
        }

        if (!empty($this->request->query('type'))) {
            $type = $this->request->query('type');
        }

        if (!empty($this->request->query('action'))) {
            $type = $this->request->query('action');
        }

        if (!empty($this->request->query('statusId'))) {
            $statusId = $this->request->query('statusId');
        }

        if (!empty($this->request->query('message'))) {
            $message = $this->request->query('message');
        }

        $this->set(compact('type', 'currentPage', 'action', 'statusId', 'message'));
    }
}
