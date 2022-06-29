<?php

class Api_Search extends Core_Controller
{
    /**
     * @var string[]
     */
    private $matches;

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_MissedParameter
     */
    public function autocomplete(Http_Request $request)
    {
        $searchString = preg_replace('/.+\s/ui', '', $this->getValueOrThrowException($request->getGet(), 'q'));

        foreach (Map_Autocomplete::MAP as $word) {
            if (preg_match(sprintf('/^%s/ui',$searchString), $word)) {
                $this->matches[] = $word;
            }
        }

        return new Http_Response(implode(PHP_EOL, $this->matches));
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_MissedParameter
     */
    public function smartsearch(Http_Request $request)
    {
        $filters = SmartSearch_StringAnalyzer::create(
            array_merge(
                Map_SmartSearch::MAP,
                SmartSearch_MapFormatter::format($this->getController()->getAllGroups())
            )
        )->analyze($this->getValueOrThrowException($request->getPost(), 'text'));

        $filters['category'] = $this->getValueOrThrowException($request->getPost(), 'category');

        return
            new Http_Response(
                '',
                Enum_HttpStatusCode::HTTP_MOVED_PERMANENTLY,
                [
                    'Location' => $request->getProtocol()
                        . '://' . $request->getServer()['HTTP_HOST']
                        . '/' . Flight::get('taal')
                        . '/people/?' . http_build_query($filters)
                ]
            );
    }
}
