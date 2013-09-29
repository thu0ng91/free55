<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiController
 *
 * @author pizigou
 */
class ApiController extends CController {
    //put your code here
    
    public function jsonOutput($result, $data, $statsCode)
    {
        $r = array(
            'result' => $result,
            'data' => $data,
        );
        if (!$result) {
            $r['statscode'] = $statsCode;
        }
        echo json_encode($r);
    }
    
    public function jsonOutputAndEnd($result, $data = null, $statsCode = 1)
    {
        $this->jsonOutput($result, $data, $statsCode);
        Yii::app()->end();
    }
}

?>
