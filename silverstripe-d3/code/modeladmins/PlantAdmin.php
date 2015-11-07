<?php

class PlantAdmin extends ModelAdmin
{
    private static $managed_models = array(
        'Plant',
    );

    private static $url_segment = 'plants';

    private static $menu_title = 'Plants';
}
