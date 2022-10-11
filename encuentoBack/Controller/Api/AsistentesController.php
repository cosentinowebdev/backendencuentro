<?php
class AsistentesController extends BaseController
{
    /**
     * "/asistentes/list" Endpoint - Get list of users
     */
    public function listAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
 
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $asistentesModel = new AsistentesModel();
                $intLimit = 10;
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                }
 
                $arrAsistentes = $asistentesModel->getAsistentes($intLimit);
                $responseData = json_encode($arrAsistentes);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
 
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
        /**
     * "/asistentes/set" Endpoint - Get list of users
     */
    public function setAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
 
        if(strtoupper($requestMethod) == 'POST') {
            try {
                $asistentesModel = new AsistentesModel();

                $url= $_SERVER["REQUEST_URI"];
                $components = parse_url($url);
                parse_str($components['query'], $results);
                print_r($results); 
                $aux=$asistentesModel->setAsistente($results);
                // $userModel = new UserModel();
 
                // $intLimit = 10;
                // if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                //     $intLimit = $arrQueryStringParams['limit'];
                // }
 
                // $arrUsers = $userModel->getUsers($intLimit);
                // $responseData = json_encode($arrUsers);
                $responseData=json_encode(true);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
 
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}