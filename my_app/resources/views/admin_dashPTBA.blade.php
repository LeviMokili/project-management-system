@extends('layouts.app')


@section('title', 'Login')




@section('content')




<div class="d-flex bg-dark" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text  text-uppercase border-bottom"><a href="{{route('admin_dash')}}"> BML software</a></div>
        <div class="list-group list-group-flush my-3">
            <a href="{{ route('show_files')}}" class="list-group-item list-group-item-action shadow " type="button" style="font-size: 14px;"><i class="fas fa-power-off me-2"></i> Fichiers</a>
            <a href="{{route('admin_dash_categorie_depense')}}" class="list-group-item list-group-item-action shadow " style="font-size: 14px;"><i class="fas fa-power-off me-2"></i>Catégorie de dépenses</a>
            <a href="{{route('admin_dashPTBA')}}" class="list-group-item list-group-item-action" style="font-size: 14px;"><i class="fas fa-paperclip me-2"></i> PTBA</a>
            <a href="{{route('admin_dashPassation_Marchés')}}" class="list-group-item list-group-item-action" style="font-size: 14px;"><i class="fas fa-paperclip me-2"></i> Passation des Marchés</a>
            <a href="{{route('admin_dashCadre_Résultats_Logique')}}" class="list-group-item list-group-item-action" style="font-size: 14px;"><i class="fas fa-paperclip me-2"></i>Cadre des Résultats-Logique</a>
            <a href="{{route('add_photoVideo')}}" class="list-group-item list-group-item-action" style="font-size: 14px;"><i class="fas fa-paperclip me-2"></i> Photo & Vidéo</a>
            <a href="{{route('add_rapport')}}" class="list-group-item list-group-item-action" style="font-size: 14px;"><i class="fas fa-paperclip me-2"></i> Rapport</a>

            <a href="{{route('auth.logout')}}" class="list-group-item list-group-item-action " style="font-size: 14px;"><i class="fas fa-power-off me-2"></i> se deconnecter </a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter les fichers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert" id="message" style="display: none"></div>
                    <form action="" method="post" id="upload_form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="unique_code" id="unique_code" value="{{$userInfo->unique_code}}">
                        <input type="text" name="my_file_name" id="my_file_name" class="form-control rounded-0 mb-2">
                        <input type="file" name="upload_file" id="upload_file" class="form-control rounded-0" multiple>
                        <input type="submit" class="btn btn-dark" value="upload" id="upload_btn">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper" style="background-color: white">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>

            </div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#" style="font-size: 12px;">Budjet: {{$userInfo->Coute_projet}} <i class="fa-sharp fa-solid fa-dollar-sign"></i><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 12px;"><b style="color: #088FFA"> Pays </b>: {{$userInfo->Pays}} /</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 12px;"><b style="color: #088FFA;"> Province </b>: {{$userInfo->Province}} /</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 12px;"><b style="color: #088FFA;"> <i class="fa-regular fa-money-check-pen"></i>Secteur d'activité </b>: {{$userInfo->Secteur_activite}} /</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 12px;">
                        profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a href="{{route('projet_profile')}}" class="list-group-item list-group-item-action " style="font-size: 14px;" style="color: white;"><ion-icon name="person-circle-outline">Profile </ion-icon> </a>

                    </div>
                </li>

            </ul>




        </nav>

        <!--<img src="storage/images/pdf_image.png" width="100" class="img-thumbnail " style="margin-left:50px">-->
        <!-- <div class="container-fuild d-flex" id="show_all_projectFiles" style="margin-top:20px">


        </div> -->
        @if(Request::is('admin_dash'))

        okay
        @else

        <div class="card card-nav-tabs card-plain">
            <div class="card-header card-header-danger">
                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#home" data-toggle="tab">Ajouter les details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#view" data-toggle="tab"> Imprimer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#updates" data-toggle="tab"> Visualiser le table</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="tab-content text-center">
                    <div class="tab-pane active" id="home">
                        @if(Request::is('admin_dash'))
                        okay
                        @else



                        <div class="container-fluid">
                            <!-- Your main wrapper -->

                            <div class="details">
                                <form action="" method="post" id="admin_ptba">
                                    @csrf
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control form-control-sm rounded-0" name="my_year_picker" id="my_year_picker" placeholder="choisir l'année" readonly />

                                            </div>
                                        </div>

                                    </div>
                                    <div class="container-fluid pt-4">
                                        <div class="table-responsive">


                                            <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=623 style='width:467.5pt;border-collapse:collapse'>
                                                
                                            <tr style='height:.2in'>
                                                    <td width=15 rowspan=2 style='width:11.15pt;border:solid windowtext 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif'>Code de Réf.</span></b></p>
                                                    </td>
                                                    <td width=36 rowspan=2 style='width:27.05pt;border:solid windowtext 1.0pt;
  border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Intitulé de l'activité</span></b></p>
                                                    </td>
                                                    <td width=26 rowspan=2 style='width:19.5pt;border:solid windowtext 1.0pt;
  border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Indicateur de process</span></b></p>
                                                    </td>
                                                    <td width=27 rowspan=2 style='width:19.95pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Unité</span></b></p>
                                                    </td>
                                                    <td width=32 rowspan=2 style='width:24.35pt;border:solid windowtext 1.0pt;
  border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Composante</span></b></p>
                                                    </td>
                                                    <td width=32 rowspan=2 style='width:24.35pt;border:solid windowtext 1.0pt;
  border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Sous-Composante</span></b></p>
                                                    </td>
                                                    <td width=42 rowspan=2 style='width:31.65pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Catégorie financière/Fonds</span></b></p>
                                                    </td>
                                                    <td width=32 rowspan=2 style='width:23.7pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Source de financement</span></b></p>
                                                    </td>
                                                    <td width=33 rowspan=2 style='width:24.95pt;border:solid windowtext 1.0pt;
  border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Responsable d'activité</span></b></p>
                                                    </td>
                                                    <td width=47 colspan=2 style='width:35.4pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Période d'activité</span></b></p>
                                                    </td>
                                                    <td width=24 rowspan=2 style='width:17.7pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Durée d'activité</span></b></p>
                                                    </td>
                                                    <td width=55 colspan=3 style='width:41.0pt;border:solid windowtext 1.0pt;
  border-left:none;background:#FFF2CC;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Réalisation physique</span></b></p>
                                                    </td>
                                                    <td width=52 colspan=3 style='width:38.9pt;border:solid windowtext 1.0pt;
  border-left:none;background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Réalisation financière</span></b></p>
                                                    </td>
                                                    <td width=29 rowspan=2 style='width:22.1pt;border:solid windowtext 1.0pt;
  border-left:none;background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Ratio d'efficience</span></b></p>
                                                    </td>
                                                    <td width=36 rowspan=2 style='width:27.1pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Note d'appréciation</span></b></p>
                                                    </td>
                                                    <td width=105 rowspan=2 style='width:78.65pt;border:solid windowtext 1.0pt;
  border-left:none;background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Commentaire</span></b></p>
                                                    </td>
                                                </tr>
                                                <tr style='height:14.5pt'>
                                                    <td width=24 style='width:17.7pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Début d'activité</span></b></p>
                                                    </td>
                                                    <td width=24 style='width:17.7pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Fin d'activité</span></b></p>
                                                    </td>
                                                    <td width=16 style='width:12.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Prévu</span></b></p>
                                                    </td>
                                                    <td width=20 style='width:14.7pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Réalisé</span></b></p>
                                                    </td>
                                                    <td width=19 style='width:14.3pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>%</span></b></p>
                                                    </td>
                                                    <td width=16 style='width:12.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#F8CBAD;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Prévu</span></b></p>
                                                    </td>
                                                    <td width=20 style='width:14.7pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#F8CBAD;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Réalisé</span></b></p>
                                                    </td>
                                                    <td width=16 style='width:12.2pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#F8CBAD;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>%</span></b></p>
                                                    </td>
                                                </tr>



                                                <div class="add_address_section">
                                                    <tbody id="tbody" style="background:#FCE4D6">

                                                    </tbody>

                                                </div>



                                            </table>

                                        </div>
                                        <button class="btn btn-md rounded-0" id="addBtn" type="button" style=" background: linear-gradient(60deg,#012949,#024376);font-family:'Roboto', sans-serif; font-weight:100; color:white">
                                            Ajouter les lignes
                                        </button>
                                        <button class="btn btn-md  rounded-0" type="submit" name="Save_data">
                                            sauvegarder
                                        </button>
                                </form>

                            </div>


                            <hr />
                            <!-- <div id="orderItems">-->
                            <!-- 
                            <input type="date" id="date-input" required />
