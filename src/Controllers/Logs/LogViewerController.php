<?php namespace Sebastienheyd\Boilerplate\Controllers\Logs;

use Arcanedev\LogViewer\Http\Controllers\LogViewerController as ArcanedevController;
use Arcanedev\LogViewer\Contracts\LogViewer as LogViewerContract;

class LogViewerController extends ArcanedevController
{
    /**
     * LogViewerController constructor.
     *
     * @param LogViewerContract $logViewer
     */
    public function __construct(LogViewerContract $logViewer)
    {
        $this->middleware('ability:admin,logs');
        parent::__construct($logViewer);
    }

    protected $showRoute = 'logs.show';

    /**
     * @param string $view
     * @param array $data
     * @param array $mergeData
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function view($view, $data = [ ], $mergeData = [ ])
    {
        return view('boilerplate::logs.'.$view, $data, $mergeData);
    }
}
