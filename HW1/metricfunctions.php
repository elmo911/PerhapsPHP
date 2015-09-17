<?php
    Class MetricFunctions {

        public function FtoC ($F){
            $C = ($F-32)*5/9;
            return $C;
        }

        public function LBtoKG($LB){
            $KG = $LB/2.2046;
            return $KG;
        }

        public function MItoKM($MI){
            $KM = $MI/0.62137;
            return $KM;
        }
    }
?>
