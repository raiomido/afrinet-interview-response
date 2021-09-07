<?php
/**
 * Created by PhpStorm.
 * User: raiomido
 * Date: 3/7/19
 * Time: 1:01 PM
 */

namespace App\Misc\Composers;

use Illuminate\Support\Str;
use Illuminate\View\View;


class AppComposer
{

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'user' => ($user = auth()->user()),
            'pageTitle' => $this->getTitle(),
        ]);
    }

    private function getTitle() {
        $url_path = parse_url(request()->fullUrl(), PHP_URL_PATH);
        $title =  $url_path ? pathinfo($url_path, PATHINFO_BASENAME) : config('app.name');
        return ucwords($title);
    }
}
