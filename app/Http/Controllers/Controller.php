<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLog;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function addLog(string $action, array $data = [], int|bool $user = FALSE)
    {
        $log = new Log();
        $request = new Request();
        $log->user_id = $user ?? auth()->user()->id ?? 0;
        $log->action = $action;
        $log->data = json_encode(array_merge($data, ['IP' => $request->ip(), 'MAC' => exec('getmac')]));
        $log->save();
    }

    public function addAttendanceLog(string $action, array $data = [], int $profile_id)
    {
        $log = new AttendanceLog();
        $request = new Request();
        $log->profile_id = ($profile_id == 0) ? null : $profile_id;
        $log->action = $action;
        $log->data = json_encode(array_merge($data, ['IP' => $request->ip(), 'MAC' => exec('getmac')]));
        $log->save();
    }
}
