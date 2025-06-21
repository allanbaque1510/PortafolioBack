<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\ServiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    protected $_service;

    public function __construct(ServiceService $_service)
    {
        $this->_service = $_service;
    }

    
    public function index()
    {
        $services = $this->_service->getAll();
        return view('admin.services.index', compact('services'));
    }


    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        try {
            Log::info('Archivo:', ['image' => $request->file('image')]);
            $this->_service->create($request);
            return redirect()->route('admin.services.index')->with('success', 'Servicio creado exitosamente.');
      
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->withInput()->with('error', 'Hubo un problema al crear el servicio. Inténtalo de nuevo.');
        }
    }


    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }
    
    public function update(Request $request, Service $service)
    {

        $this->_service->update($request, $service);

        return redirect()->route('admin.services.index')->with('success', 'Servicio actualizado exitosamente.');
    
    }

    public function destroy(Service $service)
    {
        $this->_service->destroy($service);
        return redirect()->route('admin.services.index')->with('success', 'Servicio eliminado exitosamente.');
    }
}
