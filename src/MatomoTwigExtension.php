<?php

namespace MatomoTwigExtension;

use InvalidArgumentException;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Twig extension for Matomo integration.
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class MatomoTwigExtension extends AbstractExtension
{
    /**
     * @var string|null
     */
    private $matomoHost;

    /**
     * @var string|null
     */
    private $siteId;

    /**
     * Useful for disabling Matomo tracking in dev environment.
     *
     * @var bool
     */
    private $enabled = true;

    public function __construct($matomoHost = null, $siteId = null, $enabled = true)
    {
        $this->matomoHost = $matomoHost;
        $this->siteId = $siteId;
        $this->enabled = (bool) $enabled;
    }

    public function getName()
    {
        return 'matomo';
    }

    public function getFunctions()
    {
        return [
            new TwigFunction(
                'matomo',
                [$this, 'generateMatomoTrackerCode'],
                ['is_safe' => ['html']]
            ),
        ];
    }

    /**
     * @param string|null $matomoHost
     * @param string|null $siteId
     *
     * @return string
     */
    public function generateMatomoTrackerCode($matomoHost = null, $siteId = null)
    {
        if (!$this->enabled) {
            return '';
        }

        $matomoHost = $matomoHost ?: $this->matomoHost;
        $siteId = $siteId ?: $this->siteId;

        if (null === $matomoHost) {
            throw new InvalidArgumentException('No Matomo host was configured or given to generate the tracker code');
        }
        if (null === $siteId) {
            throw new InvalidArgumentException('No Matomo site ID was configured or given to generate the tracker code');
        }

        $matomoHost = rtrim($matomoHost, '/');

        $code = <<<HTML
<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://$matomoHost/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', $siteId]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="http://$matomoHost/matomo.php?idsite=$siteId" style="border:0;" alt="" /></p></noscript>
<!-- End Matomo Code -->
HTML;

        return $code;
    }
}
