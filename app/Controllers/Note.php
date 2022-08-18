<?php
namespace app\Controllers;

use CodeIgniter\Controller;
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use App\Models\NoteModel;
use App\Models\InscriptionModel;

class Note extends Controller
{

    public function index()
    {
        return view('admin/note/form');
    }

    public function download()
    {
        
        // $writer->save("php://output");
    }

    public function upload()
    {
        //echo 'ato';
        if (null != ($this->request->getVar('download'))) {
            // header('Content-Type: application/vnd.ms-excel');
            // header('Content-Disposition: attachment;filename:"test.xlsx"');
            echo 'tato';
            $inscription_model=new InscriptionModel();
            $etudiants=$inscription_model->getInscriptionEtudiant();
            print_r($etudiants);
            $spreadsheet = new SpreadSheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Test');
            
            $writer = new Xlsx($spreadsheet);
            $writer->save("test.xlsx");
        }
        if (null != $this->request->getVar('id_ecue') && (null != ($this->request->getVar('import')))) {
            $id_ecue = $this->request->getVar('id_ecue');

            $upload_file = $_FILES['upload_file']['name'];
            $extention = pathinfo($upload_file, PATHINFO_EXTENSION);
            if ($extention == 'csv') {
                $reader = new Csv();
            } else if ($extention == 'xls') {
                $reader = new Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadSheet = $reader->load($_FILES['upload_file']['tmp_name']);
            $sheetData = $spreadSheet->getActiveSheet()->toArray();
            $sheetCount = count($sheetData);
            if ($sheetCount > 1) {
                $notes = array();
                for ($i = 1; $i < $sheetCount; $i ++) {
                    $notes[] = array(
                        'id_inscription' => $sheetData[$i][1],
                        'note' => $sheetData[$i][3],
                        'id_examen' => 1,
                        'id_ecue' => $id_ecue
                    );
                }
                $note_model = new NoteModel();
                $note_model->insertBatch($notes);
            }
            echo '<PRE>';
            print_r($sheetData);
        }
    }
}

