<?php
function getPackageYear()
{
    try {
        $data = \App\Models\Package::all();
        $tmpResult = [];
        foreach ($data as $v) {
            $start_at = substr($v->start_at, 0, 4);
            $finish_at = substr($v->finish_at, 0, 4);
            array_push($tmpResult, $start_at);
            array_push($tmpResult, $finish_at);
        }
        $result = array_unique($tmpResult);
        sort($result);
    }catch (Exception $e) {
        $result = [];
    }
    return $result;
}
