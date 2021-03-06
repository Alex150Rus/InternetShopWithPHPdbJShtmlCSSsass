<?php
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 19.01.2019
 * Time: 5:34
 */

namespace app\services\renderers;


use app\interfaces\IRenderer;
use app\base\App;

class TwigRenderer implements IRenderer
{

  protected $templater;

  /**
   * TwigRenderer constructor.
   */
  public function __construct()
  {
    $this->templater = new \Twig_Environment(
      new \Twig_Loader_Filesystem(App::call()->config['templatesDir'] . "twig"),
      ['autoescape' => false]
    );
  }


  public function render($template, $params = [])
{
  $template.= ".twig";
  return $this->templater->render($template, $params);
}
}