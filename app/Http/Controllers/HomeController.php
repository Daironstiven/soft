<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//clase para extraer texto e imagenes en pdf
use Illuminate\Support\Facades\Storage;
use pdfparser;
//clase para reconocimiento de texto en imagenes
use thiagoalessio\TesseractOCR\TesseractOCR;
use Strong;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

   public function clasificar()
    {
        //se leen los archivos que se encuentran en la carpeta destinada para el almacenamiento
        $files = Storage::disk('public')->files('files/1');
       // creamos el objeto parserador(lee los pdf)
       $parseador= new \Smalot\PdfParser\Parser();
       $contador=0;
       $nf=0;
       $no=0;
       $nc=0;
       $ni=0;
       //recorre los archivos
        foreach ($files as $file){ 
            $texto="";
            $clasificado="";
            //printf("<h1>Documento %s</h1>", $file);
            //se procesa el archivo con el objeto parseador
             $filep= $parseador->parseFile(asset('storage/'.$file));
             //se obtine las paginas del documento
             $pagina=$filep->getPages();
             //se recorre las paginas
             foreach($pagina as $pagina){
            //acumula el texto de cada pagina
            $texto= $texto.$pagina->getText();           
             }
             //se obtienen las imagenes del documento
             $imagenes = $filep->getObjectsByType('XObject', 'Image');
             //se recorre la imagenes
            foreach ($imagenes as $imagen) {
                //se guardan las img en una carpeta del servidor
                file_put_contents("storage/img/Imagen".$contador.".jpg",$imagen->getContent());
                //printf("<img src=\"data:image/jpg;base64,%s\"/>", base64_encode($imagen->getContent()));
                //si la imagen existe
                if (exif_imagetype((public_path("storage/img/Imagen".$contador.".jpg"))) == IMAGETYPE_JPEG) {
                    //se procesan la imagen con el tesseractOCR para reconocer el texto de la img
                    $tesseract = new TesseractOCR(public_path("storage/img/Imagen".$contador.".jpg"));
                    //se acumula el texto encontrado
                    $texto= $texto.$tesseract->run();
                }
                //echo $texto;
                $contador++;                
            }
            //validacion o busqueda palabras claves (factura) o (factura y no orden)
            if((stristr($texto, 'factura') && stristr($texto, 'cliente')) || ((stristr($texto, 'factura') && !stristr($texto, 'orden')))){
              //identificar el documento
                $clasificado="factura";
                //cuento los documentos de este tipo
                $nf++;
                //obtengo el nombre del archivo sin las carpetas
                $dest = substr($file, 7, 50);
                //se defino la ruta del archivo
                $full_path_source = asset("storage/files/1".$dest);
                //copio el archivo a la carpeta correspondiente
                copy($full_path_source, "storage/files/shares/Facturas".$dest);
                //elimino el archivo subido
                unlink(public_path("storage/files/1".$dest));
            }
            if(stristr($texto, 'orden') && stristr($texto, 'compra')){
                //identificar el documento
                  $clasificado="orden";
                  //cuento los documentos de este tipo
                  $no++;
                  //obtengo el nombre del archivo sin las carpetas
                  $dest = substr($file, 7, 50);
                  //se defino la ruta del archivo
                  $full_path_source = asset("storage/files/1".$dest);
                  //copio el archivo a la carpeta correspondiente
                  copy($full_path_source, "storage/files/shares/Ordenes".$dest);
                  //elimino el archivo subido
                  unlink(public_path("storage/files/1".$dest));
              }
              if(stristr($texto, 'republica') && stristr($texto, 'colombia')){
                //identificar el documento
                  $clasificado="cedula";
                  //cuento los documentos de este tipo
                  $nc++;
                  //obtengo el nombre del archivo sin las carpetas
                  $dest = substr($file, 7, 50);
                  //se defino la ruta del archivo
                  $full_path_source = asset("storage/files/1".$dest);
                  //copio el archivo a la carpeta correspondiente
                  copy($full_path_source, "storage/files/shares/Cedulas".$dest);
                  //elimino el archivo subido
                  unlink(public_path("storage/files/1".$dest));
              }
                  if($clasificado==""){
                  //cuento los documentos ilegibles
                  $ni++;
                  //obtengo el nombre del archivo sin las carpetas
                  $dest = substr($file, 7, 50);
                  //se defino la ruta del archivo
                  $full_path_source = asset("storage/files/1".$dest);
                  //copio el archivo a la carpeta correspondiente
                  copy($full_path_source, "storage/files/shares/Ilegibles".$dest);
                  //elimino el archivo subido
                  unlink(public_path("storage/files/1".$dest));
              }
        }   
    $data =['nf'=>$nf, 'no'=>$no,'nc'=>$nc,'ni'=>$ni];             
    return view('home',$data);
    }
}


