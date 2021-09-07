<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Show extends Component
{
    public $_fields;
    public $_data;
    public $route_prefix;

    /**
     * Show constructor.
     * @param array $fields
     * @param array $data
     * @param string $routePrefix
     */
    public function __construct($fields = [], $data = [], $routePrefix = 'dashboard.index')
    {
        $this->_fields = $fields;
        $this->_data = $data;
        $this->route_prefix = $routePrefix;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.show');
    }
}
