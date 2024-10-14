<?php

namespace App\Http\Controllers;

use App\Models\Cadre;
use App\Models\Category;
use App\Models\Passation;
use App\Models\Photo;
use App\Models\Project;
use App\Models\Project_file;
use App\Models\Ptba;
use App\Models\Rapport;
use App\Models\Video;
use Carbon\Carbon;
use DivisionByZeroError;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Js;

use function PHPUnit\Framework\returnValue;

class ProjectController extends Controller
{
  //
  public function logout()
  {
    if (session()->has('LoggedInUser')) {
      session()->pull('LoggedInUser');
      return redirect('/login');
    }
  }


  //FECTH PTBA ONE

  public function fetchAll_PTBA_METHOD(Request $request)
  {

    $unique_code = $request->unique_code;
    $year_one = $request->year_one;


    $get_ptba = DB::table('ptbas')->where('unique_code', '=', $unique_code)->where('year', '=', $year_one)->get();
    $output = '';
    if ($get_ptba->count() > 0) {

      $output .=
        '
       <table  border=0 cellspacing=0 cellpadding=0 width=623 style="width:467.5pt;border-collapse:collapse" id="ptba_table_two" >
       <thead>
           <tr style="height:.2in">
               <th width=15 rowspan=2 style="width:11.15pt;border:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif">Code de Réf.</span></b></p>
               </th>
               <th width=36 rowspan=2 style="width:27.05pt;border:solid windowtext 1.0pt;
border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Intitulé activité</span></b></p>
               </th>
               <th width=26 rowspan=2 style="width:19.5pt;border:solid windowtext 1.0pt;
border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Indicateur de process</span></b></p>
               </th>
               <th width=27 rowspan=2 style="width:19.95pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Unité</span></b></p>
               </th>
               <th width=32 rowspan=2 style="width:24.35pt;border:solid windowtext 1.0pt;
border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Composante</span></b></p>
               </th>
               <th width=32 rowspan=2 style="width:24.35pt;border:solid windowtext 1.0pt;
border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Sous-Composante</span></b></p>
               </th>
               <th width=42 rowspan=2 style="width:31.65pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Catégorie financière/Fonds</span></b></p>
               </th>
               <th width=32 rowspan=2 style="width:23.7pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Source de financement</span></b></p>
               </th>
               <th width=33 rowspan=2 style="width:24.95pt;border:solid windowtext 1.0pt;
border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Responsable activité</span></b></p>
               </th>
               <th width=47 colspan=2 style="width:35.4pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Période activité</span></b></p>
               </th>
               <th width=24 rowspan=2 style="width:17.7pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Durée activité</span></b></p>
               </th>
               <th width=55 colspan=3 style="width:41.0pt;border:solid windowtext 1.0pt;
border-left:none;background:#FFF2CC;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Réalisation physique</span></b></p>
               </th>
               <th width=52 colspan=3 style="width:38.9pt;border:solid windowtext 1.0pt;
border-left:none;background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Réalisation financière</span></b></p>
               </th>
               <th width=29 rowspan=2 style="width:22.1pt;border:solid windowtext 1.0pt;
border-left:none;background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Ratio efficience</span></b></p>
               </th>
               <th width=36 rowspan=2 style="width:27.1pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Note appréciation</span></b></p>
               </th>
               <th width=105 rowspan=2 style="width:78.65pt;border:solid windowtext 1.0pt;
border-left:none;background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Commentaire</span></b></p>
               </th>
           </tr>
           <tr style="height:14.5pt">
               <th width=24 style="width:17.7pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Début activité</span></b></p>
               </th>
               <th width=24 style="width:17.7pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Fin activité</span></b></p>
               </th>
               <th width=16 style="width:12.0pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Prévu</span></b></p>
               </th>
               <th width=20 style="width:14.7pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Réalisé</span></b></p>
               </th>
               <th width=19 style="width:14.3pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">%</span></b></p>
               </th>
               <th width=16 style="width:12.0pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#F8CBAD;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Prévu</span></b></p>
               </th>
               <th width=20 style="width:14.7pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#F8CBAD;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Réalisé</span></b></p>
               </th>
               <th width=16 style="width:12.2pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#F8CBAD;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">%</span></b></p>
               </th>
              
           </tr>
       </thead>
       <tbody>

      ';
      foreach ($get_ptba as $ptba) {



        $output .=  '<tr>
         
      <td width=15 nowrap valign=bottom style="width:11.15pt;border:solid windowtext 1.0pt;border-top:none;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="color:black">' . $ptba->Code_de_Réf . '</span></p>
      </td>

      <td width=36 style="width:27.05pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=FR style="font-size:10.0pt;font-family:"Arial",sans-serif;color:black">
          ' . $ptba->Intitulé_de_activité . '</span></p>
      </td>

      <td width=26 style="width:19.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
          <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
           "Arial",sans-serif"> ' . $ptba->Indicateur_de_process . '</span></p>
      </td>

      <td width=27 style="width:19.95pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
           "Arial",sans-serif">' . $ptba->Unité . '</span></p>
      </td>

      <td width=32 style="width:24.35pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center; line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->Composante . '</span></p>
      </td>

      <td width=32 style="width:24.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
           "Arial",sans-serif">' . $ptba->Sous_Composante . '</span></p>
      </td>

      <td width=42 style="width:31.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->Catégorie_financière_Fonds . '</span></p>
      </td>

      <td width=32 style="width:23.7pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt; height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">&nbsp; ' . $ptba->Source_de_financement . '</span></p>
      </td>

      <td width=33 style="width:24.95pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center; line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
             "Arial",sans-serif">' . $ptba->Responsable_activité . '</span></p>
      </td>

      <td width=24 style="width:17.7pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->Début_activité . '</span></p>
      </td>

      <td width=24 style="width:17.7pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt; height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->Fin_activité . '</span></p>
      </td>

      <td width=24 style="width:17.7pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->Durée_activité . '</span></b></p>
      </td>

      <td width=16 style="width:12.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->Prévu_one . '</span></p>
      </td>
      <td width=20 style="width:14.7pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif;color:black">' . $ptba->Réalisé_one . '</span></p>
      </td>
      <td width=19 style="width:14.3pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal align=right style="margin-bottom:0in;text-align:right; line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
           "Arial",sans-serif">' . $ptba->percent_one . '%</span></b></p>
      </td>
      <td width=16 style="width:12.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center; line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
           "Arial",sans-serif">' . $ptba->Prévu_two . '</span></p>
      </td>
      <td width=20 style="width:14.7pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
    
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center; line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif;color:black">' . $ptba->Réalisé_two . '</span></p>
    
      </td>

      <td width=16 style="width:12.2pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt; height:25.0pt">
            <p class=MsoNormal align=right style="margin-bottom:0in;text-align:right; line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->percent_two . '%</span></b></p>
      </td>

      <td width=29 nowrap style="width:22.1pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
             <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black"> ' . $ptba->Ratio_efficience . '</span></b></p>
      </td>

      <td width=36 nowrap style="width:27.1pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
             <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="color:black">
             ' . $ptba->Note_appréciation . '</span></p>
      </td>

      <td width=105 nowrap style="width:78.65pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
             <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=FR style="color:black"> ' . $ptba->Commentaire . '</span></p>
      </td>
      <td width=105 nowrap style="width:78.65pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
      <a href="#" class="edit_ptba_btn" id="' . $ptba->id . '"  data-toggle="modal" data-target="#ptbaModal"><ion-icon name="pencil-outline"></ion-icon></a>
      <a href="#" class="delet_ptba_btn" id="' . $ptba->id . '"  ><ion-icon name="trash-outline"></ion-icon></a>
</td>


      
     </tr>';
      }

      $output .=  '</tbody></table>';

      echo $output;
    }
  }

  public function fetchAll_PTBA_METHOD_TWO(Request $request)
  {

    $unique_code = $request->unique_code;
    $year_two = $request->year_two;


    $get_ptba = DB::table('ptbas')->where('unique_code', '=', $unique_code)->where('year', '=', $year_two)->get();
    $output = '';
    if ($get_ptba->count() > 0) {

      $output .=
        '
       <table  border=0 cellspacing=0 cellpadding=0 width=623 style="width:467.5pt;border-collapse:collapse" id="ptba_table_two" >
       <thead>
           <tr style="height:.2in">
               <th width=15 rowspan=2 style="width:11.15pt;border:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif">Code de Réf.</span></b></p>
               </th>
               <th width=36 rowspan=2 style="width:27.05pt;border:solid windowtext 1.0pt;
border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Intitulé activité</span></b></p>
               </th>
               <th width=26 rowspan=2 style="width:19.5pt;border:solid windowtext 1.0pt;
border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Indicateur de process</span></b></p>
               </th>
               <th width=27 rowspan=2 style="width:19.95pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Unité</span></b></p>
               </th>
               <th width=32 rowspan=2 style="width:24.35pt;border:solid windowtext 1.0pt;
border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Composante</span></b></p>
               </th>
               <th width=32 rowspan=2 style="width:24.35pt;border:solid windowtext 1.0pt;
border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Sous-Composante</span></b></p>
               </th>
               <th width=42 rowspan=2 style="width:31.65pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Catégorie financière/Fonds</span></b></p>
               </th>
               <th width=32 rowspan=2 style="width:23.7pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Source de financement</span></b></p>
               </th>
               <th width=33 rowspan=2 style="width:24.95pt;border:solid windowtext 1.0pt;
border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Responsable activité</span></b></p>
               </th>
               <th width=47 colspan=2 style="width:35.4pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Période activité</span></b></p>
               </th>
               <th width=24 rowspan=2 style="width:17.7pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Durée activité</span></b></p>
               </th>
               <th width=55 colspan=3 style="width:41.0pt;border:solid windowtext 1.0pt;
border-left:none;background:#FFF2CC;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Réalisation physique</span></b></p>
               </th>
               <th width=52 colspan=3 style="width:38.9pt;border:solid windowtext 1.0pt;
border-left:none;background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Réalisation financière</span></b></p>
               </th>
               <th width=29 rowspan=2 style="width:22.1pt;border:solid windowtext 1.0pt;
border-left:none;background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Ratio efficience</span></b></p>
               </th>
               <th width=36 rowspan=2 style="width:27.1pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Note appréciation</span></b></p>
               </th>
               <th width=105 rowspan=2 style="width:78.65pt;border:solid windowtext 1.0pt;
border-left:none;background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Commentaire</span></b></p>
               </th>
           </tr>
           <tr style="height:14.5pt">
               <th width=24 style="width:17.7pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Début activité</span></b></p>
               </th>
               <th width=24 style="width:17.7pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Fin activité</span></b></p>
               </th>
               <th width=16 style="width:12.0pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Prévu</span></b></p>
               </th>
               <th width=20 style="width:14.7pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Réalisé</span></b></p>
               </th>
               <th width=19 style="width:14.3pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">%</span></b></p>
               </th>
               <th width=16 style="width:12.0pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#F8CBAD;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Prévu</span></b></p>
               </th>
               <th width=20 style="width:14.7pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#F8CBAD;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Réalisé</span></b></p>
               </th>
               <th width=16 style="width:12.2pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#F8CBAD;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                   <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">%</span></b></p>
               </th>
              
           </tr>
       </thead>
       <tbody>

      ';
      foreach ($get_ptba as $ptba) {



        $output .=  '<tr>
         
      <td width=15 nowrap valign=bottom style="width:11.15pt;border:solid windowtext 1.0pt;border-top:none;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="color:black">' . $ptba->Code_de_Réf . '</span></p>
      </td>

      <td width=36 style="width:27.05pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=FR style="font-size:10.0pt;font-family:"Arial",sans-serif;color:black">
          ' . $ptba->Intitulé_de_activité . '</span></p>
      </td>

      <td width=26 style="width:19.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
          <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
           "Arial",sans-serif"> ' . $ptba->Indicateur_de_process . '</span></p>
      </td>

      <td width=27 style="width:19.95pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
           "Arial",sans-serif">' . $ptba->Unité . '</span></p>
      </td>

      <td width=32 style="width:24.35pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center; line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->Composante . '</span></p>
      </td>

      <td width=32 style="width:24.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
           "Arial",sans-serif">' . $ptba->Sous_Composante . '</span></p>
      </td>

      <td width=42 style="width:31.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->Catégorie_financière_Fonds . '</span></p>
      </td>

      <td width=32 style="width:23.7pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt; height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">&nbsp; ' . $ptba->Source_de_financement . '</span></p>
      </td>

      <td width=33 style="width:24.95pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center; line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
             "Arial",sans-serif">' . $ptba->Responsable_activité . '</span></p>
      </td>

      <td width=24 style="width:17.7pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->Début_activité . '</span></p>
      </td>

      <td width=24 style="width:17.7pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt; height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->Fin_activité . '</span></p>
      </td>

      <td width=24 style="width:17.7pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->Durée_activité . '</span></b></p>
      </td>

      <td width=16 style="width:12.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->Prévu_one . '</span></p>
      </td>
      <td width=20 style="width:14.7pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif;color:black">' . $ptba->Réalisé_one . '</span></p>
      </td>
      <td width=19 style="width:14.3pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal align=right style="margin-bottom:0in;text-align:right; line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
           "Arial",sans-serif">' . $ptba->percent_one . '%</span></b></p>
      </td>
      <td width=16 style="width:12.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
           <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center; line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
           "Arial",sans-serif">' . $ptba->Prévu_two . '</span></p>
      </td>
      <td width=20 style="width:14.7pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
    
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center; line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif;color:black">' . $ptba->Réalisé_two . '</span></p>
    
      </td>

      <td width=16 style="width:12.2pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt; height:25.0pt">
            <p class=MsoNormal align=right style="margin-bottom:0in;text-align:right; line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
            "Arial",sans-serif">' . $ptba->percent_two . '%</span></b></p>
      </td>

      <td width=29 nowrap style="width:22.1pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
             <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black"> ' . $ptba->Ratio_efficience . '</span></b></p>
      </td>

      <td width=36 nowrap style="width:27.1pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
             <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="color:black">
             ' . $ptba->Note_appréciation . '</span></p>
      </td>

      <td width=105 nowrap style="width:78.65pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:25.0pt">
             <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=FR style="color:black"> ' . $ptba->Commentaire . '</span></p>
      </td>
     


      
     </tr>';
      }

      $output .=  '</tbody></table>';

      echo $output;
    }
  }