<button id="submit">Submit</button> -->


                        </div>


                    </div>
                    @endif

                </div>
                <div class="tab-pane" id="view" style="background-color: white;">

                    <div class="details">


                        <div class="container-fluid pt-4">

                            <div class="table-responsive">

                                <form action="" method="post">
                                    @csrf
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control form-control-sm rounded-0" name="my_year_picker_three" id="my_year_picker_three" placeholder="<================== Année ================>" readonly />
                                            </div>

                                        </div>

                                    </div>


                                    <div class="">
                                        <div id="show_ptba_two"></div>

                                    </div>
                                </form>


                            </div>



                        </div>



                    </div>

                </div>
                <div class="tab-pane" id="updates" style="background-color: white;">
                    <div class="details">


                        <div class="container-fluid pt-4">

                            <div class="table-responsive">

                                <form action="" method="post">
                                    @csrf
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control form-control-sm rounded-0" name="my_year_picker_two" id="my_year_picker_two" placeholder="<================== Année ================>" readonly />
                                            </div>

                                        </div>

                                    </div>


                                    <div class="">
                                        <div id="show_ptba_one"></div>

                                    </div>
                                </form>


                            </div>



                        </div>



                    </div>

                </div>

            </div>
        </div>
        @endif


    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="ptbaModal" tabindex="-1" role="dialog" aria-labelledby="ptbaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ptbaModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="update_record_ptba_form">
                    @csrf

                    <input type="hidden" class="form-control " id="unique_code_edit" name="unique_code_edit" value="{{$userInfo->unique_code}}" />
                    <input type="hidden" class="form-control " id="id_edit" name="id_edit" />

                    <div class=" mb-2">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm input-key" id="Code_de_réf_edit" name="Code_de_réf_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Code de Réf</label>
                        </span>

                    </div>

                    <div class=" mb-2">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm input-key" id="Intitulé_de_activité_edit" name="Intitulé_de_activité_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Intitulé activité</label>
                        </span>

                    </div>

                    <div class=" mb-2">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm  input-key" id="Indicateur_de_process_edit" name="Indicateur_de_process_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Indicateur de process</label>
                        </span>

                    </div>
                    <div class=" mb-2">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm input-key" id="Unité_edit" name="Unité_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Unité</label>
                        </span>

                    </div>
                    <div class="mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm input-key" id="Composante_edit" name="Composante_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Composante</label>
                        </span>

                    </div>
                    <div class="mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm input-key" id="Sous_composante_edit" name="Sous_composante_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Sous-Composante</label>
                        </span>

                    </div>
                    <div class="mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm input-key" id="Catégorie_financière_fond_edit" name="Catégorie_financière_fond_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Catégorie financière/Fonds</label>
                        </span>

                    </div>

                    <div class="mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm input-key" id="Source_de_financement_edit" name="Source_de_financement_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Source de financement</label>
                        </span>

                    </div>
                    <div class="mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm input-key" id="Responsable_activité_edit" name="Responsable_activité_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Responsable activité</label>
                        </span>

                    </div>
                    <div class=" mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="date" class="form-control  form-control-sm input-key" id="Début_activité_edit" name="Début_activité_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Début d'activité</label>
                        </span>

                    </div>
                    <div class=" mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="date" class="form-control  form-control-sm input-key" id="Fin_activité_edit" name="Fin_activité_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Fin d'activité</label>
                        </span>

                    </div>

                    <div class=" mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm" id="Prévu_one_edit" name="Prévu_one_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Prévu /RP</label>
                        </span>

                    </div>
                    <div class=" mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control   form-control-sm " id="Réalisé_one_edit" name="Réalisé_one_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Réalisé / RP</label>
                        </span>

                    </div>
                    <div class=" mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm " id="percent_one_edit" name="percent_one_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA"> % / RP</label>
                        </span>

                    </div>

                    <div class=" mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm " id="Prévu_two_edit" name="Prévu_two_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA"> Prévu/ Réalisation financière</label>
                        </span>

                    </div>
                    <div class=" mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm" id="Réalisé_two_edit" name="Réalisé_two_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Réalisé / Réalisation financière</label>
                        </span>

                    </div>
                    <div class=" mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm" id="percent_two_edit" name="percent_two_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA"> % / Réalisation financière</label>
                        </span>

                    </div>
                    <div class="mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm " id="Ratio_efficience_edit" name="Ratio_efficience_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Ratio efficience</label>
                        </span>

                    </div>
                    <div class=" mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control form-control-sm " id="Note_appréciation_edit" name="Note_appréciation_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Note appréciation</label>
                        </span>

                    </div>
                    <div class=" mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control  form-control-sm" id="Commentaire_edit" name="Commentaire_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Commentaire</label>
                        </span>

                    </div>


                    <input type="submit" name="" value="update " class="btn btn-dark btn-block rounded-0" id="update_ptba_btn">



                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')



