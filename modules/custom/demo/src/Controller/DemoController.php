<?php

namespace Drupal\demo\Controller;

use Drupal\Core\Controller\ControllerBase;

class DemoController extends ControllerBase
{
    /**
     * @return array
     */
    public function demo() {
        return array(
          '#type' => 'markup',
          '#markup' => t('Hello World!'),
        );
    }

    /**
     * @return bool|null|string
     */
    public function content() {
        $output = views_embed_view('articles','default');
        return $output;
//        return array(
//            '#type' => 'markup',
//            '#markup' => t('Hello Content!'),
//        );
    }
}
