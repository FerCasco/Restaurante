<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proveedores as ProveedorModel;
use App\Models\Roles;
use App\Models\User as UserModel;
use Livewire\WithPagination;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class Contacto extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $miProveedor;
    public $miTrabajador;
    protected $proveedores;
    protected $trabajadores;
    protected $roles;

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
    public $fotoTrabajador;
    public $password;

    //Propiedad para ver tablas
    public $tablaVisible;
    //Propiedad para ver modal
    public $modalVisible;
    //Buscar contacto
    public $buscarContacto;

    public function verTabla($ver)
    {
        $this->tablaVisible = $ver;
    }

    public function verModal($ver)
    {
        $this->modalVisible = $ver;
    }

    public function updatedBuscarContacto()
    {
        if ($this->tablaVisible == "proveedores") {
            if ($this->buscarContacto != null) {
                $proveedoresBusqueda = ProveedorModel::where('nombre', 'like', '%' . $this->buscarContacto . '%')->paginate(7, ['*'], 'proveedoresPage');
                $this->proveedores = $proveedoresBusqueda;
            } else {
                $this->proveedores = null; // Establece a null para evitar conflictos con la paginación en caso de cambio rápido
            }
        }

        if ($this->tablaVisible == "trabajadores") {
            if ($this->buscarContacto != null) {
                $trabajadoresBusqueda = UserModel::where('name', 'like', '%' . $this->buscarContacto . '%')->orWhere('apellidos', 'like', '%' . $this->buscarContacto . '%')->paginate(7, ['*'], 'trabajadoresPage');
                $this->trabajadores = $trabajadoresBusqueda;
            } else {
                $this->trabajadores = null; // Establece a null para evitar conflictos con la paginación en caso de cambio rápido
            }
        }
    }

    /*public function verContacto($id)
    {
        return redirect()->to('/ver-contacto?id=' . $id);
    }*/

    public function mount()
    {
        $this->verTabla("proveedores");
        /*$this->proveedores = ProveedorModel::all();
        $this->roles = Roles::all();
        $this->trabajadores = TrabajadorModel::all();*/
    }

    public function render()
    {
        $proveedores = $this->proveedores ?: ProveedorModel::paginate(7, ['*'], 'proveedoresPage');
        $trabajadores = $this->trabajadores ?: UserModel::paginate(7, ['*'], 'trabajadoresPage');
        $roles = Roles::all();

        return view('livewire.contacto', [
            'roles' => $roles,
            'proveedores' => $proveedores,
            'trabajadores' => $trabajadores
        ]);
    }

    public function addProveedor()
    {
        $proveedor = new ProveedorModel();
        $proveedor->email = $this->correoProveedor;
        $proveedor->nombre = $this->nombreProveedor;
        $proveedor->telefono = $this->telefonoProveedor;
        $proveedor->save();
    }

    public function addTrabajador()
    {
        $trabajador = new UserModel();
        $trabajador->name = $this->nombreTrabajador;
        $trabajador->email = $this->correoTrabajador;
        $trabajador->password = 1234;
        $trabajador->telefono = $this->telefonoTrabajador;
        $trabajador->idRol = $this->rolTrabajador;
        $trabajador->dni = $this->dniTrabajador;
        $trabajador->apellidos = $this->apellidosTrabajador;

        // Generate and store the QR code image
        $qrCodeString = "res_qr_" . $trabajador->id . "_" . $this->rolTrabajador;
        $qrCodePath = 'img/qrcode.png';
        \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->format('png')->generate($qrCodeString, public_path($qrCodePath));
        $trabajador->codigoQr = $qrCodeString;
        $trabajador->imagenQr = file_get_contents(public_path($qrCodePath));

        // Handle the file upload
        if ($this->fotoTrabajador) {
            $fotoPath = $this->fotoTrabajador->store('photos', 'public');
            $trabajador->foto = $fotoPath;
        }

        $trabajador->save();

        // Delete the QR code image after it's been stored
        if (file_exists(public_path($qrCodePath))) {
            unlink(public_path($qrCodePath));
        }
    }
    public function openEditProveedor($proveedorId)
    {
        $this->miProveedor = ProveedorModel::find($proveedorId);
        $this->verModal('editProveedor');
    }
    public function openEditTrabajador($trabajadorId)
    {
        $this->miTrabajador = TrabajadorModal::find($trabajadorId);
        $this->verModal('editTrabajador');
    }

    public function editProveedor()
    {
        $this->miProveedor->name = $this->nombreProveedor;
        $this->miProveedor->email = $this->correoProveedor;
        $this->miProveedor->telefono = $this->telefonoProveedor;
        $this->miProveedor->save();
        $this->modalVisible = '';
    }

    public function editTrabajador()
    {
        $this->miTrabajador->name = $this->nombreTrabajador;
        $this->miTrabajador->apellidos =$this->apellidosTrabajador;
        $this->miTrabajador->email = $this->correoTrabajador;
        $this->miTrabajador->telefono = $this->telefonoTrabajador;
        $this->miTrabajador->idRol = $this->rolTrabajador;
        $this->miTrabajador->dni =$this->dniTrabajador;

        if ($this->fotoTrabajador) {
            $fotoPath = $this->fotoTrabajador->store('photos', 'public');
            $this->miTrabajador->foto = $fotoPath;
        }

        $this->miTrabajador->save();
        $this->modalVisible = '';
    }

    public function deleteProveedor($idProveedor)
    {
        $proveedor = ProveedorModel::where('id', $idProveedor)->get()->first();
        $proveedor->delete();
    }

    public function deleteTrabajador($trabajadorId)
    {
        $trabajador = TrabajadorModal::where('id', $trabajadorId)->get()->first();
        $trabajador->delete();
        $this->verTabla("trabajadores");
    }
}
