<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\ProfileService;
use App\Http\Resources\ProfileResource;



class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index()
    {
        $profiles = $this->profileService->getAllProfile();
        return ProfileResource::collection($profiles)->response()->setStatusCode(200);
    }
}
