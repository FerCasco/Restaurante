<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mesa as MesaModel;
use App\Models\Familia as FamiliaModel;
use App\Models\Producto as ProductoModel;
use App\Models\Comanda;
use App\Models\Ticket;
use App\Models\LineasComanda;
use Illuminate\Http\Request;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\EscposImage;
use TheSeer\Tokenizer\Exception;
use Carbon\Carbon;

class MesaAtender extends Component
{
    public $mesaAtender;
    public $familias;
    public $productos;
    public $showFamilies = true;
    public $showModal = false;
    public $selectedProducto;
    public $cantidad;
    public $comanda;
    public $showComanda = false;
    public $lineasComanda;
    public $trabajador;
    public $modalEditar;
    public $comensales;

    protected $listeners = ['atenderMesa', 'cargarProductos'];


    public function mount($idMesa)
    {
        $this->atenderMesa($idMesa);
    }

    public function modalComensales($ver)
    {
        $this->modalEditar=$ver;
    }

    public function editarComensales()
    {
        $mesa=$this->mesaAtender;
        $mesa->comensales = $this->comensales;
        $mesa->save();
    }
    public function atenderMesa($idMesa)
    {
        $this->trabajador = session('user');
        if (!Comanda::find($idMesa)) {
            $this->comanda = new Comanda();
            $this->comanda->id = $idMesa;
            $this->comanda->precioTotal = 0;
            $this->comanda->save();
        } else {
            $this->comanda = Comanda::find($idMesa);
        }
        $this->familias = FamiliaModel::all();
        $this->mesaAtender = MesaModel::where('id', $idMesa)->first();
    }

    public function cargarProductos($idFamilia)
    {
        $this->productos = ProductoModel::where('idFamilia', $idFamilia)->get();
        $this->showFamilies = false;
    }
    public function addComanda($idProducto)
    {
        $this->selectedProducto = ProductoModel::where('id', $idProducto)->get()->first();
        $this->showModal = true;
        $this->cantidad = null;
    }

