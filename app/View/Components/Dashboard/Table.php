<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Table extends Component
{
    public $_data;
    public $columns;
    public $route_prefix;

    /**
     * Table constructor.
     * @param $data
     * @param $columns
     * @param $routePrefix
     */
    public function __construct($data, $columns, $routePrefix)
    {
        $this->_data = $data;
        $this->columns = $columns;
        $this->route_prefix = $routePrefix;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.table');
    }
}
