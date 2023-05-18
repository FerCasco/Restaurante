<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proveedores as ProveedorModel;
use App\Models\Roles;
use App\Models\Trabajadores as TrabajadorModel;
use Livewire\WithPagination;

class Contacto extends Component
{

    use WithPagination;
    protected $proveedores;
    protected $trabajadores;
    protected $roles;
    public $trabajadorModal;
    public $showTrabajadorDetails = 'hidden';
    protected $listeners = ['showTrabajadorDetails'=> 'mostrarModal'];
    
    //Propiedades para crear Proveedores
    public $nombreProveedor;
    public $correoProveedor;
    public $telefonoProveedor;


    //Propiedades para crear Trabajadores
    public $nombreTrabajador;
    public $correoTrabajador;
    public $telefonoTrabajador;
    public $rolTrabajador;
    public $apellidosTrabajador;
    public $dniTrabajador;

    public function mount()
    {
        $this->proveedores = ProveedorModel::all();
        $this->roles = Roles::all();
        $this->trabajadores = TrabajadorModel::all();
    }
    public function render()
    {
        $proveedores = ProveedorModel::paginate(5, ['*'], 'proveedoresPage');
        $trabajadores = TrabajadorModel::paginate(5, ['*'], 'trabajadoresPage');
        $roles = Roles::all();
        return view('livewire.contacto', [
            'roles' => $roles,
            'proveedores' => $proveedores,
            'trabajadores' => $trabajadores
        ]);
    }
    public function showTrabajadorDetails(TrabajadorModel $trabajadorModal)
    {
        $this->trabajadorModal = $trabajadorModal;
        json_decode($this->trabajadorModal);
        $this->emit('showTrabajadorDetails',$this->trabajadorModal);
    
  
        // Puedes ajustar la lógica para obtener los detalles del trabajador según tu estructura de base de datos y modelos
    }

    public function mostrarModal($trabajadorModal){
        $this->showTrabajadorDetails='';
    }
    public function cerrarModal(){
        $this->showTrabajadorDetails='hidden';
    }

    public function addProveedor(){
        $proveedor = new ProveedorModel();
        $proveedor->email = $this->correoProveedor;
        $proveedor->nombre = $this->nombreProveedor;
        $proveedor->telefono = $this->telefonoProveedor;
        $proveedor->save();
    }
    public function addTrabajador(){
        $trabajador = new TrabajadorModel();
        $trabajador->name = $this->nombreTrabajador;
        $trabajador->email = $this->correoTrabajador;
        $trabajador->telefono = $this->telefonoTrabajador;
        $trabajador->idRol = $this->rolTrabajador;
        $trabajador->dni = $this->dniTrabajador;
        $trabajador->apellidos = $this->apellidosTrabajador;
        $trabajador->codigoQr = null;
        $trabajador->imagenQr = null;
        $trabajador->save();
    }

    /*
    public $perPage = 5;
    public function render()
    {
        $proveedores = ProveedorModel::paginate($this->perPage);
        $trabajadores = TrabajadorModel::paginate($this->perPage);

        return view('livewire.contacto', [
            'proveedores' => $proveedores,
            'trabajadores' => $trabajadores,
        ]);
    }*/
}
