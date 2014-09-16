<?php

namespace PiwikTwigExtension;

use InvalidArgumentException;
use Twig_Extension;
use Twig_SimpleFunction;

/**
 * Twig extension for Piwik integration.
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class PiwikTwigExtension extends Twig_Extension
{
    /**
     * @var string|null
     */
    private $piwikHost;

    /**
     * @var string|null
     */
    private $siteId;

    public function __construct($piwikHost = null, $siteId = null)
    {
        $this->piwikHost = $piwikHost;
        $this->siteId = $siteId;
    }

    public function getName()
    {
        return 'piwik';
    }

    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction(
                'piwik',
                [$this, 'generatePiwikTrackerCode'],
                ['is_safe' => ['html']]
            ),
        ];
    }

    public function generatePiwikTrackerCode($piwikHost = null, $siteId = null)
    {
        $piwikHost = $piwikHost ?: $this->piwikHost;
        $piwikHost = rtrim($piwikHost, '/');
        $siteId = $siteId ?: $this->piwikHost;

        if ($piwikHost === null) {
            throw new InvalidArgumentException('No Piwik host was configured or given to generate the tracker code');
        }
        if ($siteId === null) {
            throw new InvalidArgumentException('No Piwik site ID was configured or given to generate the tracker code');
        }

        $code = <<<HTML
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://$piwikHost/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', $siteId]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="http://$piwikHost/piwik.php?idsite=$siteId" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
HTML;

        return $code;
    }
}
