<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Psr\Http\Message\ResponseInterface;

/**
 * Description of LayoutView
 *
 * @author ndobromirov
 */
class LayoutView
{
    /**
     *
     * @var \Slim\Views\PhpRenderer
     */
    private $view;

    private $layoutTemplate;
    private $layoutAttributes;

    private $templateExtension;

    private $settings;

    public function __construct(\Slim\Views\PhpRenderer $renderer, array $settings = [])
    {
        $this->view = $renderer;

        // Append defaults.
        $settings += [
            'template_extension' => 'phtml',
            'layout_template' => 'layout_default',
            'layout_attributes' => [],
        ];
        $this->layoutTemplate = $settings['layout_template'];
        $this->layoutAttributes = $settings['layout_attributes'];
        $this->templateExtension = $settings['template_extension'];
    }

    public function render(ResponseInterface $response, $template, array $data = [])
    {
        // Render the inner template.
        $pageContent = $this->view->fetch($this->getTemplate($template), $data);

        // Render the whole page.
        $layout = $this->getTemplate($this->layoutTemplate);
        $attributes = array_merge($this->layoutAttributes, [
            'content' => $pageContent,
        ]);
        return $this->view->render($response, $layout, $attributes);
    }

    private function getTemplate($name)
    {
        return "{$name}.{$this->templateExtension}";
    }
}
