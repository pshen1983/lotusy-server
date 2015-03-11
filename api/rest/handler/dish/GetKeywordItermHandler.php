<?php
class GetKeywordItermHandler extends UnauthorizedRequestHandler {

    public function handle($params) {
        $terms = ItermDao::getTypeLanguageCodeDescriptionMap(ItermDao::TYPE_KEYWORD, $params['language']);

        $response = array();
        $response['status'] = 'success';
        $response['terms'] = $terms;

        return $response;
    }
}
?>