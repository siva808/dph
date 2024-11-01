<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Banner;
use App\Models\Member;
use App\Models\Certificate;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    // Display resources based on type
    public function index(Request $request)
    {
        $type = $request->route()->getName();

        switch ($type) {
            case 'notifications.index':
                $data = Notification::all();
                break;
            case 'banners.index':
                $data = Banner::all();
                break;
            case 'members.index':
                $data = Member::all();
                break;
            case 'certificates.index':
                $data = Certificate::all();
                break;
            default:
                abort(404);
        }

        return view('admin.ethics.index', compact('data', 'type'));
    }

    // Store Notification, Banner, Member, or Certificate
    public function store(Request $request)
    {
        $type = $request->route()->getName();

        switch ($type) {
            case 'notifications.store':
                $validator = Validator::make($request->all(), $this->notificationRules());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                Notification::create($request->only(['title', 'scroller_icon', 'scroller_notification', 'scroller_link', 'description', 'contact_description', 'email']));
                return redirect()->back()->with('success', 'Notification created successfully!');

            case 'banners.store':
                $validator = Validator::make($request->all(), $this->bannerRules());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // Prepare data for Banner creation
                $bannerData = $request->only(['banner_title', 'status', 'order_id']);

                // Handle banner image upload
                if ($request->hasFile('banner_image')) {
                    $bannerImagePath = $request->file('banner_image')->store('banners', 'public');
                    $bannerData['banner_images'] = json_encode([$bannerImagePath]); // Store image path as JSON
                }

                Banner::create($bannerData);
                return redirect()->back()->with('success', 'Banner created successfully!');

            case 'members.store':
                $validator = Validator::make($request->all(), $this->memberRules());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                Member::create($request->only(['name', 'qualification', 'institution', 'designation', 'affiliation', 'status']));
                return redirect()->back()->with('success', 'Member added successfully!');

            case 'certificates.store':
                $validator = Validator::make($request->all(), $this->certificateRules());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                Certificate::create($request->only(['image']));
                return redirect()->back()->with('success', 'Certificate added successfully!');

            default:
                abort(404);
        }
    }
    // Validation rules
    private function notificationRules()
    {
        return [
            'title' => 'required|string|max:255',
            'scroller_icon' => 'sometimes|nullable|image|mimes:png|max:5120',
            'scroller_notification' => 'sometimes|nullable|string', // Add this line
            'scroller_link' => 'sometimes|nullable|url',
            'description' => 'required|string',
            'contact_description' => 'required|string',
            'email' => 'required|email|unique:notifications,email', // Optionally make email unique
        ];
    }

    private function bannerRules()
    {
        return [
            'banner_title' => 'required|string|max:255',
            'order_id' => 'required|string', // Ensure this is present
            'banner_image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'status' => 'required|string',
        ];
    }

    private function memberRules()
    {
        return [
            'name' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'affiliation' => 'sometimes|nullable|string|max:255',
            'status' => 'required|string',
        ];
    }

    private function certificateRules()
    {
        return [
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ];
    }
}