  public function fetchAll_Passation(Request $request)
  {

    $unique_code = $request->unique_code;
    $year = $request->year;
    $get_passations = DB::table('passations')->where('unique_code', '=', $unique_code)->where('year', '=', $year)->get();
    $output = '';
    if ($get_passations->count() > 0) {
      $output .= '
      <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=2111 style="width:1583.5pt;border-collapse:collapse">
      <thead>
      <tr style="height:39.0pt">
          <td width=359 valign=bottom style="width:269.0pt;border:solid windowtext 1.0pt;
background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif">Decription du Marché</span></b></p>
          </td>
          <td width=229 style="width:171.75pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">N° Reference du Marché</span></b></p>
          </td>
          <td width=105 style="width:78.5pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Type du Marché</span></b></p>
          </td>
          <td width=115 style="width:86.5pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=FR style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Méthode de sélection du Marché</span></b></p>
          </td>
          <td width=116 style="width:86.9pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="argin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=FR style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Type de révision (à Priori / à Postériori)</span></b></p>
          </td>
          <td width=128 style="width:95.85pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Montant estimatif du Marché</span></b></p>
          </td>
          <td width=124 style="width:92.85pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Montant réel du Marché</span></b></p>
          </td>
          <td width=124 style="width:92.9pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Ecart du montant</span></b></p>
          </td>
          <td width=137 style="width:102.65pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=FR style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Date de signature du contrat</span></b></p>
          </td>
          <td width=140 style="width:105.35pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=FR style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Date de livaison/Production du rapport </span></b></p>
          </td>
          <td width=73 style="width:54.45pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Ecart de durée</span></b></p>
          </td>
          <td width=143 style="width:107.05pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Nom entreprise Contractant</span></b></p>
          </td>
          <td width=107 style="width:80.35pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Note appréciation du Marché</span></b></p>
          </td>
          <td width=213 style="width:159.4pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Commentaire</span></b></p>
          </td>
          <td width=213 style="width:159.4pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Action</span></b></p>
          </td>
      </tr>
      </thead>
      <tbody>


    

 

      ';
      foreach ($get_passations as $passations) {

        $output .=
          '<tr>
         
         <td width=359 style="width:269.0pt;border:solid windowtext 1.0pt;border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
                    <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp;' . $passations->Decription_du_march . '</span> </p>
         </td>

         <td width=229 style="width:171.75pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
                    <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp;' . $passations->Numero_Reference_du_marché . '</span> </p>
         </td>

         <td width=105 style="width:78.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
                    <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp;' . $passations->Type_du_marché . '</span></p>
         </td>

         <td width=115 style="width:86.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
                <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center; line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp; ' . $passations->Méthode_de_sélection_du_Marché . '</span></p>
         </td>

         <td width=116 style="width:86.9pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
                <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family: "Arial",sans-serif;color:black">&nbsp; ' . $passations->Type_de_révision . '</span></p>
         </td>
         
         <td width=128 style="width:95.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
               <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp;' . $passations->Montant_estimatif_du_Marché . '</span></p>
         </td>

         <td width=124 style="width:92.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
             <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp; ' . $passations->Montant_réel_du_marché . '</span></p>
         </td>

         <td width=124 style="width:92.9pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black"> ' . $passations->Ecart_du_montant . '</span></b></p>
         </td>

         <td width=137 style="width:102.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
             <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp; ' . $passations->Date_de_signature_du_contrat . '</span></p>
         </td>

         <td width=140 style="width:105.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
             <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="f"ont-family:"Arial",sans-serif;color:black">&nbsp; ' . $passations->Date_livaison_Production_du_rapport . '</span></p>
         </td>

         <td width=73 style="width:54.45pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
             <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="font-family:"Arial",sans-serif;color:black"> ' . $passations->Ecart_de_durée . ' </span></b></p>
         </td>
         

         <td width=143 style="width:107.05pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
            <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="font-family:"Arial",sans-serif">&nbsp; ' . $passations->Nom_de_entreprise_contractant . '</span></p>
        </td>

        <td width=107 style="width:80.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
           <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="font-family:"Arial",sans-serif">&nbsp; ' . $passations->Note_appréciation_du_marché . '</span></p>
        </td>

        <td width=213 style="width:159.4pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
           <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="font-family:"Arial",sans-serif">&nbsp; ' . $passations->Commentaire . '</span></p>
        </td>
        <td width=213 style="width:159.4pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
          <a href="#" class="edit_passation_btn" id="' . $passations->id . '"  data-toggle="modal" data-target="#edit_passationModal"><ion-icon name="pencil-outline"></ion-icon></a>
          <a href="#" class="delet_passation_btn" id="' . $passations->id . '"  ><ion-icon name="trash-outline"></ion-icon></a>

        </td>
        </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
    }
  }

  public function fetchAll_Passation_Two(Request $request)
  {

    $unique_code = $request->unique_code;
    $year = $request->year;
    $get_passations = DB::table('passations')->where('unique_code', '=', $unique_code)->where('year', '=', $year)->get();
    $output = '';
    if ($get_passations->count() > 0) {
      $output .= '
      <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=2111 style="width:1583.5pt;border-collapse:collapse" id="table_passation_two">
      <thead>
      <tr style="height:39.0pt">
          <td width=359 valign=bottom style="width:269.0pt;border:solid windowtext 1.0pt;
background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif">Decription du Marché</span></b></p>
          </td>
          <td width=229 style="width:171.75pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">N° Reference du Marché</span></b></p>
          </td>
          <td width=105 style="width:78.5pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Type du Marché</span></b></p>
          </td>
          <td width=115 style="width:86.5pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=FR style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Méthode de sélection du Marché</span></b></p>
          </td>
          <td width=116 style="width:86.9pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="argin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=FR style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Type de révision (à Priori / à Postériori)</span></b></p>
          </td>
          <td width=128 style="width:95.85pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Montant estimatif du Marché</span></b></p>
          </td>
          <td width=124 style="width:92.85pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Montant réel du Marché</span></b></p>
          </td>
          <td width=124 style="width:92.9pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Ecart du montant</span></b></p>
          </td>
          <td width=137 style="width:102.65pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=FR style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Date de signature du contrat</span></b></p>
          </td>
          <td width=140 style="width:105.35pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=FR style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Date de livaison/Production du rapport </span></b></p>
          </td>
          <td width=73 style="width:54.45pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Ecart de durée</span></b></p>
          </td>
          <td width=143 style="width:107.05pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Nom entreprise Contractant</span></b></p>
          </td>
          <td width=107 style="width:80.35pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Note appréciation du Marché</span></b></p>
          </td>
          <td width=213 style="width:159.4pt;border:solid windowtext 1.0pt;border-left:
none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt">
              <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Commentaire</span></b></p>
          </td>
         
      </tr>
      </thead>
      <tbody>


    

 

      ';
      foreach ($get_passations as $passations) {

        $output .=
          '<tr>
         
         <td width=359 style="width:269.0pt;border:solid windowtext 1.0pt;border-top:none;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
                    <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp;' . $passations->Decription_du_march . '</span> </p>
         </td>

         <td width=229 style="width:171.75pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
                    <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp;' . $passations->Numero_Reference_du_marché . '</span> </p>
         </td>

         <td width=105 style="width:78.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
                    <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp;' . $passations->Type_du_marché . '</span></p>
         </td>

         <td width=115 style="width:86.5pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
                <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center; line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp; ' . $passations->Méthode_de_sélection_du_Marché . '</span></p>
         </td>

         <td width=116 style="width:86.9pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
                <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family: "Arial",sans-serif;color:black">&nbsp; ' . $passations->Type_de_révision . '</span></p>
         </td>
         
         <td width=128 style="width:95.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
               <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp;' . $passations->Montant_estimatif_du_Marché . '</span></p>
         </td>

         <td width=124 style="width:92.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
             <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp; ' . $passations->Montant_réel_du_marché . '</span></p>
         </td>

         <td width=124 style="width:92.9pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
            <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black"> ' . $passations->Ecart_du_montant . '</span></b></p>
         </td>

         <td width=137 style="width:102.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
             <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:12.0pt;font-family:"Arial",sans-serif;color:black">&nbsp; ' . $passations->Date_de_signature_du_contrat . '</span></p>
         </td>

         <td width=140 style="width:105.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
             <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="f"ont-family:"Arial",sans-serif;color:black">&nbsp; ' . $passations->Date_livaison_Production_du_rapport . '</span></p>
         </td>

         <td width=73 style="width:54.45pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:white;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
             <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="font-family:"Arial",sans-serif;color:black"> ' . $passations->Ecart_de_durée . ' </span></b></p>
         </td>
         

         <td width=143 style="width:107.05pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
            <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="font-family:"Arial",sans-serif">&nbsp; ' . $passations->Nom_de_entreprise_contractant . '</span></p>
        </td>

        <td width=107 style="width:80.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
           <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="font-family:"Arial",sans-serif">&nbsp; ' . $passations->Note_appréciation_du_marché . '</span></p>
        </td>

        <td width=213 style="width:159.4pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.5pt">
           <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="font-family:"Arial",sans-serif">&nbsp; ' . $passations->Commentaire . '</span></p>
        </td>
      
        </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
    }
  }


  /// handle fetch project
  public function fetchAllFiles(Request $request)
  {


    $unique_code = $request->unique_code;
    $get_files = DB::table('project_files')->where('unique_code', $unique_code)->get();

    $output = '';
    if ($get_files->count() > 0) {

      foreach ($get_files as $files) {
        $output .= '
        <div class="col-6  d-flex ">
            <div class="card  p-2 rounded-0  shadow">
                 <div class="row">
                    <div class="col-md-2">
                        <img src="storage/images/my_pdf.png" alt="" srcset="" class="img-fluid" width="50">
                    </div>
                    <div class="col-md-8">
                        <p>' . $files->my_file_name . '</p>
                    </div>
                    <div class="col-md-2 d-flex p-2">
                    <a href="#" class="delet_file_btn" id="' . $files->id . '" style="color:red"  ><ion-icon name="trash-outline"></ion-icon> </a> 
                    <a href="storage/images/' . $files->file_name . '"  class=""  download ><ion-icon name="download-outline"></ion-icon> </a> 
                    
                    </div>
                  
                 </div>
               
                
           </div>
         </div>  
     ';
      }

      echo $output;
    } else {
      echo  '<div class="card shadow rounded-0 ml-2 align-items-center p-3"><ion-icon name="folder-open-outline"></ion-icon><p class="py-2"> PAS DE FICHIERS POUR LE MOMENT</p></div>';
    }
  }



  public function fetchAllFiles_Photo(Request $request)
  {
    $unique_code = $request->unique_code;
    $get_file_photo = DB::table('photos')->where('unique_code', $unique_code)->get();

    $output = '';
    if ($get_file_photo->count() > 0) {

      foreach ($get_file_photo as $photo) {
        $output .= '
        
        <div class="col-3  d-flex shadow ">
        <div class="me  rounded-0  shadow">
             <div class="row">
                <div class="col-md-12">
                    <img src="storage/photo/' . $photo->file_name . '" alt="" srcset="" class="img-fluid" ><br>
                 </div>
               
             </div>
             <div class="row">
                  <div class="col-md-12">
                     <p><b> Titre</b>: ' . $photo->my_file_name . '</p>
                     <a href="#" class="delet_file_photo_btn" id="' . $photo->id . '" style="color:red"  ><ion-icon name="trash-outline"></ion-icon> </a> 
                     <a href="storage/video/' . $photo->file_name . '"    download ><ion-icon name="download-outline"></ion-icon> </a> 
                  </div>
                
                   
                 
               </div>
           
            
       </div>
       </div>
    
                
            
     ';
      }

      echo $output;
    } else {
      echo  '<div class="card shadow rounded-0 ml-2 align-items-center p-3"><ion-icon name="folder-open-outline"></ion-icon><p class="py-2"> PAS DE FICHIERS POUR LE MOMENT</p></div>';
    }
  }
  public function fetchAllFiles_Video(Request $request)
  {
    $unique_code = $request->unique_code;
    $get_file_video = DB::table('videos')->where('unique_code', $unique_code)->get();

    $output = '';
    if ($get_file_video->count() > 0) {

      foreach ($get_file_video as $video) {
        $output .= '

        <div class="col-6  d-flex shadow ">
            <div class="me  rounded-0  shadow">
                 <div class="row">
                    <div class="col-md-12">
                        <video width="320" height="240" controls>
                            <source src="storage/video/' . $video->file_name . '"  type="video/mp4">
                            <source src="storage/video/' . $video->file_name . '" type="video/ogg">
                    
                        </video><br>
                     </div>
                   
                 </div>
                 <div class="row">
                      <div class="col-md-12">
                         <p><b> Titre</b>: ' . $video->my_file_name . '</p>
                         <a href="#" class="delet_file_video_btn" id="' . $video->id . '" style="color:red"  ><ion-icon name="trash-outline"></ion-icon> </a> 
                         <a href="storage/video/' . $video->file_name . '"    download ><ion-icon name="download-outline"></ion-icon> </a> 
                      </div>
                    
                       
                     
                   </div>
               
                
           </div>
           </div>
        
       
               
                
            
     ';
      }

      echo $output;
    } else {
      echo  '<div class="card shadow rounded-0 ml-2 align-items-center p-3"><ion-icon name="folder-open-outline"></ion-icon><p class="py-2"> PAS DE FICHIERS POUR LE MOMENT</p></div>';
    }
  }


  /// handle fetch project
  public function fetchAllFiles_Rapport(Request $request)
  {


    $unique_code = $request->unique_code;
    $get_files = DB::table('rapports')->where('unique_code', $unique_code)->get();

    $output = '';
    if ($get_files->count() > 0) {


      foreach ($get_files as $files) {

        $output .= '
              <div class="col-6  d-flex ">
                  <div class="card  p-2 rounded-0  shadow">
                       <div class="row">
                          <div class="col-md-2">
                              <img src="storage/images/my_pdf.png" alt="" srcset="" class="img-fluid" width="50">
                          </div>
                          <div class="col-md-8">
                              <p>levi mokili</p>
                          </div>
                          <div class="col-md-2 d-flex p-2">
                          <a href="#" class="delet_file_btn" id="' . $files->id . '"  ><ion-icon name="trash-outline"></ion-icon> </a> 
                          <a href="storage/rapport/' . $files->file_name . '"  class=""  download ><ion-icon name="download-outline"></ion-icon> </a> 

                          </div>
                        
                       </div>
                     
                      
                 </div>
               </div>  
           ';
      }

      echo $output;
    } else {
      echo  '<div class="card shadow rounded-0 ml-2 align-items-center p-3"><ion-icon name="folder-open-outline"></ion-icon><p class="py-2"> PAS DE FICHIERS POUR LE MOMENT</p></div>';
    }
  }

  public function fetchAll_Categorie_Depense(Request $request)
  {

    $unique_code = $request->unique_code;
    $get_depenses = DB::table('categories')->where('unique_code', $unique_code)->get();
    $output = '';
    if ($get_depenses->count() > 0) {
      $output .= '
     
     <table border=0 cellspacing=0 cellpadding=0 width=736 style="width:552.0pt;border-collapse:collapse" id="my_table"  class="table table-bordered" >
     <thead>

         <tr style="height:21.65pt">
             <th width=56 nowrap rowspan=2 style="width:42.0pt;border:solid windowtext 1.0pt;border-bottom:solid black 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">N°</span></b></p>
             </th>
             <th width=260 nowrap rowspan=2 style="width:195.0pt;border-top:solid windowtext 1.0pt;border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">Intitulé de la
                             catégorie</span></b></p>
             </th>
             <th width=105 nowrap rowspan=2 style="width:79.0pt;border-top:solid windowtext 1.0pt;border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">Montant</span></b></p>
             </th>
             <th width=80 nowrap rowspan=2 style="width:60.0pt;border-top:solid windowtext 1.0pt;border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">%</span></b></p>
             </th>
             <th width=235 colspan=3 style="width:176.0pt;border:none;border-bottom:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">Source de
                             financement</span></b></p>
             </th>
         </tr>
         <tr style="height:14.5pt">
             <th width=75 style="width:56.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">Source 1</span></b></p>
             </th>
             <th width=80 style="width:60.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">Source 2</span></b></p>
             </th>
             <th width=80 style="width:60.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">Source 3</span></b></p>
             </th>
         </tr>


     </thead>
     <tbody>
     ';

      foreach ($get_depenses as $categories) {
        $output .= '<tr>

        <td width=56 nowrap style="width:42.0pt;border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="color:black"></span></p>
        </td>

        <td width=260 nowrap valign=bottom style="width:195.0pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="color:black">' . $categories->Intitule . '</span></p>
        </td>

        <td width=105 nowrap valign=bottom style="width:79.0pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal align=right style="margin-bottom:0in;text-align:right;line-height:normal"><span lang=EN-GB style="color:black">' . $categories->montant . '</span></p>
        </td>

        <td width=80 nowrap valign=bottom style="width:60.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal align=right style="margin-bottom:0in;text-align:right;line-height:normal"><span lang=EN-GB style="color:black">' . $categories->percentage . '%</span></p>
        </td>

        <td width=75 nowrap valign=bottom style="width:56.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="color:black">&nbsp; ' . $categories->source_1 . '</span></p>
        </td>

        <td width=80 nowrap valign=bottom style="width:60.0pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="color:black">&nbsp; ' . $categories->source_2 . '</span></p>
        </td>

        <td width=80 nowrap valign=bottom style="width:60.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="color:black">&nbsp; ' . $categories->source_3 . '</span></p>
        </td>
       
        
        </tr>';
      }

      $output .= '</tbody></table>';
      echo $output;
    } else {
      echo  '<div class="card shadow rounded-0 ml-2 align-items-center p-3"><ion-icon name="folder-open-outline"></ion-icon><p class="py-2"> PAS DE FICHIERS POUR LE MOMENT</p></div>';
    }
  }


  public function fetchAll_Categorie_Depense_TWO(Request $request)
  {

    $unique_code = $request->unique_code;
    $get_depenses = DB::table('categories')->where('unique_code', $unique_code)->get();
    $output = '';
    if ($get_depenses->count() > 0) {
      $output .= '
     
     <table border=0 cellspacing=0 cellpadding=0 width=736 style="width:552.0pt;border-collapse:collapse" id="my_table_two"  class="table table-bordered" >
     <thead>

         <tr style="height:21.65pt">
             <th width=56 nowrap rowspan=2 style="width:42.0pt;border:solid windowtext 1.0pt;border-bottom:solid black 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">N°</span></b></p>
             </th>
             <th width=260 nowrap rowspan=2 style="width:195.0pt;border-top:solid windowtext 1.0pt;border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">Intitulé de la
                             catégorie</span></b></p>
             </th>
             <th width=105 nowrap rowspan=2 style="width:79.0pt;border-top:solid windowtext 1.0pt;border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">Montant</span></b></p>
             </th>
             <th width=80 nowrap rowspan=2 style="width:60.0pt;border-top:solid windowtext 1.0pt;border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">%</span></b></p>
             </th>
             <th width=235 colspan=3 style="width:176.0pt;border:none;border-bottom:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">Source de
                             financement</span></b></p>
             </th>
         </tr>
         <tr style="height:14.5pt">
             <th width=75 style="width:56.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">Source 1</span></b></p>
             </th>
             <th width=80 style="width:60.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">Source 2</span></b></p>
             </th>
             <th width=80 style="width:60.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><b><span lang=EN-GB style="color:black">Source 3</span></b></p>
             </th>
         </tr>


     </thead>
     <tbody>
     ';

      foreach ($get_depenses as $categories) {
        $output .= '<tr>

        <td width=56 nowrap style="width:42.0pt;border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="color:black"></span></p>
        </td>

        <td width=260 nowrap valign=bottom style="width:195.0pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="color:black">' . $categories->Intitule . '</span></p>
        </td>

        <td width=105 nowrap valign=bottom style="width:79.0pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal align=right style="margin-bottom:0in;text-align:right;line-height:normal"><span lang=EN-GB style="color:black">' . $categories->montant . '</span></p>
        </td>

        <td width=80 nowrap valign=bottom style="width:60.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal align=right style="margin-bottom:0in;text-align:right;line-height:normal"><span lang=EN-GB style="color:black">' . $categories->percentage . '%</span></p>
        </td>

        <td width=75 nowrap valign=bottom style="width:56.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="color:black">&nbsp; ' . $categories->source_1 . '</span></p>
        </td>

        <td width=80 nowrap valign=bottom style="width:60.0pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="color:black">&nbsp; ' . $categories->source_2 . '</span></p>
        </td>

        <td width=80 nowrap valign=bottom style="width:60.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="color:black">&nbsp; ' . $categories->source_3 . '</span></p>
        </td>

        <td width=80 nowrap valign=bottom style="width:60.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
          <a href="#" class="edit_btn" id="' . $categories->id . '" data-toggle="modal" data-target="#editModal" ><ion-icon name="open-outline"></ion-icon> </a>  
          <a href="#" class="delet_btn" id="' . $categories->id . '"  ><ion-icon name="trash-outline"></ion-icon> </a>  
        </td>

       
        
        </tr>';
      }

      $output .= '</tbody></table>';
      echo $output;
    } else {
      echo  '<div class="card shadow rounded-0 ml-2 align-items-center p-3"><ion-icon name="folder-open-outline"></ion-icon><p class="py-2"> PAS DE FICHIERS POUR LE MOMENT</p></div>';
    }
  }




  public function fetchAll_Profile_METHOD(Request $request)
  {

    $id = $request->id;
    $get_data = Project::where('unique_code', $id)->get();
    return response()->json($get_data);
  }

  public function fetchAll_CadreResult_method(Request $request)
  {

    $unique_code = $request->unique_code;
    $year = $request->year;
    $get_cadreResult = DB::table('cadres')->where('unique_code', $unique_code)->where('year', '=', $year)->get();

    $output = '';
    if ($get_cadreResult->count() > 0) {
      $output .= ' <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=1353 style="width:1015.0pt;margin-left:.25pt;border-collapse:collapse" >
      <thead>

    
         <tr style="height:26.4pt">
             <th width=57 nowrap valign=bottom style="width:43.0pt;padding:0in 5.4pt 0in 5.4pt;
height:26.4pt"></th>
             <th width=604 colspan=2 style="width:453.0pt;border:none;border-bottom:solid windowtext 1.0pt;
padding:0in 5.4pt 0in 5.4pt;height:26.4pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=FR style="font-size:10.0pt;font-family:
"Arial",sans-serif">Tableau de Bord de suivi des Indicateurs de Cadre des
                             Résultats/ Cadre logique</span></b></p>
             </th>
             <th width=131 style="width:98.0pt;padding:0in 5.4pt 0in 5.4pt;height:26.4pt"></th>
             <th width=131 style="width:98.0pt;padding:0in 5.4pt 0in 5.4pt;height:26.4pt"></th>
             <th width=87 style="width:65.0pt;padding:0in 5.4pt 0in 5.4pt;height:26.4pt"></th>
             <th width=72 style="width:.75in;padding:0in 5.4pt 0in 5.4pt;height:26.4pt"></th>
             <th width=68 style="width:51.0pt;padding:0in 5.4pt 0in 5.4pt;height:26.4pt"></th>
             <th width=204 nowrap valign=bottom style="width:153.0pt;padding:0in 5.4pt 0in 5.4pt;
height:26.4pt"></th>
         </tr>
         <tr style="height:.2in">
             <th width=57 rowspan=2 style="width:43.0pt;border:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Code de Réf.</span></b></p>
             </th>
             <th width=473 rowspan=2 style="width:355.0pt;border-top:none;border-left:
none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Indicateur</span></b></p>
             </th>
             <th width=131 rowspan=2 style="width:98.0pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Composante</span></b></p>
             </th>
             <th width=131 rowspan=2 style="width:98.0pt;border:solid windowtext 1.0pt;
border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Sous-Composante</span></b></p>
             </th>
             <th width=131 rowspan=2 style="width:98.0pt;border:solid windowtext 1.0pt;
border-left:none;background:#FFF2CC;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Valeur de Référence</span></b></p>
             </th>
             <th width=87 rowspan=2 style="width:65.0pt;border:solid windowtext 1.0pt;
border-left:none;background:#FFF2CC;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Valeur Cible</span></b></p>
             </th>
             <th width=140 colspan=2 style="width:105.0pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
background:#FFF2CC;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Performance</span></b></p>
             </th>
             <th width=204 rowspan=2 style="width:153.0pt;border:solid windowtext 1.0pt;
border-left:none;background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Commentaire</span></b></p>
             </th>
         </tr>

         <tr style="height:14.5pt">
             <th width=72 style="width:.75in;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Réalisé</span></b></p>
             </th>

             <th width=68 style="width:51.0pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">%</span></b></p>
             </th>
            
         </tr>

         </thead>
         <tbody>
         






     ';
      foreach ($get_cadreResult as $cadre) {
        $output .=

          '<tr>
      
      <td width=57 nowrap valign=bottom style="width:43.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
         <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><spanlang=EN-GB style="color:black">&nbsp;' . $cadre->Code_de_réf . '</spanlang=EN-GB></p>
      </td>

      <td width=473 style="width:355.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
         <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><spanlang=FR style="font-size:10.0pt;font-family:"Arial",sans-serif;color:black">' . $cadre->Indicateur . '</spanlang=FR></p>
      </td>

      
      <td width=131 style="width:98.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:"Arial",sans-serif">' . $cadre->Composante . '</span></p>
      </td>

      
      <td width=131 style="width:98.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center; line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:"Arial",sans-serif">' . $cadre->Sous_Composante . '</span></p>
      </td>

      <td width=131 style="width:98.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:"Arial",sans-serif">&nbsp; ' . $cadre->Valeur_de_Référence . '</span></p>
      </td>

      <td width=87 style="width:65.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:"Arial",sans-serif">' . $cadre->Valeur_cible . '</span></p>
      </td>

      <td width=72 style="width:.75in;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:"Arial",sans-serif;color:black">' . $cadre->Réalisé . '</span></p>
      </td>

      <td width=68 style="width:51.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal align=right style="margin-bottom:0in;text-align:right;line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:"Arial",sans-serif">' . $cadre->Percentage . '%</span></b></p>
      </td>


      <td width=204 nowrap valign=bottom style="width:153.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="color:black">&nbsp;' . $cadre->Comentaire . '</span></p>
      </td>
      <td width=204 nowrap valign=bottom style="width:153.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
      <a href="#" class="edit_cadre_btn" id="' . $cadre->id . '" data-toggle="modal" data-target="#edit_cadreModal" ><ion-icon name="open-outline"></ion-icon> </a>  
      <a href="#" class="delet_cadre_btn" id="' . $cadre->id . '"  ><ion-icon name="trash-outline"></ion-icon> </a>        </td>


       
      </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
    } else {
      echo  '<div class="card shadow rounded-0 ml-2 align-items-center p-3"><ion-icon name="folder-open-outline"></ion-icon><p class="py-2"> PAS DE FICHIERS POUR LE MOMENT</p></div>';
    }
  }





  public function fetchAll_CadreResult_method_Two(Request $request)
  {

    $unique_code = $request->unique_code;
    $year = $request->year;
    $get_cadreResult = DB::table('cadres')->where('unique_code', $unique_code)->where('year', '=', $year)->get();

    $output = '';
    if ($get_cadreResult->count() > 0) {
      $output .= ' <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=1353 style="width:1015.0pt;margin-left:.25pt;border-collapse:collapse" id="cardre_table_two">
      <thead>

    
         <tr style="height:26.4pt">
             <th width=57 nowrap valign=bottom style="width:43.0pt;padding:0in 5.4pt 0in 5.4pt;
height:26.4pt"></th>
             <th width=604 colspan=2 style="width:453.0pt;border:none;border-bottom:solid windowtext 1.0pt;
padding:0in 5.4pt 0in 5.4pt;height:26.4pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=FR style="font-size:10.0pt;font-family:
"Arial",sans-serif">Tableau de Bord de suivi des Indicateurs de Cadre des
                             Résultats/ Cadre logique</span></b></p>
             </th>
             <th width=131 style="width:98.0pt;padding:0in 5.4pt 0in 5.4pt;height:26.4pt"></th>
             <th width=131 style="width:98.0pt;padding:0in 5.4pt 0in 5.4pt;height:26.4pt"></th>
             <th width=87 style="width:65.0pt;padding:0in 5.4pt 0in 5.4pt;height:26.4pt"></th>
             <th width=72 style="width:.75in;padding:0in 5.4pt 0in 5.4pt;height:26.4pt"></th>
             <th width=68 style="width:51.0pt;padding:0in 5.4pt 0in 5.4pt;height:26.4pt"></th>
             <th width=204 nowrap valign=bottom style="width:153.0pt;padding:0in 5.4pt 0in 5.4pt;
height:26.4pt"></th>
         </tr>
         <tr style="height:.2in">
             <th width=57 rowspan=2 style="width:43.0pt;border:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Code de Réf.</span></b></p>
             </th>
             <th width=473 rowspan=2 style="width:355.0pt;border-top:none;border-left:
none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Indicateur</span></b></p>
             </th>
             <th width=131 rowspan=2 style="width:98.0pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Composante</span></b></p>
             </th>
             <th width=131 rowspan=2 style="width:98.0pt;border:solid windowtext 1.0pt;
border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Sous-Composante</span></b></p>
             </th>
             <th width=131 rowspan=2 style="width:98.0pt;border:solid windowtext 1.0pt;
border-left:none;background:#FFF2CC;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Valeur de Référence</span></b></p>
             </th>
             <th width=87 rowspan=2 style="width:65.0pt;border:solid windowtext 1.0pt;
border-left:none;background:#FFF2CC;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Valeur Cible</span></b></p>
             </th>
             <th width=140 colspan=2 style="width:105.0pt;border-top:solid windowtext 1.0pt;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
background:#FFF2CC;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Performance</span></b></p>
             </th>
             <th width=204 rowspan=2 style="width:153.0pt;border:solid windowtext 1.0pt;
border-left:none;background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Commentaire</span></b></p>
             </th>
         </tr>

         <tr style="height:14.5pt">
             <th width=72 style="width:.75in;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">Réalisé</span></b></p>
             </th>

             <th width=68 style="width:51.0pt;border-top:none;border-left:none;border-bottom:
solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
                 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:
"Arial",sans-serif;color:black">%</span></b></p>
             </th>
             
         </tr>

         </thead>
         <tbody>
         






     ';
      foreach ($get_cadreResult as $cadre) {
        $output .=

          '<tr>
      
      <td width=57 nowrap valign=bottom style="width:43.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
         <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><spanlang=EN-GB style="color:black">&nbsp;' . $cadre->Code_de_réf . '</spanlang=EN-GB></p>
      </td>

      <td width=473 style="width:355.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
         <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><spanlang=FR style="font-size:10.0pt;font-family:"Arial",sans-serif;color:black">' . $cadre->Indicateur . '</spanlang=FR></p>
      </td>

      
      <td width=131 style="width:98.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:"Arial",sans-serif">' . $cadre->Composante . '</span></p>
      </td>

      
      <td width=131 style="width:98.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center; line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:"Arial",sans-serif">' . $cadre->Sous_Composante . '</span></p>
      </td>

      <td width=131 style="width:98.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:"Arial",sans-serif">&nbsp; ' . $cadre->Valeur_de_Référence . '</span></p>
      </td>

      <td width=87 style="width:65.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:"Arial",sans-serif">' . $cadre->Valeur_cible . '</span></p>
      </td>

      <td width=72 style="width:.75in;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;line-height:normal"><span lang=EN-GB style="font-size:10.0pt;font-family:"Arial",sans-serif;color:black">' . $cadre->Réalisé . '</span></p>
      </td>

      <td width=68 style="width:51.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal align=right style="margin-bottom:0in;text-align:right;line-height:normal"><b><span lang=EN-GB style="font-size:10.0pt;font-family:"Arial",sans-serif">' . $cadre->Percentage . '%</span></b></p>
      </td>


      <td width=204 nowrap valign=bottom style="width:153.0pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:14.5pt">
        <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=EN-GB style="color:black">&nbsp;' . $cadre->Comentaire . '</span></p>
      </td>
      


       
      </tr>';
      }
      $output .= '</tbody></table>';
      echo $output;
    } else {
      echo  '<div class="card shadow rounded-0 ml-2 align-items-center p-3"><ion-icon name="folder-open-outline"></ion-icon><p class="py-2"> PAS DE FICHIERS POUR LE MOMENT</p></div>';
    }
  }








  /* =================== POST FUNCTIONS ===============*/



  public function edit(Request $request)
  {
    $id = $request->id;
    $data = Category::find($id);
    return response()->json($data);
  }

  public function edit_ptba(Request $request)
  {
    $id = $request->id;
    $data_ptba = ptba::find($id);
    return response()->json($data_ptba);
  }


  public function edit_passation_method(Request $request)
  {
    $id = $request->id;
    $data_passation = Passation::find($id);
    return response()->json($data_passation);
  }

  public function edit_cadre_logique(Request $request)
  {
    $id = $request->id;
    $data_passation = Cadre::find($id);
    return response()->json($data_passation);
  }


  public function update_profile_method(Request $request)
  {
    $Pays_edit = $request->input('Pays_edit');
    $Province_edit = $request->input('Province_edit');
    $Intitule_du_project_edit = $request->input('Intitule_du_project_edit');
    $Secteur_activite_edit = $request->input('Secteur_activite_edit');
    $Type_de_projet_edit = $request->input('Type_de_projet_edit');
    $Type_de_projet_edit = $request->input('Type_de_projet_edit');
    $Zone_intervention_edit = $request->input('Zone_intervention_edit');
    $Date_approbation_edit = $request->input('Date_approbation_edit');
    $Date_accord_finance_edit = $request->input('Date_accord_finance_edit');
    $Date_entree_edit = $request->input('Date_entree_edit');
    $Duree_projet_edit = $request->input('Duree_projet_edit');
    $Coute_projet_edit = $request->input('Coute_projet_edit');
    $source_financement_edit = $request->input('source_financement_edit');
    $Numero_du_project_edit = $request->input('Numero_du_project_edit');
    $Coordonnateur_projet_edit = $request->input('Coordonnateur_projet_edit');

    $unique_code = $request->input('unique_code');

    $excuse_update_one = Project::where('unique_code', $unique_code);
    $excuse_array_one = [

      'Pays' => $Pays_edit,
      'Province' => $Province_edit,
      'Intitule_du_project' => $Intitule_du_project_edit,
      'Secteur_activite' => $Secteur_activite_edit,
      'Type_de_projet' => $Type_de_projet_edit,
      'Zone_intervention' => $Zone_intervention_edit,
      'Date_approbation' => $Date_approbation_edit,
      'Date_accord_finance' => $Date_accord_finance_edit,
      'Date_entree' => $Date_entree_edit,
      'Duree_projet' => $Duree_projet_edit,
      'Coute_projet' => $Coute_projet_edit,
      'source_financement' => $source_financement_edit,
      'Numero_du_project' => $Numero_du_project_edit,
      'Coordonnateur_projet' => $Coordonnateur_projet_edit

    ];

    $excuse_update_one->update($excuse_array_one);

    return response()->json([
      'status' => 200,
      'messages' => 'success'
    ]);
  }

  //handel up update records

  public function update_project_records(Request $request)
  {

    $get_recode_id = $request->input('get_recode_id');
    $Intitule_edit = $request->input('Intitule_edit');
    $source_1_edit = $request->input('source_1_edit');
    $source_2_edit = $request->input('source_2_edit');
    $source_3_edit = $request->input('source_3_edit');


    // CALCULATE NEW PERCENTAGE
    $update_budjet_edit =  $request->input('update_budjet_edit');
    $montant_edit =  $request->input('montant_edit');
    $new_percent_one = ($montant_edit / $update_budjet_edit) * 100;
    $new_percent = round($new_percent_one, 1);


    $excuse_update = Category::find($get_recode_id);

    $excuse_array = [
      'Intitule' => $Intitule_edit,
      'montant' => $montant_edit,
      'percentage' => $new_percent,
      'source_1' => $source_1_edit,
      'source_2' => $source_2_edit,
      'source_3' => $source_3_edit
    ];

    $excuse_update->update($excuse_array);
    return response()->json([
      'status' => 200
    ]);
  }


  public function update_project_cadre_records(Request $request)
  {

    $Code_de_réf_edit = $request->input('Code_de_réf_edit');
    $Indicateur_edit = $request->input('Indicateur_edit');
    $Composante_edit = $request->input('Composante_edit');
    $Sous_composante_edit = $request->input('Sous_composante_edit');
    $Valeur_de_Référence_edit = $request->input('Valeur_de_Référence_edit');
    $Valeur_cible_edit = $request->input('Valeur_cible_edit');
    $Réalisé_edit = $request->input('Réalisé_edit');
    $Percentage_edit = round(($Réalisé_edit / $Valeur_cible_edit) * 100, 1);
    $Comentaire_edit = $request->input('Comentaire_edit');

    $id = $request->input('id_edit');



    $make_update = Cadre::where('id', $id);
    $array =  [
      'Code_de_réf' => $Code_de_réf_edit,
      'Indicateur' => $Indicateur_edit,
      'Composante' => $Composante_edit,
      'Sous_Composante' => $Sous_composante_edit,
      'Valeur_de_Référence' => $Valeur_de_Référence_edit,
      'Valeur_cible' => $Valeur_cible_edit,
      'Réalisé' => $Réalisé_edit,
      'Percentage' => $Percentage_edit,
      'Comentaire' => $Comentaire_edit,


    ];

    $res = $make_update->update($array);
    if ($res) {
      # code...
      return response()->json([
        'status' => 200,
        'messages' => 'updated'
      ]);
    }
  }




  public function update_project_passation_records(Request $request)
  {

    $Decription_du_march_edit = $request->input('Decription_du_march_edit');
    $Numero_Reference_du_marché_edit = $request->input('Numero_Reference_du_marché_edit');
    $Type_du_marché_edit = $request->input('Type_du_marché_edit');
    $Méthode_de_sélection_du_Marché_edit = $request->input('Méthode_de_sélection_du_Marché_edit');
    $Type_de_révision_edit = $request->input('Type_de_révision_edit');

    $Montant_estimatif_du_Marché_edit = $request->input('Montant_estimatif_du_Marché_edit');
    $Montant_réel_du_marché_edit = $request->input('Montant_réel_du_marché_edit');

    $Ecart_du_montant_edit = $Montant_estimatif_du_Marché_edit - $Montant_réel_du_marché_edit;

    $Date_de_signature_du_contrat_edit = $request->input('Date_de_signature_du_contrat_edit');
    $get_date_de_signature_du_contrat = Carbon::parse($Date_de_signature_du_contrat_edit)->startOfDay()->format('d');

    $Date_livaison_Production_du_rapport_edit = $request->input('Date_livaison_Production_du_rapport_edit');
    $get_date_livaison_Production_du_rapport = Carbon::parse($Date_livaison_Production_du_rapport_edit)->startOfDay()->format('d');



    $Ecart_de_durée_edit = $get_date_livaison_Production_du_rapport - $get_date_de_signature_du_contrat;
    $Nom_de_entreprise_contractant_edit = $request->input('Nom_de_entreprise_contractant_edit');
    $Note_appréciation_du_marché_edit = $request->input('Note_appréciation_du_marché_edit');
    $Commentaire_edit = $request->input('Commentaire_edit');




    $code = $request->input('unique_code_edit');
    $id = $request->input('id_edit');



    $make_update = Passation::where('id', $id,);
    $array =  [
      'Decription_du_march' => $Decription_du_march_edit,
      'Numero_Reference_du_marché' => $Numero_Reference_du_marché_edit,
      'Type_du_marché' => $Type_du_marché_edit,
      'Méthode_de_sélection_du_Marché' => $Méthode_de_sélection_du_Marché_edit,
      'Type_de_révision' => $Type_de_révision_edit,
      'Montant_estimatif_du_Marché' => $Montant_estimatif_du_Marché_edit,
      'Montant_réel_du_marché' => $Montant_réel_du_marché_edit,
      'Ecart_du_montant' => $Ecart_du_montant_edit,
      'Date_de_signature_du_contrat' => $Date_de_signature_du_contrat_edit,
      'Date_livaison_Production_du_rapport' => $Date_livaison_Production_du_rapport_edit,
      'Ecart_de_durée' => $Ecart_de_durée_edit,
      'Nom_de_entreprise_contractant' => $Nom_de_entreprise_contractant_edit,
      'Note_appréciation_du_marché' => $Note_appréciation_du_marché_edit,
      'Commentaire' => $Commentaire_edit,


    ];

    $make_update->update($array);

    return response()->json([
      'status' => 200,
      'message' => 'okay'
    ]);
  }




  public function update_project_ptba_records(Request $request)
  {

    $Code_de_réf_edit = $request->input('Code_de_réf_edit');
    $Intitulé_de_activité_edit = $request->input('Intitulé_de_activité_edit');
    $Indicateur_de_process_edit = $request->input('Indicateur_de_process_edit');
    $Unité_edit = $request->input('Unité_edit');
    $Composante_edit = $request->input('Composante_edit');
    $Sous_composante_edit = $request->input('Sous_composante_edit');
    $Catégorie_financière_fond_edit = $request->input('Catégorie_financière_fond_edit');
    $Source_de_financement_edit = $request->input('Source_de_financement_edit');
    $Responsable_activité_edit = $request->input('Responsable_activité_edit');

    //calcualte 
    //$Début_activité_edit = $request->input('Début_activité_edit');

    $Début_activité_edit = $request->input('Début_activité_edit');

    $get_debut_activty_day = Carbon::parse($Début_activité_edit)->startOfDay()->format('d');


    $Fin_activité_edit = $request->input('Fin_activité_edit');
    $get_fin_activity_day =  Carbon::parse($Fin_activité_edit)->startOfDay()->format('d');

    $Durée_activité_edit = $get_fin_activity_day - $get_debut_activty_day;

    $Prévu_one_edit = $request->input('Prévu_one_edit');
    $Réalisé_one_edit = $request->input('Réalisé_one_edit');
    $percent_one_edit = round(($Réalisé_one_edit / $Prévu_one_edit) * 100, 1);

    $Prévu_two_edit = $request->input('Prévu_two_edit');
    $Réalisé_two_edit = $request->input('Réalisé_two_edit');
    $percent_two_edit =  round(($Réalisé_two_edit / $Prévu_two_edit) * 100, 1);

    $Ratio_efficience_edit = round(($percent_two_edit / $percent_one_edit), 1);
    $Note_appréciation_edit = $request->input('Note_appréciation_edit');
    $Commentaire_edit = $request->input('Commentaire_edit');



    $id_edit = $request->input('id_edit');



    $make_update = Ptba::where('id', $id_edit);
    $array =  [
      'Code_de_réf' => $Code_de_réf_edit,
      'Intitulé_de_activité' => $Intitulé_de_activité_edit,
      'Indicateur_de_process' => $Indicateur_de_process_edit,
      'Unité' => $Unité_edit,
      'Composante' => $Composante_edit,
      'Sous_composante' => $Sous_composante_edit,
      'Catégorie_financière_Fonds' => $Catégorie_financière_fond_edit,
      'Source_de_financement' => $Source_de_financement_edit,
      'Responsable_activité' => $Responsable_activité_edit,
      'Début_activité' => $Début_activité_edit,
      'Fin_activité' => $Fin_activité_edit,
      'Durée_activité' => $Durée_activité_edit,
      'Prévu_one' => $Prévu_one_edit,
      'Réalisé_one' => $Réalisé_one_edit,
      'percent_one' => $percent_one_edit,
      'Prévu_two' => $Prévu_two_edit,
      'Réalisé_two' => $Réalisé_two_edit,
      'percent_two' => $percent_two_edit,
      'Ratio_efficience' => $Ratio_efficience_edit,
      'Note_appréciation' => $Note_appréciation_edit,
      'Commentaire' => $Commentaire_edit,


    ];

    $make_update->update($array);

    return response()->json([
      'status' => 200,
      'messages' => 'okay'
    ]);
  }


  public function upload_file(Request $request)
  {
    $validated = Validator::make($request->all(), [
      'upload_file' => 'required|mimes:pdf,xls,csv,docx|max:4000'
    ]);

    if ($validated->fails()) {

      return response()->json([
        'status' => 400,
        'messages' => $validated->getMessageBag()
      ]);
    } else {


      $file_name = $request->file('upload_file')->getClientOriginalName();
      $unique_code = $request->input('unique_code');

      $check =
        DB::table('project_files')
        ->where('file_name', '=', $file_name)
        ->where('unique_code', '=', $unique_code)->exists();
      if ($check) {
        # code...
        return response()->json([
          'status' => 401
        ]);
      } else {

        $request->upload_file->move(public_path('storage/images'), $file_name);
        $Data = [
          'file_name' => $file_name,
          'my_file_name' => $request->my_file_name,
          'unique_code' => $request->unique_code,
          'year' => Carbon::now()->format('d/m/Y')
        ];

        Project_file::create($Data);

        # code...
        return response()->json([
          'status' => 200
        ]);
      }
    }
  }


  //handel create project 
  public function create_project_function(Request $request)
  {
    $validated = Validator::make($request->all(), [
      'Pays' => 'required',
      'Province' => 'required',
      'Intitule_du_project' => 'required',
      'Secteur_activite' => 'required',
      'Type_de_projet' => 'required',
      'Zone_intervention' => 'required',
      'Date_approbation' => 'required',
      'Date_accord_finance' => 'required',
      'Date_entree' => 'required',
      'Duree_projet' => 'required',
      'Coute_projet' => 'required',
      'source_financement' => 'required',
      'Numero_du_project' => 'required',
      'Coordonnateur_projet' => 'required',

    ]);

    if ($validated->fails()) {
      return response()->json([
        'status' => 400,
        'messages' => $validated->getMessageBag()
      ]);
    } else {


      //REGISTER PROJECT DETAILES

      $project = new  Project();
      $project->Pays = $request->Pays;
      $project->Province = $request->Province;
      $project->Intitule_du_project = $request->Intitule_du_project;
      $project->Secteur_activite = $request->Secteur_activite;
      $project->Type_de_projet = $request->Type_de_projet;
      $project->Zone_intervention = $request->Zone_intervention;
      $project->Date_approbation = $request->Date_approbation;
      $project->Date_accord_finance = $request->Date_accord_finance;
      $project->Date_entree = $request->Date_entree;
      $project->Duree_projet = $request->Duree_projet;
      $project->Coute_projet = $request->Coute_projet;
      $project->source_financement = $request->source_financement;
      $project->Numero_du_project = $request->Numero_du_project;
      $project->Coordonnateur_projet = $request->Coordonnateur_projet;
      $project->unique_code = $request->unique_code;
      $project->code_project = $request->code_project;
      $project->date_debut = Carbon::now()->format('d/m/Y');
      $project->date_fin = Carbon::createFromDate()->addYear($request->Duree_projet)->format('d/m/Y');
      $project->email = $request->email;

      $project->save();

      return response()->json([
        'status' => 200,
        'messages' => 'project created'
      ]);
    }
  }





  // ========= DELETE RECORD FROM DATABASE =========== //

  public function delete_record(Request $request)
  {
    $id = $request->id;

    $delete = Category::find($id);
    if ($delete) {
      Category::destroy($id);
    }
  }
  // ========= DELETE RECORD FROM DATABASE =========== //

  public function delete_cadre_record(Request $request)
  {
    $id = $request->id;

    $delete = Cadre::find($id);
    if ($delete) {
      Cadre::destroy($id);
    }
  }
  // ========= DELETE RECORD PTBA FROM DATABASE =========== //

  public function delete_ptba_record(Request $request)
  {
    $id = $request->id;

    $delete = ptba::find($id);
    if ($delete) {
      ptba::destroy($id);
    }
  }
  // ========= DELETE RECORD PASSATION MARCH FROM DATABASE =========== //

  public function delete_passation_record(Request $request)
  {
    $id = $request->id;
    $delete = Passation::find($id);
    if ($delete) {
      Passation::destroy($id);
      return response()->json([
        'status' => 200
      ]);
    }
  }



  // ========= DELETE FILE RECORD FROM DATABASE =========== //
  public function delete_file_record(Request $request)
  {


    $id = $request->id;
    $delete = Project_file::find($id);
    if ($delete) {
      Project_file::destroy($id);
      Storage::delete('public/images/' . $delete->file_name);
    }
  }

  // ========= DELETE FILE RECORD FROM DATABASE =========== //
  public function delete_file_rapport_record(Request $request)
  {
    $id = $request->id;
    $delete = Rapport::find($id);
    if ($delete) {
      Rapport::destroy($id);
      Storage::delete('public/rapport/' . $delete->file_name);
    }
  }
  // ========= DELETE FILE RECORD FROM DATABASE =========== //
  public function delete_file_photo_record(Request $request)
  {
    $id = $request->id;
    $delete = Photo::find($id);
    if ($delete) {
      Photo::destroy($id);
      Storage::delete('public/photo/' . $delete->file_name);
    }
  }
  // ========= DELETE FILE RECORD FROM DATABASE =========== //
  public function delete_file_video_record(Request $request)
  {
    $id = $request->id;
    $delete = Video::find($id);
    if ($delete) {
      Video::destroy($id);
      Storage::delete('public/video/' . $delete->file_name);
    }
  }





  public function add_passation_marche(Request $request)

  {

    $get_year = $request->all();
    $validate_one = Validator::make($get_year, [
      'my_year_picker' => 'required',
    ]);

    if ($validate_one->fails()) {
      return response()->json([
        'status' => 401,
        'messages' => $validate_one->getMessageBag()
      ]);
    } else {
      $rules = [];

      foreach ($request->input('Decription_du_march') as $key => $value) {

        $rules["Decription_du_march.{$key}"] = 'required';
        $rules["Numero_Reference_du_marché.{$key}"] = 'required';
        $rules["Type_du_marché.{$key}"] = 'required';
        $rules["Méthode_de_sélection_du_Marché.{$key}"] = 'required';
        $rules["Type_de_révision.{$key}"] = 'required';
        $rules["Montant_estimatif_du_Marché.{$key}"] = 'required';
        $rules["Montant_réel_du_marché.{$key}"] = 'required';
        $rules["Ecart_du_montant.{$key}"] = 'required';
        $rules["Date_de_signature_du_contrat.{$key}"] = 'required';
        $rules["Date_livaison_Production_du_rapport.{$key}"] = 'required';
        $rules["Ecart_de_durée.{$key}"] = 'required';
        $rules["Nom_de_entreprise_contractant.{$key}"] = 'required';
        $rules["Note_appréciation_du_marché.{$key}"] = 'required';
        $rules["Commentaire.{$key}"] = 'required';
      }
      $validate = Validator::make($request->all(), $rules);

      if ($validate->fails()) {
        return response()->json([
          'status' => 400,
          'messages' => $validate->getMessageBag()
        ]);
      } else {

        foreach ($request->input('Decription_du_march') as $key => $value) {

          $insert_passation_marche = new Passation;
          $insert_passation_marche->Decription_du_march = $request->get('Decription_du_march')[$key];
          $insert_passation_marche->Numero_Reference_du_marché = $request->get('Numero_Reference_du_marché')[$key];
          $insert_passation_marche->Type_du_marché = $request->get('Type_du_marché')[$key];
          $insert_passation_marche->Méthode_de_sélection_du_Marché = $request->get('Méthode_de_sélection_du_Marché')[$key];
          $insert_passation_marche->Type_de_révision = $request->get('Type_de_révision')[$key];
          $insert_passation_marche->Montant_estimatif_du_Marché = $request->get('Montant_estimatif_du_Marché')[$key];
          $insert_passation_marche->Montant_réel_du_marché = $request->get('Montant_réel_du_marché')[$key];
          $insert_passation_marche->Ecart_du_montant = $request->get('Ecart_du_montant')[$key];
          $insert_passation_marche->Date_de_signature_du_contrat = $request->get('Date_de_signature_du_contrat')[$key];
          $insert_passation_marche->Date_livaison_Production_du_rapport = $request->get('Date_livaison_Production_du_rapport')[$key];
          $insert_passation_marche->Ecart_de_durée = $request->get('Ecart_de_durée')[$key];
          $insert_passation_marche->Nom_de_entreprise_contractant = $request->get('Nom_de_entreprise_contractant')[$key];
          $insert_passation_marche->Note_appréciation_du_marché = $request->get('Note_appréciation_du_marché')[$key];
          $insert_passation_marche->Commentaire = $request->get('Commentaire')[$key];
          $insert_passation_marche->unique_code = $request->get('unique_code')[$key];
          $insert_passation_marche->year =  $request->get('my_year_picker');

          $insert_passation_marche->save();
        }

        return response()->json([
          'status' => 200,
          'messages' => 'success'
        ]);
      }
    }
  }








  public function add_resultats_logique(Request $request)
  {

    $get_year = $request->all();
    $validate_one = Validator::make($get_year, [
      'my_year_picker' => 'required',
    ]);

    if ($validate_one->fails()) {
      return response()->json([
        'status' => 401,
        'messages' => $validate_one->getMessageBag()
      ]);
    } else {
      $rules = [];

      foreach ($request->input('Code_de_réf') as $key => $value) {

        $rules["Code_de_réf.{$key}"] = 'required';
        $rules["Indicateur.{$key}"] = 'required';
        $rules["Composante.{$key}"] = 'required';
        $rules["Sous_Composante.{$key}"] = 'required';
        $rules["Valeur_de_Référence.{$key}"] = 'required';
        $rules["Valeur_cible.{$key}"] = 'required';
        $rules["Réalisé.{$key}"] = 'required';
        $rules["Percentage.{$key}"] = 'required';
        $rules["Comentaire.{$key}"] = 'required';
      }
      $validate = Validator::make($request->all(), $rules);

      if ($validate->fails()) {

        return response()->json([
          'status' => 400,
          'messages' => $validate->getMessageBag()
        ]);
      } else {

        foreach ($request->input('Code_de_réf') as $key => $value) {
          $data_insert = new Cadre;
          $data_insert->Code_de_réf = $request->get('Code_de_réf')[$key];
          $data_insert->Indicateur = $request->get('Indicateur')[$key];
          $data_insert->Composante = $request->get('Composante')[$key];
          $data_insert->Sous_Composante = $request->get('Sous_Composante')[$key];
          $data_insert->Valeur_de_Référence = $request->get('Valeur_de_Référence')[$key];
          $data_insert->Valeur_cible = $request->get('Valeur_cible')[$key];
          $data_insert->Réalisé = $request->get('Réalisé')[$key];
          $data_insert->Percentage = $request->get('Percentage')[$key];
          $data_insert->Comentaire = $request->get('Comentaire')[$key];
          $data_insert->unique_code = $request->get('unique_code')[$key];
          $data_insert->year =  $request->get('my_year_picker');
          $data_insert->save();
        }




        return response()->json([
          'status' => 200,
          'messages' => 'okays'
        ]);
      }
    }
  }



  public function add_rapport(Request $request)
  {
    $validated = Validator::make($request->all(), [
      'upload_file' => 'required|mimes:pdf,xls,csv,docx|max:4000',
      'my_file_name' => 'required'
    ]);

    if ($validated->fails()) {

      return response()->json([
        'status' => 400,
        'messages' => $validated->getMessageBag()
      ]);
    } else {

      $file_name = $request->file('upload_file')->getClientOriginalName();

      $check = DB::table('rapports')->where('file_name', $file_name)->exists();
      if ($check) {
        # code...
        return response()->json([
          'status' => 401
        ]);
      } else {

        $request->upload_file->move(public_path('storage/rapport'), $file_name);
        $Data = [
          'file_name' => $file_name,
          'my_file_name' => $request->my_file_name,
          'unique_code' => $request->unique_code,
          'year' => Carbon::now()->format('d/m/Y')
        ];

        Rapport::create($Data);

        # code...
        return response()->json([
          'status' => 200
        ]);
      }
    }
  }


  public function add_video_photo_method(Request $request)
  {
    $file_type = $request->input('file_type');

    if ($file_type == "Photo") {
      //================ PHOTO ====================
      $validate_image = Validator::make($request->all(), [
        'upload_file' => 'required|image|mimes:jpg,png,jpeg|max:10000'
      ]);

      if ($validate_image->fails()) {
        return response()->json([
          'status' => 400
        ]);
      } else {
        // CHECK IF THE PHOTO ALREADY EXIST
        $file_name = $request->file('upload_file')->getClientOriginalName();

        $check = DB::table('photos')->where('file_name', $file_name)->exists();
        if ($check) {
          # code...
          return response()->json([
            'status' => 401
          ]);
        } else {

          $request->upload_file->move(public_path('storage/photo'), $file_name);
          $Data = [
            'file_name' => $file_name,
            'my_file_name' => $request->my_file_name,
            'unique_code' => $request->unique_code,
            'year' => Carbon::now()->format('d/m/Y')
          ];

          Photo::create($Data);

          # code...
          return response()->json([
            'status' => 200
          ]);
        }
      }
    } else {

      //================ VIDEO ====================
      $validate_video = Validator::make($request->all(), [
        'my_file_name' => 'required',
        'upload_file' => 'required|mimes:mp4,mov,ogg'
      ]);

      if ($validate_video->fails()) {
        return response()->json([
          'status' => 402
        ]);
      } else {
        // CHECK IF THE PHOTO ALREADY EXIST
        $file_name = $request->file('upload_file')->getClientOriginalName();

        $check = DB::table('videos')->where('file_name', $file_name)->exists();
        if ($check) {
          # code...
          return response()->json([
            'status' => 403
          ]);
        } else {

          $request->upload_file->move(public_path('storage/video'), $file_name);
          $Data = [
            'file_name' => $file_name,
            'my_file_name' => $request->my_file_name,
            'unique_code' => $request->unique_code,
            'year' => Carbon::now()->format('d/m/Y')
          ];

          Video::create($Data);

          # code...
          return response()->json([
            'status' => 203
          ]);
        }
      }
    }
  }


  public function fetchAll_PTBA_ADMIN_ONE(Request $request)
  {
    $unique_code = $request->unique_code;
    $year = $request->year;

    $get_ptba = DB::table('ptbas')->where('unique_code', '=', $unique_code)->where('year', '=', $year)->get();
    $output = '';
    if ($get_ptba->count() > 0) {
      $activities = $get_ptba->count();
      $sum_percentages_realisation_Physique = Ptba::where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');
      $moyen_realisation_physique = $sum_percentages_realisation_Physique / $activities;

      $sum_percentages_realisation_Finance = Ptba::where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');
      $moyen_realisation_finance = $sum_percentages_realisation_Finance / $activities;
      $output .= '
      <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 style="border-collapse:collapse;border:none" id="ptba_result_situation_global" class="table table-striped table-bordered">
      <thead>
       
          <tr style="height:23.1pt">
       
              <td width=450 valign=top style="width:337.8pt;border:solid windowtext 1.0pt;
  background:#E2EFD9;padding:0in 5.4pt 0in 5.4pt;height:23.1pt">
                  <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span lang=FR>Réalisation</span></b></p>
              </td>
              <td width=145 valign=top style="width:108.85pt;border:solid windowtext 1.0pt;
  border-left:none;background:#E2EFD9;padding:0in 5.4pt 0in 5.4pt;height:23.1pt">
                  <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span lang=FR style="color:black">%</span></b></p>
              </td>
          </tr>
      </thead>
  

      <tr style="height:23.1pt">
          <td width=450 valign=top style="width:337.8pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:23.1pt">
              <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=FR>Physique </span></p>
          </td>
          <td width=145 valign=top style="width:108.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:23.1pt">
              <p class=MsoNormal style="margin-bottom:0in;line-height:normal" id="percent_one"><span lang=FR>&nbsp;</span> ' . $moyen_realisation_physique . '</p>
          </td>
      </tr>
      <tr style="height:23.1pt">
          <td width=450 valign=top style="width:337.8pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:23.1pt">
              <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=FR>Financière </span></p>
          </td>
          <td width=145 valign=top style="width:108.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:23.1pt">
              <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=FR>&nbsp;</span> ' . $moyen_realisation_finance . '</p>
          </td>
      </tr>
  </table>
      
      ';
    } else {
      $output .= '
      <tr style="height:23.1pt">
     
      <td width=145 valign=top style="width:108.85pt;border-top:none;border-left:
none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
padding:0in 5.4pt 0in 5.4pt;height:23.1pt">
          <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span lang=FR>&nbsp;</span> Pas de result pour le moment</p>
      </td>
  </tr>
      ';
    }



    echo $output;
  }



  public function fetchAll_PTBA_COMPOSANTE(Request $request)
  {

    $unique_code = $request->unique_code;
    $year = $request->year;

    $get_ptba = DB::table('ptbas')->where('unique_code', '=', $unique_code)->where('year', '=', $year)->get();
    $output = '';
    if ($get_ptba->count() > 0) {

      // /****------------  START COMPOSANTE ONE ----------------- */

      $composante_1 = 'Composant_1';
      $count_compasannte_1 = Ptba::where('Composante', '=', $composante_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();

      try {

        $get_sum_percentage_composante_1_physique = Ptba::where('Composante', '=', $composante_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');
        if (isset($get_sum_percentage_composante_1_physique)) {
          $calculate_total_sum_percentagecomposante_1_physique = $get_sum_percentage_composante_1_physique / $count_compasannte_1;
        }




        $get_sum_percentage_composante_1_finance = Ptba::where('Composante', '=', $composante_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');
        $calculate_total_sum_percentagecomposante_1_finance = ($get_sum_percentage_composante_1_finance) / ($count_compasannte_1);
      } catch (DivisionByZeroError $th) {
        //throw $th;

      }

      // /****------------  END COMPOSANTE ONE ----------------- */




      // /****------------  START COMPOSANTE TWO ----------------- */

      $composante_2 = 'Composant_2';
      $count_compasannte_2 = Ptba::where('Composante', '=', $composante_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();

      try {
        //code...
        $get_sum_percentage_composante_2_physique = Ptba::where('Composante', '=', $composante_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');
        if ($get_sum_percentage_composante_2_physique) {
          $calculate_total_sum_percentagecomposante_2_physique = $get_sum_percentage_composante_2_physique / $count_compasannte_2;
        }


        $get_sum_percentage_composante_2_finance = Ptba::where('Composante', '=', $composante_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');
        if ($get_sum_percentage_composante_2_finance) {
          $calculate_total_sum_percentagecomposante_2_finance =  $get_sum_percentage_composante_2_finance / $count_compasannte_2;
        }
      } catch (DivisionByZeroError $th) {
        //throw $th;
      }


      // /****------------  END COMPOSANTE TWO ----------------- */



      // /****------------  START COMPOSANTE THREE ----------------- */


      $composante_3 = 'Composant_3';
      $count_compasannte_3 = Ptba::where('Composante', '=', $composante_3)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();

      try {
        //code...
        $get_sum_percentage_composante_3_physique = Ptba::where('Composante', '=', $composante_3)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');
        if ($get_sum_percentage_composante_3_physique) {
          $calculate_total_sum_percentagecomposante_3_physique = $get_sum_percentage_composante_3_physique / $count_compasannte_3;
        }


        $get_sum_percentage_composante_3_finance = Ptba::where('Composante', '=', $composante_3)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');
        if ($get_sum_percentage_composante_3_finance) {
          $calculate_total_sum_percentagecomposante_3_finance = $get_sum_percentage_composante_3_finance / $count_compasannte_3;
        }
      } catch (DivisionByZeroError $th) {
        //throw $th;
      }


      // /****------------  END COMPOSANTE TWO ----------------- */



      $composante_4 = 'Composant_4';
      $count_compasannte_4 = Ptba::where('Composante', '=', $composante_4)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();

      try {
        //code...
        $get_sum_percentage_composante_4_physique = Ptba::where('Composante', '=', $composante_4)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');

        if (isset($get_sum_percentage_composante_4_physique)) {
          $calculate_total_sum_percentagecomposante_4_physique = $get_sum_percentage_composante_4_physique / $count_compasannte_4;
        }


        $get_sum_percentage_composante_4_finance = Ptba::where('Composante', '=', $composante_4)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');
        if ($get_sum_percentage_composante_4_finance) {
          $calculate_total_sum_percentagecomposante_4_finance = $get_sum_percentage_composante_4_finance / $count_compasannte_4;
        }
      } catch (\Throwable $th) {
      }



      $output .= '
       <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=590
 style="width:442.15pt;border-collapse:collapse;border:none" id="table_passasion_3" class="table table-striped table-bordered">
 
 <thead>
 <tr style="height:12.8pt">
  <td width=372 style="width:278.85pt;border:solid windowtext 1.0pt;background:
  #E2EFD9;padding:0in 5.4pt 0in 5.4pt;height:12.8pt">
  <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span lang=FR>Composante</span></b></p>
  </td>
  <td width=143 style="width:107.55pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFD9;padding:0in 5.4pt 0in 5.4pt;height:12.8pt">
  <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span lang=FR style="color:black">Réalisation</span></b></p>
  </td>
  <td width=74 style="width:55.75pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFD9;padding:0in 5.4pt 0in 5.4pt;height:12.8pt">
  <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span lang=FR style="color:black">%</span></b></p>
  </td>
 </tr>
 </thead>

 <tr style="height:12.8pt">
 
  <td width=372 rowspan=2 style="width:278.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.8pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Composant 1</span></p>
  </td>
  <td width=143 valign=top style="width:107.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.8pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Physique </span></p>
  </td>
  <td width=74 valign=top style="width:55.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.8pt">
  
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>&nbsp;</span>' . @($calculate_total_sum_percentagecomposante_1_physique) . '</p>
  </td>
 </tr>
 <tr style="height:13.25pt">
  <td width=143 valign=top style="width:107.55pt;border-top: none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.25pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Financière </span></p>
  </td>
  <td width=74 valign=top style="width:55.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.25pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>&nbsp;</span>' . @($calculate_total_sum_percentagecomposante_1_finance) . '</p>
  </td>
 </tr>
 <tr style="height:12.3pt">
  <td width=372 rowspan=2 style="width:278.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.3pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Composant 2</span></p>
  </td>
  <td width=143 valign=top style="width:107.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.3pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Physique </span></p>
  </td>
  <td width=74 valign=top style="width:55.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.3pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b> ' . @($calculate_total_sum_percentagecomposante_2_physique) . '</p>
  </td>
 </tr>
 <tr style="height:13.25pt">
  <td width=143 valign=top style="width:107.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.25pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Financière </span></p>
  </td>
  <td width=74 valign=top style="width:55.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.25pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b>' . @($calculate_total_sum_percentagecomposante_2_finance) . '</p>
  </td>
 </tr>
 <tr style="height:12.8pt">
  <td width=372 rowspan=2 style="width:278.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.8pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Composant 3</span></p>
  </td>
  <td width=143 valign=top style="width:107.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.8pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Physique </span></p>
  </td>
  <td width=74 valign=top style="width:55.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.8pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b>' . @($calculate_total_sum_percentagecomposante_3_physique) . '</p>
  </td>
 </tr>
 <tr style="height:13.25pt">
  <td width=143 valign=top style="width:107.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.25pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Financière </span></p>
  </td>
  <td width=74 valign=top style="width:55.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.25pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b>' . @($calculate_total_sum_percentagecomposante_3_finance) . '</p>
  </td>
 </tr>
 <tr style="height:12.8pt">
  <td width=372 rowspan=2 style="width:278.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.8pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Composant 4</span></p>
  </td>
  <td width=143 valign=top style="width:107.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.8pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Physique </span></p>
  </td>
  <td width=74 valign=top style="width:55.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.8pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b>' . @($calculate_total_sum_percentagecomposante_4_physique) . '</p>
  </td>
 </tr>
 <tr style="height:13.25pt">
  <td width=143 valign=top style="width:107.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.25pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Financière </span></p>   
  </td>
  <td width=74 valign=top style="width:55.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.25pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b>' . @($calculate_total_sum_percentagecomposante_4_finance) . ' </p>
  </td>
 </tr>
</table>';
    }
    echo $output;
  }








  public function fetchAll_PTBA_SOUS_COMPOSANTE(Request $request)
  {

    $unique_code = $request->unique_code;
    $year = $request->year;

    $get_ptba = DB::table('ptbas')->where('unique_code', '=', $unique_code)->where('year', '=', $year)->get();
    $output = '';
    if ($get_ptba->count() > 0) {


      // ============= SOUS COMPOSANTE 1.1 ================
      $sous_composante_1_1 = 'Sous-Composante_1_1';
      $count_sous_compasannte_1_1 = Ptba::where('Sous_Composante', '=', $sous_composante_1_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();
      try {
        //code...
        $get_sum_percentage_sous_composante_1_1_physique = Ptba::where('Sous_Composante', '=', $sous_composante_1_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');
        if ($get_sum_percentage_sous_composante_1_1_physique) {
          $calculate_total_sum_percentage_sous_composante_1_1_physique = $get_sum_percentage_sous_composante_1_1_physique / $count_sous_compasannte_1_1;
        }

        $get_sum_percentage_sous_composante_1_1_finance = Ptba::where('Sous_Composante', '=', $sous_composante_1_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');

        if ($get_sum_percentage_sous_composante_1_1_finance) {
          $calculate_total_sum_percentage_sous_composante_1_1_finance = $get_sum_percentage_sous_composante_1_1_finance / $count_sous_compasannte_1_1;
        }
      } catch (DivisionByZeroError $th) {
        //throw $th;
      }



      // ============= SOUS COMPOSANTE 1.2 ================

      $sous_composante_1_2 = 'Sous-Composante_1_2';
      $count_sous_compasannte_1_2 = Ptba::where('Sous_Composante', '=', $sous_composante_1_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();
      try {
        //code...
        $get_sum_percentage_sous_composante_1_2_physique = Ptba::where('Sous_Composante', '=', $sous_composante_1_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');
        if ($get_sum_percentage_sous_composante_1_2_physique) {
          $calculate_total_sum_percentage_sous_composante_1_2_physique = $get_sum_percentage_sous_composante_1_2_physique / $count_sous_compasannte_1_2;
        }

        $get_sum_percentage_sous_composante_1_2_finance = Ptba::where('Sous_Composante', '=', $sous_composante_1_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');


        if ($get_sum_percentage_sous_composante_1_2_finance) {
          $calculate_total_sum_percentage_sous_composante_1_2_finance = $get_sum_percentage_sous_composante_1_2_finance / $count_sous_compasannte_1_2;
        }
      } catch (DivisionByZeroError $th) {
        //throw $th;
      }


      // ============= SOUS COMPOSANTE 2.1 ================

      $sous_composante_2_1 = 'Sous-Composante_2_1';
      $count_sous_compasannte_2_1 = Ptba::where('Sous_Composante', '=', $sous_composante_2_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();
      try {
        //code...

        $get_sum_percentage_sous_composante_2_1_physique = Ptba::where('Sous_Composante', '=', $sous_composante_2_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');
        if ($get_sum_percentage_sous_composante_2_1_physique) {
          $calculate_total_sum_percentage_sous_composante_2_1_physique = $get_sum_percentage_sous_composante_2_1_physique / $count_sous_compasannte_2_1;
        }

        $get_sum_percentage_sous_composante_2_1_finance = Ptba::where('Sous_Composante', '=', $sous_composante_2_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');

        if ($get_sum_percentage_sous_composante_2_1_finance) {
          $calculate_total_sum_percentage_sous_composante_2_1_finance = $get_sum_percentage_sous_composante_2_1_finance / $count_sous_compasannte_2_1;
        }
      } catch (DivisionByZeroError $th) {
        //throw $th;
      }
      // ============= SOUS COMPOSANTE 2.2 ================

      $sous_composante_2_2 = 'Sous-Composante_2_2';
      $count_sous_compasannte_2_2 = Ptba::where('Sous_Composante', '=', $sous_composante_2_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();
      try {
        //code...
        $get_sum_percentage_sous_composante_2_2_physique = Ptba::where('Sous_Composante', '=', $sous_composante_2_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');
        if ($get_sum_percentage_sous_composante_2_2_physique) {
          $calculate_total_sum_percentage_sous_composante_2_2_physique  =  $get_sum_percentage_sous_composante_2_2_physique / $count_sous_compasannte_2_2;
        }
        $get_sum_percentage_sous_composante_2_2_finance = Ptba::where('Sous_Composante', '=', $sous_composante_2_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');

        if ($get_sum_percentage_sous_composante_2_2_finance) {
          $calculate_total_sum_percentage_sous_composante_2_2_finance = $get_sum_percentage_sous_composante_2_2_finance / $count_sous_compasannte_2_2;
        }
      } catch (DivisionByZeroError $th) {
        //throw $th;   
      }


      // ============= SOUS COMPOSANTE 3.1 ================

      $sous_composante_3_1 = 'Sous-Composante_3_1';
      $count_sous_compasannte_3_1 = Ptba::where('Sous_Composante', '=', $sous_composante_3_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();
      try {
        //code...
        $get_sum_percentage_sous_composante_3_1_physique = Ptba::where('Sous_Composante', '=', $sous_composante_3_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');
        if ($get_sum_percentage_sous_composante_3_1_physique) {
          $calculate_total_sum_percentage_sous_composante_3_1_physique  =  $get_sum_percentage_sous_composante_3_1_physique / $count_sous_compasannte_3_1;
        }
        $get_sum_percentage_sous_composante_3_1_finance = Ptba::where('Sous_Composante', '=', $sous_composante_3_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');

        if ($get_sum_percentage_sous_composante_3_1_finance) {
          $calculate_total_sum_percentage_sous_composante_3_1_finance = $get_sum_percentage_sous_composante_3_1_finance / $count_sous_compasannte_3_1;
        }
      } catch (DivisionByZeroError $th) {
        //throw $th;   
      }

      // ============= SOUS COMPOSANTE 3.2 ================

      $sous_composante_3_2 = 'Sous-Composante_3_2';
      $count_sous_compasannte_3_2 = Ptba::where('Sous_Composante', '=', $sous_composante_3_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();
      try {
        //code...
        $get_sum_percentage_sous_composante_3_2_physique = Ptba::where('Sous_Composante', '=', $sous_composante_3_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');
        if ($get_sum_percentage_sous_composante_3_2_physique) {
          $calculate_total_sum_percentage_sous_composante_3_2_physique  =  $get_sum_percentage_sous_composante_3_2_physique / $count_sous_compasannte_3_2;
        }
        $get_sum_percentage_sous_composante_3_2_finance = Ptba::where('Sous_Composante', '=', $sous_composante_3_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');

        if ($get_sum_percentage_sous_composante_3_2_finance) {
          $calculate_total_sum_percentage_sous_composante_3_2_finance = $get_sum_percentage_sous_composante_3_2_finance / $count_sous_compasannte_3_2;
        }
      } catch (DivisionByZeroError $th) {
        //throw $th;   
      }
      // ============= SOUS COMPOSANTE 4.1 ================

      $sous_composante_4_1 = 'Sous-Composante_4_1';
      $count_sous_compasannte_4_1 = Ptba::where('Sous_Composante', '=', $sous_composante_4_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();
      try {
        //code...
        $get_sum_percentage_sous_composante_4_1_physique = Ptba::where('Sous_Composante', '=', $sous_composante_4_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');
        if ($get_sum_percentage_sous_composante_4_1_physique) {
          $calculate_total_sum_percentage_sous_composante_4_1_physique  =  $get_sum_percentage_sous_composante_4_1_physique / $count_sous_compasannte_4_1;
        }
        $get_sum_percentage_sous_composante_4_1_finance = Ptba::where('Sous_Composante', '=', $sous_composante_4_1)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');

        if ($get_sum_percentage_sous_composante_4_1_finance) {
          $calculate_total_sum_percentage_sous_composante_4_1_finance = $get_sum_percentage_sous_composante_4_1_finance / $count_sous_compasannte_4_1;
        }
      } catch (DivisionByZeroError $th) {
        //throw $th;   
      }
      // ============= SOUS COMPOSANTE 4.2 ================

      $sous_composante_4_2 = 'Sous-Composante_4_2';
      $count_sous_compasannte_4_2 = Ptba::where('Sous_Composante', '=', $sous_composante_4_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();
      try {
        //code...
        $get_sum_percentage_sous_composante_4_2_physique = Ptba::where('Sous_Composante', '=', $sous_composante_4_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_one');
        if ($get_sum_percentage_sous_composante_4_2_physique) {
          $calculate_total_sum_percentage_sous_composante_4_2_physique  =  $get_sum_percentage_sous_composante_4_2_physique / $count_sous_compasannte_4_2;
        }
        $get_sum_percentage_sous_composante_4_2_finance = Ptba::where('Sous_Composante', '=', $sous_composante_4_2)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('percent_two');

        if ($get_sum_percentage_sous_composante_4_2_finance) {
          $calculate_total_sum_percentage_sous_composante_4_2_finance = $get_sum_percentage_sous_composante_4_2_finance / $count_sous_compasannte_4_2;
        }
      } catch (DivisionByZeroError $th) {
        //throw $th;   
      }





      $output .= '
      
<table  border=1 cellspacing=0 cellpadding=0
 style="border-collapse:collapse;border:none" >
 <thead>
 <tr style="height:12.6pt">
  <td width=374 style="width:280.75pt;border:solid windowtext 1.0pt;background:
  #E2EFD9;padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span lang=FR>Sous-Composante</span></b></p>
  </td>
  <td width=144 style="width:108.3pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFD9;padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span lang=FR style="color:black">Réalisation</span></b></p>
  </td>
  <td width=75 style="width:56.15pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFD9;padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span lang=FR style="color:black">%</span></b></p>
  </td>
  
 </tr>

 

 <tr style="height:12.6pt">
 
  <td width=374 rowspan=2 style="width:280.75pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Sous-Composante 1.1</span></p>
  </td>
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Physique </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>&nbsp;</span>' . @$calculate_total_sum_percentage_sous_composante_1_1_physique . '</p>
  </td>
 </tr>
 <tr style="height:13.05pt">
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Financière </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>&nbsp;</span> ' . @$calculate_total_sum_percentage_sous_composante_1_1_finance . '</p>
  </td>
 </tr>
 <tr style="height:12.1pt">
  <td width=374 rowspan=2 style="width:280.75pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.1pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Sous-Composante 1.2</span></p>
  </td>
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.1pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Physique </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.1pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b>' . @$calculate_total_sum_percentage_sous_composante_1_2_physique . ' </p>
  </td>
 </tr>
 <tr style="height:13.05pt">
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Financière </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b>' . @$calculate_total_sum_percentage_sous_composante_1_2_finance . '</p>
  </td>
 </tr>
 <tr style="height:12.6pt">
  <td width=374 rowspan=2 style="width:280.75pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Sous-Composante 2.1</span></p>
  </td>
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Physique </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b> ' . @$calculate_total_sum_percentage_sous_composante_2_1_physique . '</p>
  </td>
 </tr>

 <tr style="height:13.05pt">
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Financière </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b> ' . @$calculate_total_sum_percentage_sous_composante_2_1_finance . '</p>
  </td>
 </tr>
 <tr style="height:12.6pt">
  <td width=374 rowspan=2 style="width:280.75pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Sous-Composante 2.2</span></p>
  </td>
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Physique </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b> ' . @$calculate_total_sum_percentage_sous_composante_2_2_physique . '</p>
  </td>
 </tr>
 <tr style="height:13.05pt">
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Financière </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b> ' . @$calculate_total_sum_percentage_sous_composante_2_2_finance . '</p>
  </td>
 </tr>
 <tr style="height:12.6pt">
  <td width=374 rowspan=2 style="width:280.75pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Sous-Composante 3.1</span></p>
  </td>
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Physique </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b> ' . @$calculate_total_sum_percentage_sous_composante_3_1_physique . '</p>
  </td>
 </tr>
 <tr style="height:12.6pt">
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Financière </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b> ' . @$calculate_total_sum_percentage_sous_composante_3_1_finance . '</p>
  </td>
 </tr>
 <tr style="height:12.6pt">
  <td width=374 rowspan=2 style="width:280.75pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Sous-Composante 3.2</span></p>
  </td>
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Physique </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b> ' . @$calculate_total_sum_percentage_sous_composante_3_2_physique . '</p>
  </td>
 </tr>
 <tr style="height:13.05pt">
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Financière </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b>' . @$calculate_total_sum_percentage_sous_composante_3_2_finance . '</p>
  </td>
 </tr>
 <tr style="height:12.6pt">
  <td width=374 rowspan=2 style="width:280.75pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Sous-Composante 4.1</span></p>
  </td>
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Physique </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b>' . @$calculate_total_sum_percentage_sous_composante_4_1_physique . '</p>
  </td>
 </tr>
 <tr style="height:13.05pt">
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Financière </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b>' . @$calculate_total_sum_percentage_sous_composante_4_1_finance . '</p>
  </td>
 </tr>
 <tr style="height:12.6pt">
  <td width=374 rowspan=2 style="width:280.75pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Sous-Composante 4.2</span></p>
  </td>
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Physique </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.6pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b> ' . @$calculate_total_sum_percentage_sous_composante_4_2_physique . '</p>
  </td>
 </tr>
 <tr style="height:13.05pt">
  <td width=144 valign=top style="width:108.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><span
  lang=FR>Financière </span></p>
  </td>
  <td width=75 valign=top style="width:56.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.05pt">
  <p class=MsoNormal style="margin-bottom:0in;line-height:normal"><b><span
  lang=FR>&nbsp;</span></b> ' . @$calculate_total_sum_percentage_sous_composante_4_2_finance . '</p>
  </td>
 </tr>

 
</table>
      ';
    }

    echo $output;
  }




  public function fetchAll_PASSATION_ONE_ADMIN(Request $request)
  {

    $unique_code = $request->unique_code;
    $year = $request->year;

    $get_ptba = DB::table('passations')->where('unique_code', '=', $unique_code)->where('year', '=', $year)->get();
    $output = '';

    if ($get_ptba->count() > 0) {


      $Fournitures_et_Biens = 'Fournitures et Biens';
      $Travaux = 'Travaux';
      $Services_autres_que_les_services_de_consultants = 'Services (autres que les services de consultants)';

      // //=== count ======
      // $count_passation_forniture_et_biens = Passation::where('Type_du_marché', '=', $Fournitures_et_Biens)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();
      // $count_passation_Travaux = Passation::where('Type_du_marché', '=', $Travaux)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();
      // $count_passation_Services_autres_que_les_services_de_consultants = Passation::where('Type_du_marché', '=', $Services_autres_que_les_services_de_consultants)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->count();


      //====== sum ======
      $get_sum_passation_forniture_et_biens =  Passation::where('Type_du_marché', '=', $Fournitures_et_Biens)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Travaux =  Passation::where('Type_du_marché', '=', $Travaux)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Services_autres_que_les_services_de_consultants =  Passation::where('Type_du_marché', '=', $Services_autres_que_les_services_de_consultants)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');

      $montant_total = $get_sum_passation_forniture_et_biens + $get_sum_passation_Travaux +  $get_sum_passation_Services_autres_que_les_services_de_consultants;


      $get_percentage_passation_forniture_et_biens = round(($get_sum_passation_forniture_et_biens / $montant_total) * 100, 1);
      $get_percentage_passation_Travaux = round(($get_sum_passation_Travaux / $montant_total) * 100, 1);
      $get_percentage_passation_Services_autres_que_les_services_de_consultants = round(($get_sum_passation_Services_autres_que_les_services_de_consultants / $montant_total) * 100, 1);



      $output .= '
      
<table border=1 cellspacing=0 cellpadding=0
style="border-collapse:collapse;border:none" id="table_passasion_4" class="table table-striped table-bordered">
<thead>

<tr>
 <td width=200 style="width:150.25pt;border:solid windowtext 1.0pt;background:
 #E2EFD9;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center"><b><span
 lang=FR>Type des marchés</span></b></p>
 </td>
 <td width=140 style="width:104.65pt;border:solid windowtext 1.0pt;border-left:
 none;background:#E2EFD9;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center"><b><span
 lang=FR style="color:black">Montant</span></b></p>
 </td>
 <td width=113 style="width:85.05pt;border:solid windowtext 1.0pt;border-left:
 none;background:#E2EFD9;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center"><b><span
 lang=FR style="color:black">%</span></b></p>
 </td>
</tr>

</thead>
<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>Fournitures et
 Biens</span></p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_forniture_et_biens . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_passation_forniture_et_biens . ' </p>
 </td>
</tr>
<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>Travaux</span> </p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Travaux . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_passation_Travaux . '</p>
 </td>
</tr>
<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>Services</span></p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Services_autres_que_les_services_de_consultants . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$$get_percentage_passation_Services_autres_que_les_services_de_consultants . '</p>
 </td>
</tr>

<tr>
 <td width=200 style="width:150.25pt;border:solid windowtext 1.0pt;border-top:
 none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center"><b><span
 lang=FR>Total</span></b></p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><b><span lang=FR>&nbsp;</span></b>' . @$montant_total . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><b><span lang=FR>&nbsp;</span></b></p>
 </td>
</tr>
</table>
      ';
    }
    echo $output;
  }



  public function fetchAll_PASSATION_TWO_ADMIN(Request $request)
  {
    $unique_code = $request->unique_code;
    $year = $request->year;

    $get_ptba = DB::table('passations')->where('unique_code', '=', $unique_code)->where('year', '=', $year)->get();
    $output = '';

    if ($get_ptba->count() > 0) {

      $Appel_Offres_International = 'Appel d’Offres International (AOI)';
      $Appel_Offres_International_Restreint  = "Appel d’Offres International Restreint (AOIR)";
      $Appel_Offres_National  = "Appel d’Offres National (AON)";
      $Entente_direct_Gré_à_Gré  = "Entente direct /Gré à Gré)";
      $Petits_achats_Shopping  = "Petits achats  (Shopping)";
      $Sélection_Fondée_sur_la_Qualité_et_le_Coût  = "Sélection Fondée sur la Qualité et le Coût (SFQC)";
      $Sélection_Fondée_sur_les_Qualifications_des_Consultants  = "Sélection Fondée sur les Qualifications des Consultants (QC)";
      $Sélection_Fondée_sur_la_Qualité_Technique = "Sélection Fondée sur la Qualité Technique (SFQ)";
      $Sélection_au_Moindre_Coût = "Sélection au Moindre Coût (SMC)";
      $Sélection_dans_le_Cadre_Budget_Déterminé = "Sélection dans le Cadre d’un Budget Déterminé (SCBD)";
      $Sélection_par_Utilisation_des_Agences_des_Nations_Unies_des_organisations_spécialisées  = "Sélection par l’Utilisation des Agences des Nations Unies / des organisations spécialisées ";
      $Sélection_de_Consultant_Individuel  = "Sélection de Consultant Individuel (CI) ";





      $get_sum_passation_Appel_Offres_International =  Passation::where('Méthode_de_sélection_du_Marché', '=',  $Appel_Offres_International)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Appel_Offres_International_Restreint =  Passation::where('Méthode_de_sélection_du_Marché', '=',  $Appel_Offres_International_Restreint)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Appel_Offres_National =  Passation::where('Méthode_de_sélection_du_Marché', '=',  $Appel_Offres_National)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Entente_direct_Gré_à_Gré =  Passation::where('Méthode_de_sélection_du_Marché', '=',  $Entente_direct_Gré_à_Gré)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Petits_achats_Shopping =  Passation::where('Méthode_de_sélection_du_Marché', '=',  $Petits_achats_Shopping)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Sélection_Fondée_sur_la_Qualité_et_le_Coût =  Passation::where('Méthode_de_sélection_du_Marché', '=',  $Sélection_Fondée_sur_la_Qualité_et_le_Coût)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Sélection_Fondée_sur_les_Qualifications_des_Consultants =  Passation::where('Méthode_de_sélection_du_Marché', '=',  $Sélection_Fondée_sur_les_Qualifications_des_Consultants)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Sélection_Fondée_sur_la_Qualité_Technique =  Passation::where('Méthode_de_sélection_du_Marché', '=',  $Sélection_Fondée_sur_la_Qualité_Technique)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Sélection_au_Moindre_Coût =  Passation::where('Méthode_de_sélection_du_Marché', '=',  $Sélection_au_Moindre_Coût)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Sélection_dans_le_Cadre_Budget_Déterminé =  Passation::where('Méthode_de_sélection_du_Marché', '=',  $Sélection_dans_le_Cadre_Budget_Déterminé)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Sélection_par_Utilisation_des_Agences_des_Nations_Unies_des_organisations_spécialisées =  Passation::where('Méthode_de_sélection_du_Marché', '=',  $Sélection_par_Utilisation_des_Agences_des_Nations_Unies_des_organisations_spécialisées)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');
      $get_sum_passation_Sélection_de_Consultant_Individuel =  Passation::where('Méthode_de_sélection_du_Marché', '=',  $Sélection_de_Consultant_Individuel)->where('unique_code', '=', $unique_code)->where('year', '=', $year)->sum('Ecart_du_montant');


      $montant_total_one = $get_sum_passation_Appel_Offres_International + $get_sum_passation_Appel_Offres_International_Restreint +  $get_sum_passation_Appel_Offres_National + $get_sum_passation_Entente_direct_Gré_à_Gré + $get_sum_passation_Petits_achats_Shopping  + $get_sum_passation_Sélection_Fondée_sur_la_Qualité_et_le_Coût + $get_sum_passation_Sélection_Fondée_sur_les_Qualifications_des_Consultants + $get_sum_passation_Sélection_Fondée_sur_la_Qualité_Technique + $get_sum_passation_Sélection_au_Moindre_Coût + $get_sum_passation_Sélection_dans_le_Cadre_Budget_Déterminé + $get_sum_passation_Sélection_par_Utilisation_des_Agences_des_Nations_Unies_des_organisations_spécialisées + $get_sum_passation_Sélection_de_Consultant_Individuel;


      $get_percentage_passation_Appel_Offres_International = round(($get_sum_passation_Appel_Offres_International / $montant_total_one) * 100, 1);
      $get_percentage_passation_Appel_Offres_International_Restreint = round(($get_sum_passation_Appel_Offres_International_Restreint / $montant_total_one) * 100, 1);
      $get_percentage_passation_Appel_Offres_National = round(($get_sum_passation_Appel_Offres_National / $montant_total_one) * 100, 1);
      $get_percentage_passation_Entente_direct_Gré_à_Gré = round(($get_sum_passation_Entente_direct_Gré_à_Gré / $montant_total_one) * 100, 1);
      $get_percentage_passation_passation_Petits_achats_Shopping = round(($get_sum_passation_Petits_achats_Shopping / $montant_total_one) * 100, 1);
      $get_percentage_passation_Sélection_Fondée_sur_la_Qualité_et_le_Coût = round(($get_sum_passation_Sélection_Fondée_sur_la_Qualité_et_le_Coût / $montant_total_one) * 100, 1);
      $get_percentage_passation_Sélection_Fondée_sur_les_Qualifications_des_Consultants = round(($get_sum_passation_Sélection_Fondée_sur_les_Qualifications_des_Consultants / $montant_total_one) * 100, 1);
      $get_percentage_passation_Sélection_Fondée_sur_la_Qualité_Technique = round(($get_sum_passation_Sélection_Fondée_sur_la_Qualité_Technique / $montant_total_one) * 100, 1);
      $get_percentage_Sélection_au_Moindre_Coût = round(($get_sum_passation_Sélection_au_Moindre_Coût / $montant_total_one) * 100, 1);
      $get_percentage_Sélection_dans_le_Cadre_Budget_Déterminé = round(($get_sum_passation_Sélection_dans_le_Cadre_Budget_Déterminé / $montant_total_one) * 100, 1);
      $get_percentage_Sélection_par_Utilisation_des_Agences_des_Nations_Unies_des_organisations_spécialisées = round(($get_sum_passation_Sélection_par_Utilisation_des_Agences_des_Nations_Unies_des_organisations_spécialisées / $montant_total_one) * 100, 1);
      $get_percentage_Sélection_de_Consultant_Individuel = round(($get_sum_passation_Sélection_de_Consultant_Individuel / $montant_total_one) * 100, 1);




      $output .= '
      
<table  border=1 cellspacing=0 cellpadding=0
style="border-collapse:collapse;border:none" id="table_passasion_5" class="table table-striped table-bordered">
<thead>


<tr>
 <td width=200 style="width:150.25pt;border:solid windowtext 1.0pt;background:
 #E2EFD9;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center"><b><span
 lang=FR>Méthode des marchés</span></b></p>
 </td>
 <td width=140 style="width:104.65pt;border:solid windowtext 1.0pt;border-left:
 none;background:#E2EFD9;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center"><b><span
 lang=FR style="color:black">Montant</span></b></p>
 </td>
 <td width=113 style="width:85.05pt;border:solid windowtext 1.0pt;border-left:
 none;background:#E2EFD9;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center"><b><span
 lang=FR style="color:black">%</span></b></p>
 </td>
</tr>

</thead>

<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>Appel d’Offres International (AOI)</p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Appel_Offres_International . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_passation_Appel_Offres_International . '</p>
 </td>
</tr>
<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>Appel d’Offres International Restreint (AOIR)</p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Appel_Offres_International_Restreint . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_passation_Appel_Offres_International_Restreint . '</p>
 </td>
</tr>

<tr>

 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>Appel d’Offres National (AON)</p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Appel_Offres_National . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_passation_Appel_Offres_National . '</p>
 </td>
</tr>

<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>Entente direct /Gré à Gré)</p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Entente_direct_Gré_à_Gré . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_passation_Entente_direct_Gré_à_Gré . '</p>
 </td>
</tr>

<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>Petits achats  (Shopping)</p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Petits_achats_Shopping . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_passation_passation_Petits_achats_Shopping . '</p>
 </td>
</tr>

<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>Sélection Fondée sur la Qualité et le Coût (SFQC)</p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Sélection_Fondée_sur_la_Qualité_et_le_Coût . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_passation_Sélection_Fondée_sur_la_Qualité_et_le_Coût . '</p>
 </td>
</tr>

<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>Sélection Fondée sur les Qualifications des Consultants (QC)</p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Sélection_Fondée_sur_les_Qualifications_des_Consultants . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_passation_Sélection_Fondée_sur_les_Qualifications_des_Consultants . '</p>
 </td>
</tr>

<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>Sélection Fondée sur la Qualité Technique (SFQ)</p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Sélection_Fondée_sur_la_Qualité_Technique . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_passation_Sélection_Fondée_sur_la_Qualité_Technique . '</p>
 </td>
</tr>

<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>Sélection au Moindre Coût (SMC)</p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Sélection_au_Moindre_Coût . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_Sélection_au_Moindre_Coût . '</p>
 </td>
</tr>

<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>Sélection dans le Cadre d’un Budget Déterminé (SCBD)</p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Sélection_dans_le_Cadre_Budget_Déterminé . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_Sélection_dans_le_Cadre_Budget_Déterminé . '</p>
 </td>
</tr>

<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>Sélection par l’Utilisation des Agences des Nations Unies / des organisations spécialisées</p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Sélection_par_Utilisation_des_Agences_des_Nations_Unies_des_organisations_spécialisées . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_Sélection_par_Utilisation_des_Agences_des_Nations_Unies_des_organisations_spécialisées . '</p>
 </td>
</tr>

<tr>
 <td width=200 valign=top style="width:150.25pt;border:solid windowtext 1.0pt;
 border-top:none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>Sélection de Consultant Individuel (CI)</p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_sum_passation_Sélection_de_Consultant_Individuel . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><span lang=FR>&nbsp;</span>' . @$get_percentage_Sélection_de_Consultant_Individuel . '</p>
 </td>
</tr>


<tr>
 <td width=200 style="width:150.25pt;border:solid windowtext 1.0pt;border-top:
 none;padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal align=center style="margin-bottom:0in;text-align:center"><b><span
 lang=FR>Total</span></b></p>
 </td>
 <td width=140 valign=top style="width:104.65pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><b><span lang=FR>&nbsp;</span></b>' . @$montant_total_one . '</p>
 </td>
 <td width=113 valign=top style="width:85.05pt;border-top:none;border-left:
 none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
 padding:0in 5.4pt 0in 5.4pt">
 <p class=MsoNormal style="margin-bottom:0in"><b><span lang=FR>&nbsp;</span></b></p>
 </td>
</tr>
</table>
      ';
    }

    echo $output;
  }
}
