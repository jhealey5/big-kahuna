<?php

namespace Statamic\Addons\Menus;

use Statamic\API\Nav;
use Statamic\Extend\Listener;

class MenusListener extends Listener
{
    /**
     * The events to be listened for, and the methods to call.
     *
     * @var array
     */
    public $events = [
        'cp.nav.created' => 'addNavItems',
        'cp.add_to_head' => 'injectMenuStyles'
    ];

    public function addNavItems($nav)
    {
        // Create the first level navigation item
        // Note: by using route('store'), it assumes you've set up a route named 'store'.
        $menus = Nav::item('Menus')->route('addons.menu_editor')->icon('air');

        // Finally, add our first level navigation item
        // to the navigation under the 'tools' section.
        $nav->addTo('tools', $menus);
    }

    /**
     * Return a <link> tag containing the addon stylesheet
     * @return string
     */
    public function injectMenuStyles()
    {
        echo '<pre>';
        var_dump($this);
        echo '</pre>';
        $html = $this->css->tag('styles');
        // $html .= $this->js->tag('test.json');
        return $html;
    }
}
