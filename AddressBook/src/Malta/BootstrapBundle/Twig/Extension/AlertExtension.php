<?php
/**
 * Created by PhpStorm.
 * User: Raya
 * Date: 27/04/2017
 * Time: 11:50
 */

namespace Malta\BootstrapBundle\Twig\Extension;


use Symfony\Component\HttpFoundation\Session\Session;

class AlertExtension extends \Twig_Extension
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * AlertExtension constructor.
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }


    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('bootstrap_alert', [$this, 'alert'], ['is_safe' => ['html']])
        ];
    }

    public function alert($type = 'success') {
        $html = '';

        foreach ($this->session->getFlashBag()->get($type) as $msg) {
            $html .= <<<STRHTML
<div class="alert alert-$type alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    $msg
</div>
STRHTML;
        }

        return $html;
    }
}