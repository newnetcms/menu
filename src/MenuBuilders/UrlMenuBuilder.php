<?php

namespace Newnet\Menu\MenuBuilders;

class UrlMenuBuilder extends BaseFrontendMenuBuilder
{
    public function getTitle()
    {
        return __('menu::menu.url_menu_builder.panel_title');
    }

    public function getViewName()
    {
        return 'menu::menu-builder.url-menu-builder';
    }

    public function getFrontendUrl()
    {
        $url = $this->args['url'] ?? '#';

        // Fragment-only links (e.g. "#hero") are page-relative anchors, not
        // real paths - leave them alone so they keep scrolling the current
        // page instead of being rewritten into a locale-prefixed URL.
        if (str_starts_with($url, '#')) {
            return $url;
        }

        return localize_url($url);
    }

    public function isActive()
    {
        $itemUrl = $this->args['url'] ?? null;
        return request()->fullUrl() == url($itemUrl);
    }
}