    public function submitCantidad()
    {
        $lineaComanda = LineasComanda::where('idMesa', $this->mesaAtender->id)
            ->where('idProducto', $this->selectedProducto->id)
            ->where('ticket', 0)
            ->first();

        if ($lineaComanda) {
            $lineaComanda->cantidad = $lineaComanda->cantidad + $this->cantidad;
            $lineaComanda->precio = $lineaComanda->cantidad * $this->selectedProducto->precio;
            $lineaComanda->save();
            $this->closeModal();
        } else {
            $lineaComanda = LineasComanda::create([
                'idMesa' => $this->mesaAtender->id,
                'trabajador' => $this->trabajador->id,
                'idProducto' => $this->selectedProducto->id,
                'cantidad' => $this->cantidad,
                'enviado' => false,
                'ticket' => 0,
                'fechaTicket' => "",
                'precio' => $this->cantidad * $this->selectedProducto->precio,
            ]);


            $this->comanda->save();

            $this->closeModal();
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
    public function enviarCocina(){
        $lineas = LineasComanda::where('idMesa', $this->mesaAtender->id)->where('ticket', 0)->get();
        foreach ($lineas as $linea) {
            $linea->enviado = 1;
            $linea->save();
        }
    }
    public function enviarComanda()
    {
        date_default_timezone_set('Europe/Madrid');
        $ticket = Ticket::where('id', $this->mesaAtender->id)->get()->first();

        $ticket->fechaTicket =  date('d-m-y h:i:s');

        $ticket->save();
        $lineas = LineasComanda::where('idMesa', $this->mesaAtender->id)->where('ticket', 0)->get();
        foreach ($lineas as $linea) {
            $linea->ticket = 1;
            $linea->fechaTicket = $ticket->fechaTicket;
            $linea->save();
        }
        //Imprimir ticket o gestionarlo de alguna forma




        $this->comanda->precioTotal = 0;
        $this->comanda->save();
    }
    public function deleteComanda()
    {
    }
    public function resetProductos()
    {
        $this->productos = null;
        $this->showFamilies = true; // Show the families again
    }
    public function verComanda()
    {
        $this->lineasComanda = LineasComanda::where('idMesa', $this->mesaAtender->id)->where('ticket', 0)->get();
        $this->showComanda = true;
    }
    public function closeComanda()
    {
        $this->showComanda = false;
    }
    public function render()
    {
        return view('livewire.mesa-atender');
    }
    public function imprimir(Request $request)
    {
        //Recoger Datos Formulario
        $RSAlignment = $_POST["RSAlignment"];
        $DirAlignment = $_POST["DirAlignment"];
        $DateAlignment = $_POST["DateAlignment"];
        $TotalAlignment = $_POST["TotalAlignment"];
        $IVAAlignment = $_POST["IVAAlignment"];
        $TLAlignment = $_POST["TLAlignment"];
        $MSGAlignment = $_POST["MSGAlignment"];
        $TotalIVAALignment = $_POST["TotalIVAAlignment"];

        $RazonSocial = $_POST["rsocial"];
        $Direccion = $_POST["direccion"];
        $TextoLegal = $_POST["textoL"];
        $MensajeFinal = $_POST["mensajeF"];
        $TextoSMS = $_POST["textoSMS"];
        $tlf = $_POST["phone"];
        $prefix = $_POST["prefix"];

        $fullPhone = $prefix . $tlf;
        $fontSize = $_POST["fontSize"];

        //Creamos productos de prueba y se almacenan en array


        $productos = array();

        //Dirección IP de la impresora
        $ip = '192.168.1.173';

        //Puerto de la impresora (generalmente es 9100)
        $port = 9100;

        $ruta_imagen = resource_path() . '\CastelarLogo.png';

        try {
            //Abre una conexión con la impresora
            $connector = new NetworkPrintConnector($ip, $port);
            $printer = new Printer($connector);
            $fecha_actual = Carbon::now();
            $imagen = EscposImage::load($ruta_imagen, false);
            // Imprime la imagen
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->graphics($imagen);


            switch ($fontSize) {
                case "small":
                    $printer->selectPrintMode(Printer::MODE_FONT_B);
                    break;

                case "big":
                    $printer->selectPrintMode(Printer::MODE_FONT_A);
                    break;
            }
            /*
            $printer->selectPrintMode(Printer::MODE_FONT_A);
            $printer->text("\n" . "Tipo A");

            $printer->selectPrintMode(Printer::MODE_FONT_B);
            $printer->text("\n" . "Tipo B");
            */

            //RAZON SOCIAL
            switch ($RSAlignment) {
                case "left":
                    $printer->setJustification(Printer::JUSTIFY_LEFT);
                    break;
                case "center":
                    $printer->setJustification(Printer::JUSTIFY_CENTER);
                    break;
                case "right":
                    $printer->setJustification(Printer::JUSTIFY_RIGHT);
                    break;
            }
            $printer->selectPrintMode(Printer::MODE_EMPHASIZED);
            $printer->text("\n" . "Proyecto: ");
            switch ($fontSize) {
                case "small":
                    $printer->selectPrintMode(Printer::MODE_FONT_B);
                    break;

                case "big":
                    $printer->selectPrintMode(Printer::MODE_FONT_A);
                    break;
            }
            $printer->text($RazonSocial . "\n \n");
            $printer->setJustification();

            //CIF
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->selectPrintMode(Printer::MODE_EMPHASIZED);
            $printer->text("CIF: ");
            switch ($fontSize) {
                case "small":
                    $printer->selectPrintMode(Printer::MODE_FONT_B);
                    break;

                case "big":
                    $printer->selectPrintMode(Printer::MODE_FONT_A);
                    break;
            }
            $printer->text("11111111111" . "\n \n");
            $printer->setJustification();

            //DIRECCION
            switch ($DirAlignment) {
                case "left":
                    $printer->setJustification(Printer::JUSTIFY_LEFT);
                    break;
                case "center":
                    $printer->setJustification(Printer::JUSTIFY_CENTER);
                    break;
                case "right":
                    $printer->setJustification(Printer::JUSTIFY_RIGHT);
                    break;
            }
            $printer->selectPrintMode(Printer::MODE_EMPHASIZED);
            $printer->text("Dirección: ");
            switch ($fontSize) {
                case "small":
                    $printer->selectPrintMode(Printer::MODE_FONT_B);
                    break;

                case "big":
                    $printer->selectPrintMode(Printer::MODE_FONT_A);
                    break;
            }
            $printer->text("Av. Santiago Ramón y Cajal, 2, 06001 Badajoz" . "\n \n");
            $printer->setJustification();

            //TEXTO LEGAL
            switch ($TLAlignment) {
                case "left":
                    $printer->setJustification(Printer::JUSTIFY_LEFT);
                    break;
                case "center":
                    $printer->setJustification(Printer::JUSTIFY_CENTER);
                    break;
                case "right":
                    $printer->setJustification(Printer::JUSTIFY_RIGHT);
                    break;
            }
            $printer->selectPrintMode(Printer::MODE_EMPHASIZED);
            $printer->text("Integrantes: ");
            switch ($fontSize) {
                case "small":
                    $printer->selectPrintMode(Printer::MODE_FONT_B);
                    break;

                case "big":
                    $printer->selectPrintMode(Printer::MODE_FONT_A);
                    break;
            }
            $printer->text("Rubén Núñez Cotano, María Pérez Martín, Fernando Casco Claver" . "\n \n");
            $printer->setJustification();

            //FECHA
            switch ($DateAlignment) {
                case "left":
                    $printer->setJustification(Printer::JUSTIFY_LEFT);
                    break;
                case "center":
                    $printer->setJustification(Printer::JUSTIFY_CENTER);
                    break;
                case "right":
                    $printer->setJustification(Printer::JUSTIFY_RIGHT);
                    break;
            }
            $printer->selectPrintMode(Printer::MODE_EMPHASIZED);
            $printer->text("Fecha: ");
            switch ($fontSize) {
                case "small":
                    $printer->selectPrintMode(Printer::MODE_FONT_B);
                    break;

                case "big":
                    $printer->selectPrintMode(Printer::MODE_FONT_A);
                    break;
            }
            $printer->text($fecha_actual->format('d/m/Y H:i:s') . " ");
            $printer->setJustification();
            //Imprime el texto
            $total = 0;
            $printer->selectPrintMode(Printer::MODE_FONT_A);
            $lineaEncabezado = sprintf("%-10s %-28s %8s", "Cant", "Producto", "Precio");

            $printer->text("\n" . "------------------------------------------------" . "\n");
            $printer->selectPrintMode(Printer::MODE_FONT_A);
            $printer->text($lineaEncabezado . "\n \n");

            $printer->selectPrintMode(Printer::MODE_FONT_A);
            foreach ($productos as $producto) {
                $coste = $producto->cantidad * $producto->precio;
                $coste_formateado = number_format($coste, 2, '.', '');
                $linea = sprintf("%-7s %-30s %5s %1s", $producto->cantidad, $producto->nombre, $coste_formateado, " €");
                $total += $coste;
                $printer->text($linea . "\n");
            }

            $printer->selectPrintMode(Printer::MODE_FONT_A);
            $printer->text("------------------------------------------------" . "\n");
            switch ($fontSize) {
                case "small":
                    $printer->selectPrintMode(Printer::MODE_FONT_B);
                    break;

                case "big":
                    $printer->selectPrintMode(Printer::MODE_FONT_A);
                    break;
            }
            $printer->setJustification(Printer::JUSTIFY_RIGHT);
            $printer->setJustification();

            //Total
            switch ($TotalAlignment) {
                case "left":
                    $printer->setJustification(Printer::JUSTIFY_LEFT);
                    break;
                case "center":
                    $printer->setJustification(Printer::JUSTIFY_CENTER);
                    break;
                case "right":
                    $printer->setJustification(Printer::JUSTIFY_RIGHT);
                    break;
            }
            $textTotal = "Total:";
            $lineaTotal = sprintf("%-1s %5s", $textTotal, $total);
            $printer->text("\n" . $lineaTotal . " € " . "\n");
            $printer->setJustification();

            //IVA
            switch ($IVAAlignment) {
                case "left":
                    $printer->setJustification(Printer::JUSTIFY_LEFT);
                    break;
                case "center":
                    $printer->setJustification(Printer::JUSTIFY_CENTER);
                    break;
                case "right":
                    $printer->setJustification(Printer::JUSTIFY_RIGHT);
                    break;
            }
            $textIVA = "Imp. IVA:";
            $iVA = $total * 0.10;
            $lineaIVA = sprintf("%-1s %5s", $textIVA, round($iVA, 2));
            $printer->text($lineaIVA . " € " . "\n");
            $printer->setJustification();

            //Total con IVA
            switch ($TotalIVAALignment) {
                case "left":
                    $printer->setJustification(Printer::JUSTIFY_LEFT);
                    break;
                case "center":
                    $printer->setJustification(Printer::JUSTIFY_CENTER);
                    break;
                case "right":
                    $printer->setJustification(Printer::JUSTIFY_RIGHT);
                    break;
            }
            $printer->selectPrintMode(Printer::MODE_EMPHASIZED);
            $textTotalIVA = "Total con IVA:";
            switch ($fontSize) {
                case "small":
                    $printer->selectPrintMode(Printer::MODE_FONT_B);
                    break;

                case "big":
                    $printer->selectPrintMode(Printer::MODE_FONT_A);
                    break;
            }
            $TotalIVA = $total * 1.10;
            $lineaTotalIva = sprintf("%-1s %5s", $textTotalIVA, round($TotalIVA, 2));
            $printer->text("\n" . $lineaTotalIva . " € " . "\n \n");
            $printer->setJustification();


            //Mensaje Final
            switch ($MSGAlignment) {
                case "left":
                    $printer->setJustification(Printer::JUSTIFY_LEFT);
                    break;
                case "center":
                    $printer->setJustification(Printer::JUSTIFY_CENTER);
                    break;
                case "right":
                    $printer->setJustification(Printer::JUSTIFY_RIGHT);
                    break;
            }
            $printer->text($MensajeFinal . "\n \n");
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            //Imprimir Teléfono de Cliente en Ticket
            $printer->text("Teléfono :" . $fullPhone . "\n \n");
            // Realiza el corte completo del ticket
            $printer->cut();

            // Cierra la conexión con la impresora
            $printer->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
        return view(
            'ticket',
            ['RazonSocial' => $RazonSocial, 'Direccion' => $Direccion, 'TextoLegal' => $TextoLegal, 'MensajeFinal' => $MensajeFinal, 'Tlf' => $fullPhone, 'TextoSMS' => $TextoSMS]
        );
    }

}
