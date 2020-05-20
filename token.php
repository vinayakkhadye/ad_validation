<?php

class Token {

    public function __construct() {
        $this->config = require "config.php";
    }

    public function check($response) {
        return $this->sanitize($response);
    }

    private function sanitize($response) {
        if (empty($response)) {
            return $this->forceExit('E01', []);
        }
        if (is_object(json_decode($response))) {
            $jsonData = json_decode($response, true);

            //RAVI PATEL : 2020-05-20 : DIVIDED VIVEK'S CODE TO SMALLER FUNCTIONS
            $response = [];
            if ($this->type == 'single_ad') {
                $response = $this->validateSingleJsonAd($jsonData);
            } else {
                $response = $this->validateMultiJsonAd($jsonData);
            }
            if (!empty($response))
                return $response;
            return $this->throwResponse('E00', true);
        } else {
            //RAVI PATEL : 2020-05-20 : HANDLE CODE FOR XML / HTML AD MARKUPS
            return $this->throwResponse('E00', []);
        }
    }

    private function checkValue($type, $val) {
        if (!preg_match($this->config['validation_cases'][$type], $val))
            return false;
        return true;
    }

    public function forceExit($code, $data) {
        return $this->throwResponse($code, $data);
    }

    public function throwResponse($code, $data = []) {
        $array['code'] = $code;
        if (!empty($data['attribute']))
            $array['message'] = str_replace(':attribute', $data['attribute'], $this->config['error_codes'][$code]['message']);
        else
            $array['message'] = $this->config['error_codes'][$code]['message'];

        unset($data['attribute']);
        $array['data'] = $data;

        return $array;
    }

    private function validateMandatoryParams($jsonData = [], $type = null) {
        if (!empty($type)) {
            $this->type = $type;
        }
        //Mandatory && Validation Check
        if (empty($this->config['mandatory'][$this->adType][$this->type])) {
            return $this->forceExit('E05', []);
        }
        foreach ($this->config['mandatory'][$this->adType][$this->type] as $key => $value) {
            if (!array_key_exists($key, $jsonData) || empty($jsonData[$key])) {
                return $this->forceExit('E03', ['attribute' => $key]);
            }
            if (is_array($value)) {
                foreach ($value as $k => $val) {
                    if (!array_key_exists($k, $value) || empty($jsonData[$key][$k])) {
                        return $this->forceExit('E03', ['attribute' => $key . '[' . $k . ']']);
                    }
                    if (!$this->checkValue($val, $jsonData[$key][$k])) {
                        return $this->forceExit('E04', ['attribute' => $key . '[' . $k . ']']);
                    }
                }
            } else {
                if (!$this->checkValue($value, $jsonData[$key])) {
                    return $this->forceExit('E04', ['attribute' => $key]);
                }
            }
        }
    }

    private function validateOptionalParams($jsonData = [], $type = null) {
        if (!empty($type)) {
            $this->type = $type;
        }
        //Optional && Validation Check
        if (!empty($this->config['optional'][$this->adType][$this->type])) {
            foreach ($this->config['optional'][$this->adType][$this->type] as $opKey => $opValue) {
                if (!empty($jsonData[$opKey]) || $jsonData[$opKey] != "") {
                    if (is_array($opValue)) {
                        foreach ($opValue as $k => $val) {
                            if (!array_key_exists($k, $jsonData[$opKey]) || empty($jsonData[$opKey][$k])) {
                                return $this->forceExit('E03', ['attribute' => $opKey . '.' . $k]);
                            }
                            if (!$this->checkValue($val, $jsonData[$opKey][$k])) {
                                return $this->forceExit('E04', ['attribute' => $opKey . '.' . $k]);
                            }
                        }
                    } else {
                        if (!$this->checkValue($opValue, $jsonData[$opKey])) {
                            return $this->forceExit('E04', ['attribute' => $opKey]);
                        }
                    }
                }
            }
        }
    }

    private function validateSingleJsonAd($jsonData = []) {
        $responseArray = $this->validateMandatoryParams($jsonData);
        if (!empty($responseArray)) {
            return $responseArray;
        }
        $responseArray = $this->validateOptionalParams($jsonData);
        if (!empty($responseArray)) {
            return $responseArray;
        }
    }

    private function validateMultiJsonAd($jsonData = []) {
        //RAVI PATEL : 2020-05-20 : VALIDATE OUTER JSON OF MULTIAD
        $responseArray = $this->validateMandatoryParams($jsonData);
        if (!empty($responseArray)) {
            return $responseArray;
        }
        $responseArray = $this->validateOptionalParams($jsonData);
        if (!empty($responseArray)) {
            return $responseArray;
        }
        //RAVI PATEL : 2020-05-20 : VALIDATE INNER ADS JSON WITH LOOP
        foreach ($jsonData['campaigns'] as $campaignID => $campaignData) {
            foreach ($campaignData['ads'] as $adID => $adData) {
                $singleAdJson = json_decode($adData['ad'], true);
                //RAVI PATEL : 2020-05-20 : VALIDATE SINGLE AD
                $responseArray = $this->validateMandatoryParams($singleAdJson, 'single_ad');
                if (!empty($responseArray)) {
                    return $responseArray;
                }
                $responseArray = $this->validateOptionalParams($singleAdJson, 'single_ad');
                if (!empty($responseArray)) {
                    return $responseArray;
                }
            }
        }
    }

}
