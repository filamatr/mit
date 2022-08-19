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
use App\Models\EcueModel;
use App\Models\UeModel;

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
            //echo 'tato';
            $inscription_model=new InscriptionModel();
            $etudiants=$inscription_model->getInscriptionEtudiant();
            $nb_etudiants=count($etudiants);
            print_r($etudiants);
            $spreadsheet = new SpreadSheet();
            $sheet = $spreadsheet->getActiveSheet();
            $i=1;
            foreach ($etudiants as $etudiant)
            //for($i=0;$i<$nb_etudiants;$i++)
            {
                $sheet->setCellValue('A'.$i, $etudiant->id_inscription);
                $sheet->setCellValue('B'.$i, $etudiant->nom);
                $sheet->setCellValue('C'.$i, $etudiant->prenoms);
                $sheet->setCellValue('D'.$i, rand(0, 20));
                $i++;
            }
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
                for ($i = 0; $i < $sheetCount; $i ++) {
                    $notes[] = array(
                        'id_inscription' => $sheetData[$i][0],
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

    public function affiche_note()
    {
        $notes=array();
       // $ecue_model=new EcueModel();
       // $ecue_model->getEcueFromUe($id_ue)
       $ue_model=new UeModel();
       $ecue_model=new EcueModel();
       $critere=['id_parcours'=>80, 'semestre'=>1];
       $criteria=['id_parcours'=>80, 'niveau'=>1,'grade'=>'L'];
       $inscription_model=new InscriptionModel();
       $etudiants=$inscription_model->getInscriptionEtudiantParcoursGradeNiveau($criteria);
       $ues=$ue_model->getUeFromParcoursNiveau($critere);
       //print_r($ues);
       
       echo '<table border=1>';
       foreach ($etudiants as $etudiant)
       {
        echo '<tr >';
        
        echo '<td>'.$etudiant->id_inscription.'</td>';
        echo '<td>'.$etudiant->nom.'</td>';
        echo '<td>'.$etudiant->prenoms.'</td>';
        foreach ($ues as $ue)
        {
            $ecues=$ecue_model->getEcueFromUe($ue->id_ue);
            foreach ($ecues as $ecue)
            {
                $critere_note=[
                    'id_inscription'=>$etudiant->id_inscription,
                    'id_ecue'=>$ue->id_ue,
                    
                ];
                echo '<td>'.$ecue->nom_ecue.'</td>';
            }
        }
        
        echo'</tr>';
       }
       
       echo '<table>';
       /*foreach ($ues as $ue)
       {
           echo $ue->nom_ue.'['.$ue->credit.']   ';
            echo '<PRE>';
            $ecues=$ecue_model->getEcueFromUe($ue->id_ue);
            foreach ($ecues as $ecue)
            {
                echo $ecue->nom_ecue.'['.$ecue->credit.']  - ';
            }
            echo '<PRE>';
       
       }*/
    }

}

