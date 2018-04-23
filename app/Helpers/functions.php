<?php

function jump($result, $msg, $url)
{
    return redirect()->route('admin.jump')->with('status', [
        'result' => $result,
        'msg' => $msg,
        'url' => $url,
    ]);
}

