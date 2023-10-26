<?php

    class BD_Rail
    {
        public static function DHAKATO_SeatAvailability($trainNumber, $toStation, $date)
        {
            $ch = curl_init('https://www.esheba.cnsbd.com/v1/seat-availability');
            //$fields = '{"train_no":' . $trainNumber . ',"stn_from":"DA","stn_to":"' . $toStation . '","journey_date":"' . $date . '"}';
            $fields = '{"train_no":"' . $trainNumber . '.","stn_from":"DA","stn_to":"' . $toStation . '","journey_date":"' . $date . '"}';

            $options = [CURLOPT_POST => true, CURLOPT_POSTFIELDS => $fields,
                CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
                CURLOPT_RETURNTRANSFER => true];
            curl_setopt_array($ch, $options);
            $data = curl_exec($ch);
            curl_close($ch);

            $checked_return_data_arr = (json_decode($data, true));
            #returned data validity check
            if (isset($checked_return_data_arr ['STATUS'] ['CODE']) and $checked_return_data_arr ['STATUS'] ['CODE'] == 1) {
                #returned data validity check
                if (!empty($checked_return_data_arr)) {
                    $AvailSeatTypeAndNumber = array();
                    foreach ($checked_return_data_arr ['DATA'] as $train_return_data) {
                        #return seat type and availability
                        $AvailSeatTypeAndNumber += array($train_return_data['CLASS'] => $train_return_data['COUNTER_SEAT']);
                    }

                    return $AvailSeatTypeAndNumber;
                }
            }

            return false;
        }

        public static function DHAKATO_SeatAvailability_2($trainNumber, $toStation, $date)
        {
            $ch = curl_init('https://www.esheba.cnsbd.com/v1/seat-availability');
            $fields = '{"train_no":' . $trainNumber . ',"stn_from":"DA","stn_to":"' . $toStation . '","journey_date":"' . $date . '"}';
            //$fields = '{"train_no":"' . $trainNumber . '.","stn_from":"DA","stn_to":"' . $toStation . '","journey_date":"' . $date . '"}';

            $options = [CURLOPT_POST => true, CURLOPT_POSTFIELDS => $fields,
                CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
                CURLOPT_RETURNTRANSFER => true];
            curl_setopt_array($ch, $options);
            $data = curl_exec($ch);
            curl_close($ch);

            $checked_return_data_arr = (json_decode($data, true));
            #returned data validity check
            if (isset($checked_return_data_arr ['STATUS'] ['CODE']) and $checked_return_data_arr ['STATUS'] ['CODE'] == 1) {
                #returned data validity check
                if (!empty($checked_return_data_arr)) {
                    $AvailSeatTypeAndNumber = array();
                    foreach ($checked_return_data_arr ['DATA'] as $train_return_data) {
                        #return seat type and availability
                        $AvailSeatTypeAndNumber += array($train_return_data['CLASS'] => $train_return_data['COUNTER_SEAT']);
                    }

                    return $AvailSeatTypeAndNumber;
                }
            }

            return false;
        }


        public static function BORAL_BRIDGE_TO_SEAT_CHECKER($trainNumber, $formStation, $toStation, $date)
        {
            $ch = curl_init('https://www.esheba.cnsbd.com/v1/seat-availability');
            $fields = <<<HEREDOC
                            {"train_no":"$trainNumber.","stn_from":"$formStation","stn_to":"$toStation","journey_date":"$date"}
HEREDOC;
            $options = [CURLOPT_POST => true, CURLOPT_POSTFIELDS => $fields,
                CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
                CURLOPT_RETURNTRANSFER => true];
            curl_setopt_array($ch, $options);
            $data = curl_exec($ch);
            curl_close($ch);

            $checked_return_data_arr = (json_decode($data, true));
            #returned data validity check
            if (isset($checked_return_data_arr ['STATUS'] ['CODE']) and $checked_return_data_arr ['STATUS'] ['CODE'] == 1) {
                #returned data validity check
                if (!empty($checked_return_data_arr)) {
                    $AvailSeatTypeAndNumber = array();
                    foreach ($checked_return_data_arr ['DATA'] as $train_return_data) {
                        #return seat type and availability
                        $AvailSeatTypeAndNumber += array($train_return_data['CLASS'] => $train_return_data['COUNTER_SEAT']);
                    }

                    return $AvailSeatTypeAndNumber;
                }
            }

            return false;
        }

    }