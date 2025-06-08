<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use App\Services\SocialMediaService;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    protected $_socialMediaService;

    public function __construct(SocialMediaService $_socialMediaService)
    {
        $this->_socialMediaService = $_socialMediaService;
    }
    public function index()
    {
        return response()->json($this->_socialMediaService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_socialMediaService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_socialMediaService->findOrFail($id);
        return response()->json($this->_socialMediaService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_socialMediaService->findOrFail($id);
        $this->_socialMediaService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
