<?php

namespace strong\helpers;

class ProtobufHelper
{
    public function encode($data){
        $fields = $this->fields();
        foreach ($fields as $key => $_item) {
            $field_name = $_item['name'];
            if(isset($data[$field_name])) {
                $this->set($key, $data[$field_name]);
            }
        }

        try {
            $packed = $this->serializeToString();
        } catch (\Exception $ex) {
            $data['fields'] = $fields;
            $data['error']  = $ex->getMessage();
            writeLog($data, 'encode_new_pb_failed');
            $packed = '';
        }

        return $packed;
    }

    public function decode($packed){
        try {
            $this->parseFromString($packed);

        } catch (\Exception $ex) {
            writeLog($ex->getMessage(), 'decode_new_pb_failed');
        }

        $data = array();
        $fields = $this->fields();
        foreach ($fields as $key => $_item) {
            $field_name = $_item['name'];
            $data[$field_name] = $this->get($key);
        }

        return $data;
    }

}