<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
</script>

<script>
    $(document).ready(function() {



        $("#my_year_picker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true,
            forceParse: false,
            year: true

        });



        $("#my_year_picker_two").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true,
            forceParse: false

        });
        $("#my_year_picker_three").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true,
            forceParse: false

        });


    })
</script>
<script type="text/javascript">
    $(function() {












        //==================== ADD PTBA RECORD ======================

        $("#admin_ptba").submit(function(e) {
            e.preventDefault();

            $.ajax({

                url: '{{ route("add_ptba") }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',

                success: function(res) {

                    if (res.status == 200) {
                        toastr.success('sauvergader avec succes');
                        $("#admin_ptba")[0].reset();

                        fetchAll_PTBA();
                    } if (res.status == 401) {
                        toastr.error("l'annéée n'est pas selectioner");
                    } if (res.status == 400) {
                        toastr.error("fill");
                    }     


                }
            })
        });


        //================= FECTH ALL PREVIEWS RECORD PTBA FROM THE DATABASE BEFORE UPDATING ============  //

        $(document).on('click', '.edit_ptba_btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');

            $.ajax({
                url: '{{ route("edit_ptba")}}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {


                    $("#Code_de_réf_edit").val(res.Code_de_Réf);
                    $("#Intitulé_de_activité_edit").val(res.Intitulé_de_activité);
                    $("#Indicateur_de_process_edit").val(res.Indicateur_de_process);
                    $("#Unité_edit").val(res.Unité);

                    $("#Composante_edit").val(res.Composante);
                    $("#Sous_composante_edit").val(res.Sous_Composante);

                    $("#Catégorie_financière_fond_edit").val(res.Catégorie_financière_Fonds);
                    $("#Source_de_financement_edit").val(res.Source_de_financement);
                    $("#Responsable_activité_edit").val(res.Responsable_activité);

                    $("#Début_activité_edit").val(res.Début_activité);
                    $("#Fin_activité_edit").val(res.Fin_activité);


                    $("#Prévu_one_edit").val(res.Prévu_one);
                    $("#Réalisé_one_edit").val(res.Réalisé_one);
                    $("#percent_one_edit").val(res.percent_one);

                    $("#Prévu_two_edit").val(res.Prévu_two);
                    $("#Réalisé_two_edit").val(res.Réalisé_two);
                    $("#percent_two_edit").val(res.percent_two);

                    $("#Ratio_efficience_edit").val(res.Ratio_efficience);
                    $("#Note_appréciation_edit").val(res.Note_appréciation);
                    $("#Commentaire_edit").val(res.Commentaire);
                    $("#unique_code").val(res.unique_code);
                    $("#id_edit").val(res.id);



                }
            })
        });


        $(document).on('click', '.delet_ptba_btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '{{ route("delete_ptba_record")}}',
                method: 'post',
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    toastr.success('sauvergader avec succes! viellez actualiser la table en clickant annéé');
                    fetchAll_PTBA();

                }
            })




        });



        // ============ UPDATE RECORD ================== //

        $("#update_record_ptba_form").submit(function(e) {
            e.preventDefault();


            $.ajax({
                url: '{{ route("update_project_ptba_records")}}',
                method: 'post',
                data: $(this).serialize(),
                error: function(res) {
                    console.log(res);
                },
                success: function(res) {
                    if (res.status == 200) {

                        fetchAll_PTBA();
                        $("#ptbaModal").modal('hide');
                        toastr.success('modification fait avec succes');
                        console.log(res);

                    }

                }

            });

        });






        fetchAll_PTBA();

        function fetchAll_PTBA() {
            $("#my_year_picker_two").on('change', function() {
                var unique_code = $("#unique_code").val();
                var year_one = $("#my_year_picker_two").val();



                $.ajax({
                    url: '{{ route("fetchAll_PTBA_METHOD")}}',
                    method: 'get',
                    data: {
                        unique_code: unique_code,
                        year_one: year_one
                    },
                    error: function(res) {
                        console.log(res);
                    },
                    success: function(res) {
                        $("#show_ptba_one").html(res);

                    }
                })

            })
            $("#my_year_picker_three").on('change', function() {
                var unique_code = $("#unique_code").val();
                var year_two = $("#my_year_picker_three").val();



                $.ajax({
                    url: '{{ route("fetchAll_PTBA_METHOD_TWO")}}',
                    method: 'get',
                    data: {
                        unique_code: unique_code,
                        year_two: year_two
                    },
                    error: function(res) {
                        console.log(res);
                    },
                    success: function(res) {
                        $("#show_ptba_two").html(res);
                        $("#ptba_table_two").DataTable({
                            responsive: "true",
                            dom: 'Bfrtilp',

                            buttons: [{
                                    extend: 'excelHtml5',
                                    text: '<i class="fas fa-file-excel"></i> ',
                                    title: ' ',

                                    className: 'btn btn-success'
                                },
                               
                                {
                                    extend: 'print',
                                    text: '<i class="fa fa-print"></i> ',

                                    title: ' ',
                                    className: 'btn btn-info'
                                },
                            ]

                        });



                    }
                })

            })

        }







    })





    $(document).ready(function() {



        var rowIdx = 0;

        // jQuery button click event to add a row.
        $('#addBtn').on('click', function() {


            // Adding a row inside the tbody.
            $('#tbody').append(`<tr id="R${++rowIdx}">
       
            <input type="hidden"   id="update_budjet" name="update_budjet"  value="{{$userInfo->Coute_projet}}" readonly />
                <input type="hidden"  class="budjet form-control"  id="unique_code[]"  name = "unique_code[]" value="{{$userInfo->unique_code}}"  />
            <td class="text-center address_field">
              <input type="text"  class="form-control rounded-0 " id="Code_de_Réf[]" name="Code_de_Réf[]" style="width:50px;height:25px"  />
            </td>
            <td class="text-center address_field">

              <input type="text"  class="montant form-control  rounded-0 " onkeyup="CalculateTotal(this)"  name="Intitulé_de_activité[]" id="Intitulé_de_activité[]"  style="width:400px;height:25px"  />
            </td>
            <td class="text-center">
              <input type="text"  class="percentage form-control  rounded-0"  id="Indicateur_de_process[]"  name="Indicateur_de_process[]"  style="width:100px;height:25px" />
            </td>
            
            <td class="text-center">
            <input type="text"  class="form-control  rounded-0" id="Unité[]" name ="Unité[]"  style="width:50px;height:25px"/>
            </td>
             <td class="text-center">
                <select class="rounded-0" id="Composante[]" name="Composante[]" style="width:200px;height:25px;padding-top:-80px">
                    <option value="Composant_1">Composant_1</option>
                    <option value="Composant_2">Composant_2</option>
                    <option value="Composant_3">Composant_3</option>
                    <option value="Composant_4">Composant_4</option>
                </select>

            </td>
             <td class="text-center">
                <select class="rounded-0" id="Sous-Composante[]" name="Sous-Composante[]" style="width:200px;height:25px">
                    <option value="Sous-Composante_1_1">Sous-Composante_1_1</option>
                    <option value="Sous-Composante_1_2">Sous-Composante_1_2</option>
                    <option value="Sous-Composante_2_1">Sous-Composante_2_1</option>
                    <option value="Sous-Composante_2_2">Sous-Composante_2_2</option>
                    <option value="Sous-Composante_3_1">Sous-Composante_3_1</option>
                    <option value="Sous-Composante_3_2">Sous-Composante_3_2</option>
                    <option value="Sous-Composante_4_1">Sous-Composante_4.1</option>
                    <option value="Sous-Composante_4_2">Sous-Composante_4_2</option>
                </select>
            </td>
             <td class="text-center">
              <input type="text"  class="form-control  rounded-0" id="Catégorie_financière_Fonds[]"  name ="Catégorie_financière_Fonds[]" style="width:200px;height:25px"  />
            </td>
             <td class="text-center">
              <input type="text"  class="form-control  rounded-0" id="Source_de_financement[]"  name ="Source_de_financement[]" style="width:200px;height:25px"  />
            </td>
             <td class="text-center">
              <input type="text"  class="form-control  rounded-0" id="Responsable_activité[]"  name ="Responsable_activité[]"  style="width:200px;height:25px" />
            </td>
             <td class="text-center">
             
              <input type="date" class="Début_activité form-control  rounded-0 " onchange="CalculateDate(this)" id="Début_activité[]"  name ="Début_activité[]" style="width:150px;height:25px"   />
            </td>
             <td class="text-center">
              <input type="date" class="Fin_activité form-control  rounded-0" onchange="CalculateDate(this)" id="Fin_activité[]"  name ="Fin_activité[]" style="width:150px;height:25px"    />
            </td>
            
             <td class="text-center">
              <input type="tex"  class="Durée_activité form-control  rounded-0" id="Durée_activité[]"  name ="Durée_activité[]"  style="width:65px;height:25px" maxlength="4" readonly />
            </td>
             <td class="text-center">
              <input type="text"  class="Prévu_one form-control  rounded-0" id="Prévu_one[]" onkeyup="CalculateDate(this)"  name ="Prévu_one[]"  style="width:100px;height:25px"  />
            </td>
             <td class="text-center"> 
              <input type="text"  class="Réalisé_one form-control  rounded-0" id="Réalisé_one[]"   onkeyup="CalculateDate(this)" name ="Réalisé_one[]" style="width:100px;height:25px"  />
            </td>
             <td class="text-center">
              <input type="text"  class="percent_one form-control  rounded-0" id="percent_one[]"  name ="percent_one[]" style="width:60px;height:25px" readonly/>
            </td>



            <td class="text-center">
              <input type="text"  class="Prévu_two form-control  rounded-0" id="Prévu_two[]"  name ="Prévu_two[]" onkeyup="CalculateDate(this)"  style="width:100px;height:25px" />
            </td>
             <td class="text-center">
              <input type="text"  class="Réalisé_two form-control  rounded-0" id="Réalisé_two[]"  name ="Réalisé_two[]"  onkeyup="CalculateDate(this)"   style="width:100px;height:25px"  />
            </td>
             <td class="text-center">
              <input type="text"  class="percent_two form-control  rounded-0" id="percent_two[]"  name ="percent_two[]"  style="width:60px;height:25px" readonly />
            </td>

             <td class="text-center">
              <input type="text"  class="Ratio_efficience form-control  rounded-0" id="Ratio_efficience[]"  name ="Ratio_efficience[]" onkeyup="CalculateDate(this)"  style="width:70px;height:25px" />
            </td>
             <td class="text-center">
              <input type="text"  class="form-control  rounded-0" id="Note_appréciation[]"  name ="Note_appréciation[]"  style="width:100px;height:25px" />
            </td>
             <td class="text-center">
             
              <input type="text"  class="form-control  rounded-0" id="Commentaire[]"  name ="Commentaire[]" style="width:300px;height:25px"   />
            </td>
           <td class="text-center" style="margin-left:10px">
            <button class="btn btn-danger remove" 
                type="button"><ion-icon name="close-circle-outline"></ion-icon></button>
            </td>
            
           </tr>`);
        });







        // Node.js program to demonstrate the
        // Node.js filehandle.read() Method

        // jQuery button click event to remove a row
        $('#tbody').on('click', '.remove', function() {

            // Getting all the rows next to the
            // row containing the clicked button
            var child = $(this).closest('tr').nextAll();

            // Iterating across all the rows
            // obtained to change the index
            child.each(function() {

                // Getting <tr> id.
                var id = $(this).attr('id');

                // Getting the <p> inside the .row-index class.
                var idx = $(this).children('.row-index').children('p');

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row index.
                idx.html(`Row ${dig - 1}`);

                // Modifying row id.
                $(this).attr('id', `R${dig - 1}`);
            });

            // Removing the current row.
            $(this).closest('tr').remove();

            // Decreasing the total number of rows by 1.
            rowIdx--;
        });

    });


    function CalculateDate(ele) {

        var rate = new Date($(ele).closest('tr').find('.Début_activité').val());
        var quantity = new Date($(ele).closest('tr').find('.Fin_activité').val());


        var prevu_1 = $(ele).closest('tr').find('.Prévu_one').val();
        var realise_1 = $(ele).closest('tr').find('.Réalisé_one').val();

        var prevu_2 = $(ele).closest('tr').find('.Prévu_two').val();
        var realise_2 = $(ele).closest('tr').find('.Réalisé_two').val();





        rate = rate == '' ? 0 : rate;
        quantity = quantity == '' ? 0 : quantity;

        prevu_1 = prevu_1 == '' ? 0 : prevu_1;
        realise_1 = realise_1 == '' ? 0 : realise_1;

        prevu_2 = prevu_2 == '' ? 0 : prevu_2;
        realise_2 = realise_2 == '' ? 0 : realise_2;





        if (!isNaN(rate) && !isNaN(quantity) && !isNaN(prevu_1) && !isNaN(realise_1) && !isNaN(prevu_2) && !isNaN(realise_2)) {
            var days = quantity.getDate() - rate.getDate();
            $(ele).closest('tr').find('.Durée_activité').val(days);

            var totale_R_physique = (parseInt(realise_1) / parseInt(prevu_1)) * 100;
            get_percent_one = $(ele).closest('tr').find('.percent_one').val(totale_R_physique.toFixed(0.5));


            var totale_R_Finance = (parseInt(realise_2) / parseInt(prevu_2)) * 100;
            get_percent_two = $(ele).closest('tr').find('.percent_two').val(totale_R_Finance.toFixed(0.5));

            var tp = totale_R_Finance / totale_R_physique;


            var ratio = $(ele).closest('tr').find('.Ratio_efficience').val(tp.toFixed(2));
            ratio = ratio == '' ? 0 : ratio;



        }













    }
    // function CalculateR_Physique(ele) {

    //     var prevu_1 = $(ele).closest('tr').find('.Prévu_one').val();
    //     var realise_1 = $(ele).closest('tr').find('.Réalisé_one').val();

    //     prevu_1 = prevu_1 == '' ? 0 : prevu_1;
    //     realise_1 = realise_1 == '' ? 0 : realise_1;

    //     if (!isNaN(prevu_1) && !isNaN(realise_1)) {
    //         var totale_R_physique = (parseInt(realise_1) / parseInt(prevu_1))*100;
    //         $(ele).closest('tr').find('.percent_one').val(totale_R_physique.toFixed(0.5));
    //     }




    // }
    function CalculateR_Finance(ele) {










    }

    function Calculate_Ratio_efficience(ele) {


        var realise_2 = $(ele).closest('tr').find('.Réalisé_two').val();
        var get = realise_2;
        var percent_R_one = $(ele).closest('tr').find('.Ratio_efficience').val(get.toFixed(1.5));






    }
</script>



@endsection