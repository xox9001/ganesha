<?php
namespace Ackintosh\Ganesha\GuzzleMiddleware;

use Psr\Http\Message\RequestInterface;

class ResourceNameExtractor implements ResourceNameExtractorInterface
{
    /**
     * @var string
     */
    const OPTION_KEY = 'ganesha.resource_name';

    /**
     * @var string
     */
    const HEADER_NAME = 'X-Ganesha-Resource-Name';

    /**
     * @param RequestInterface $request
     * @param array $requestOptions
     * @return string
     */
    public function extract(RequestInterface $request, array $requestOptions)
    {
        if (array_key_exists(self::OPTION_KEY, $requestOptions)) {
            return $requestOptions[self::OPTION_KEY];
        }

        $header = $request->getHeader(self::HEADER_NAME);
        if (count($header)) {
            return $header[0];
        }
    }
}