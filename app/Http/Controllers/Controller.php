<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Validator;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function __construct() {
        $this->config = config('project.config');
    }

    public function doValidation($request) {
        return $this->validateRequest($request, $this->config['ad_types'][$this->adType][$this->type]);
    }

    private function validateRequest($request_data, $validation) {
        $validator = Validator::make($request_data, $validation, $this->config['validation_message']);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $message) {
                $mesageArr = explode("##", $message);
                return $this->sendOutput($mesageArr[1], ["attribute" => $mesageArr[0]]);
            }
        }
        return True;
    }

    private function sendOutput($code, $data = []) {
        $codes = $this->config['error_codes'];

        $return['code']    = $code;
        $return['message'] = $codes[$code]['message'];

        if (isset($data['attribute'])) {
            $return['message'] = str_replace('##', $data['attribute'], $codes[$code]['message']);
        }

        unset($data['attribute']);
        $return['data'] = $data;

        return $return;
    }

}
