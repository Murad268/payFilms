<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\settings\SettingUpdateRequest;
use App\Models\Settings;
use App\Services\SettingsService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct(private SettingsService $settingsService)
    {
    }
    public function index()
    {
        $settings = Settings::first()->get();
        return view('admin.settings.index', compact('settings'));
    }

    public function edit($id)
    {
        $setting = Settings::findOrFail($id);
        return view('admin.settings.update', compact('setting'));
    }


    public function update(SettingUpdateRequest $request, $id)
    {
        $this->settingsService->update($request, $id);
        return redirect()->route('admin.settings.index')->with("message", "the information has been updated to the database");
    }
}
