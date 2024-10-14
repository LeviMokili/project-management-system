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
                    <form action="#" method="post" id="upload_form" enctype="multipart/form-data">
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
        <div class="container-fluid">


            <div class="row">

                <div class="col-md-12">


                    <!-- Tabs on Plain Card -->
                    <div class="card card-nav-tabs card-plain">
                        <div class="card-header card-header-danger">
                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#home" data-toggle="tab">Ajouter les
                                                details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#view" data-toggle="tab"> Imprimer</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#updates" data-toggle="tab"> Visualiser le
                                                table</a>
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
                                            <form action="" method="post" id="admin_dash_passation_marche">
                                                @csrf
                                                <div class="container-fluid pt-4">
                                                    <div class="table-responsive">
                                                        <div class="mb-2">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control form-control-sm rounded-0" name="my_year_picker" id="my_year_picker" placeholder="choisir l'année" readonly />

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=2111 style='width:1583.5pt;border-collapse:collapse'>
                                                            <tr style='height:39.0pt'>
                                                                <td width=359 valign=bottom style='width:269.0pt;border:solid windowtext 1.0pt;
  background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif'>Decription du Marché</span></b></p>
                                                                </td>
                                                                <td width=229 style='width:171.75pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>N° Reference du Marché</span></b></p>
                                                                </td>
                                                                <td width=105 style='width:78.5pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Type du Marché</span></b></p>
                                                                </td>
                                                                <td width=115 style='width:86.5pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=FR style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Méthode de sélection du Marché</span></b></p>
                                                                </td>
                                                                <td width=116 style='width:86.9pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=FR style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Type de révision (à Priori / à Postériori)</span></b></p>
                                                                </td>
                                                                <td width=128 style='width:95.85pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Montant estimatif du Marché</span></b></p>
                                                                </td>
                                                                <td width=124 style='width:92.85pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Montant réel du Marché</span></b></p>
                                                                </td>
                                                                <td width=124 style='width:92.9pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Ecart du montant</span></b></p>
                                                                </td>
                                                                <td width=137 style='width:102.65pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=FR style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Date de signature du contrat</span></b></p>
                                                                </td>
                                                                <td width=140 style='width:105.35pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=FR style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Date de livaison/Production du rapport </span></b></p>
                                                                </td>
                                                                <td width=73 style='width:54.45pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Ecart de durée</span></b></p>
                                                                </td>
                                                                <td width=143 style='width:107.05pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Nom de l'entreprise Contractant</span></b></p>
                                                                </td>
                                                                <td width=107 style='width:80.35pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Note d'appréciation du Marché</span></b></p>
                                                                </td>
                                                                <td width=213 style='width:159.4pt;border:solid windowtext 1.0pt;border-left:
  none;background:#E2EFDA;padding:0in 5.4pt 0in 5.4pt;height:39.0pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Commentaire</span></b></p>
                                                                </td>
                                                            </tr>

                                                            <div class="">
                                                                <tbody id="tbody">

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
                                                    <div id="show_passation_two"></div>

                                                </div>
                                            </form>


                                        </div>



                                    </div>



                                </div>

                            </div>
                            <div class="tab-pane" id="updates" style="background-color: white;">
                                <div class="details">
                                    <form action="" method="post" id="admin_dash_passation_marche">
                                        @csrf
                                        <div class="container-fluid pt-4">
                                            <div class="table-responsive">
                                                <div class="mb-2">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control form-control-sm rounded-0" name="my_year_picker_two" id="my_year_picker_two" placeholder="<================== Année ================>" readonly />
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="">
                                                    <div id="show_passation">

                                                    </div>
                                                </div>


                                            </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Tabs on plain Card -->
            </div>
        </div>
    </div>


    <!--<img src="storage/images/pdf_image.png" width="100" class="img-thumbnail " style="margin-left:50px">-->
    <!-- <div class="container-fuild d-flex" id="show_all_projectFiles" style="margin-top:20px">


        </div> -->
    <!-- Modal -->
    <div class="modal fade" id="edit_passationModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="#" method="post" id="update_form_passation">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">


                        <input type="hidden" name="unique_code_edit" id="unique_code_edit">
                        <input type="hidden" name="id_edit" id="id_edit">


                        <div class="form-outline mb-2">
                            <span class="form-group has-float-label">
                                <input type="text" class="form-control form-control-sm" id="Decription_du_march_edit" name="Decription_du_march_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Decription du Marché</label>
                            </span>

                        </div>

                        <div class="form-outline mb-2">
                            <span class="form-group has-float-label">
                                <input type="text" class="form-control form-control-sm" id="Numero_Reference_du_marché_edit" name="Numero_Reference_du_marché_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">N° Reference du Marché</label>
                            </span>

                        </div>

                        <div class="form-outline mb-2">
                            <span class="form-group has-float-label">
                                <input type="text" class="form-control form-control-sm" id="Type_du_marché_edit" name="Type_du_marché_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Type du Marché</label>
                            </span>

                        </div>
                        <div class="form-outline mb-2">
                            <span class="form-group has-float-label">
                                <input type="text" class="form-control form-control-sm" id="Méthode_de_sélection_du_Marché_edit" name="Méthode_de_sélection_du_Marché_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Méthode de sélection du Marché</label>
                            </span>

                        </div>
                        <div class="form-outline mb-2 rounded-0">
                            <span class="form-group has-float-label">
                                <input type="text" class="form-control form-control-sm" id="Type_de_révision_edit" name="Type_de_révision_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Type de révision (à Priori / à Postériori)</label>
                            </span>

                        </div>
                        <div class="form-outline mb-2 rounded-0">
                            <span class="form-group has-float-label">
                                <input type="text" class="form-control form-control-sm" id="Montant_estimatif_du_Marché_edit" name="Montant_estimatif_du_Marché_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Montant estimatif du Marché</label>
                            </span>

                        </div>
                        <div class="form-outline mb-2 rounded-0">
                            <span class="form-group has-float-label">
                                <input type="text" class="form-control form-control-sm" id="Montant_réel_du_marché_edit" name="Montant_réel_du_marché_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Montant réel du Marché</label>
                            </span>

                        </div>
                        <div class="form-outline mb-2 rounded-0">
                            <span class="form-group has-float-label">
                                <input type="text" class="form-control form-control-sm" id="Ecart_du_montant_edit" name="Ecart_du_montant_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Ecart du montant</label>
                            </span>


                        </div>
                        <div class="form-outline mb-2 rounded-0">
                            <span class="form-group has-float-label">
                                <input type="date" class="form-control form-control-sm" id="Date_de_signature_du_contrat_edit" name="Date_de_signature_du_contrat_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Date de signature du contrat</label>
                            </span>

                        </div>
                        <div class="form-outline mb-2 rounded-0">
                            <span class="form-group has-float-label">
                                <input type="date" class="form-control form-control-sm" id="Date_livaison_Production_du_rapport_edit" name="Date_livaison_Production_du_rapport_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Date de livaison/Production du rapport </label>
                            </span>

                        </div>

                        <div class="form-outline mb-2 rounded-0">
                            <span class="form-group has-float-label">
                                <input type="text" class="form-control form-control-sm" id="Nom_de_entreprise_contractant_edit" name="Nom_de_entreprise_contractant_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Nom de l'entreprise Contractant </label>
                            </span>

                        </div>
                        <div class="form-outline mb-2 rounded-0">
                            <span class="form-group has-float-label">
                                <input type="text" class="form-control form-control-sm" id="Note_appréciation_du_marché_edit" name="Note_appréciation_du_marché_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Note d'appréciation du Marché </label>
                            </span>

                        </div>
                        <div class="form-outline mb-2 rounded-0">
                            <span class="form-group has-float-label">
                                <input type="text" class="form-control form-control-sm" id="Commentaire_edit" name="Commentaire_edit" />

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Commentaire </label>
                            </span>

                        </div>



                        <input type="submit" name="" value="Register" class="btn btn-dark btn-block rounded-0" id="register_btn">



                    </div>


                </div>
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








        //================= FECTH ALL PREVIEWS RECORD FROM THE DATABASE BEFORE UPDATING ============  //








        $("#admin_dash_passation_marche").submit(function(e) {
            e.preventDefault();

            $.ajax({

                url: '{{ route("add_passation_marche") }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $("#admin_dash_passation_marche")[0].reset();
                    fetchAll_Passation();


                }
            })
        });



        fetchAll_Passation();

        function fetchAll_Passation() {
            $("#my_year_picker_two").on('change', function() {
                var year = $("#my_year_picker_two").val();
              
                var unique_code = $("#unique_code").val();
                $.ajax({
                    url: '{{ route("fetchAll_Passation")}}',
                    method: 'get',
                    data: {
                        unique_code: unique_code,
                        year: year
                    },
                    success: function(res) {
                        $("#show_passation").html(res);
                    }
                })
            })
            $("#my_year_picker_three").on('change', function() {
                var year = $("#my_year_picker_three").val();
              
                var unique_code = $("#unique_code").val();
                $.ajax({
                    url: '{{ route("fetchAll_Passation_Two")}}',
                    method: 'get',
                    data: {
                        unique_code: unique_code,
                        year: year
                    },
                    success: function(res) {
                        $("#show_passation_two").html(res);
                        
                    $("#table_passation_two").DataTable({
                        responsive: "true",
                        dom: 'Bfrtilp',

                        buttons: [{
                                extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel"></i> ',
                                title: ' ',

                                className: 'btn btn-success'
                            },
                            {
                                extend: 'pdfHtml5',
                                text: '<i class="fas fa-file-pdf"></i> ',

                                className: 'btn btn-danger'
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




        //================= FECTH ALL PREVIEWS RECORD PTBA FROM THE DATABASE BEFORE UPDATING ============  //

        $(document).on('click', '.edit_passation_btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');


            $.ajax({
                url: '{{ route("edit_passation_method")}}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {

                    $("#Decription_du_march_edit").val(res.Decription_du_march);
                    $("#Numero_Reference_du_marché_edit").val(res.Numero_Reference_du_marché);
                    $("#Type_du_marché_edit").val(res.Type_du_marché);
                    $("#Méthode_de_sélection_du_Marché_edit").val(res.Méthode_de_sélection_du_Marché);

                    $("#Type_de_révision_edit").val(res.Type_de_révision);
                    $("#Montant_estimatif_du_Marché_edit").val(res.Montant_estimatif_du_Marché);

                    $("#Montant_réel_du_marché_edit").val(res.Montant_réel_du_marché);
                    $("#Ecart_du_montant_edit").val(res.Ecart_du_montant);
                    $("#Date_de_signature_du_contrat_edit").val(res.Date_de_signature_du_contrat);

                    $("#Date_livaison_Production_du_rapport_edit").val(res.Date_livaison_Production_du_rapport);
                    $("#Ecart_de_durée_edit").val(res.Ecart_de_durée);
                    $("#Nom_de_entreprise_contractant_edit").val(res.Nom_de_entreprise_contractant);

                    $("#Note_appréciation_du_marché_edit").val(res.Note_appréciation_du_marché);
                    $("#Commentaire_edit").val(res.Commentaire);
                    $("#unique_code_edit").val(res.unique_code);
                    $("#id_edit").val(res.id);

                    console.log(res);


                }
            })
        })




        // ============ UPDATE RECORD ================== //

        $("#update_form_passation").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route("update_project_passation_records")}}',
                method: 'post',
                data: $(this).serialize(),
                error: function(res) {
                    console.log(res);
                },
                success: function(res) {
                    if (res.status = 200) {
                        $("#edit_passationModal").modal('hide');
                        toastr.success('modification fait avec succes');

                        fetchAll_Passation();
                    }


                }
            })

        });
        $(document).on('click', '.delet_passation_btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '{{ route("delete_passation_record")}}',
                method: 'post',
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {

                    if (res.status == 200) {
                        alert("deleted");
                        toastr.success('fichier suprimer');
                        fetchAll_Passation();
                    }


                }
            })




        })







    })





    $(document).ready(function() {



        var rowIdx = 0;

        // jQuery button click event to add a row.
        $('#addBtn').on('click', function() {


            // Adding a row inside the tbody.
            $('#tbody').append(`<tr id="R${++rowIdx}">
             
            <td class="text-center">
            
            <input type="hidden"  class="budjet form-control" onkeyup="CalculateTotal(this)" id="update_budjet" name="update_budjet"  value="{{$userInfo->Coute_projet}}" readonly />
                <input type="hidden"  class="budjet form-control"  id="unique_code[]"  name = "unique_code[]" value="{{$userInfo->unique_code}}"  />
              <input type="text"  class="form-control rounded-0" id="Decription_du_march[]" name="Decription_du_march[]" style="width:200px;height:40px" />
            </td>
            <td class="text-center">
              <input type="text"  class="montant form-control  rounded-0" onkeyup="CalculateTotal(this)"  name="Numero_Reference_du_marché[]" id="Numero_Reference_du_marché[]"  style="width:200px;height:40px" />
            </td>
            <td class="text-center">
                <select class="custom-select rounded-0" id="Type_du_marché[]"  name="Type_du_marché[]" style="width:200px;height:40px">
                    <option selected>Choisir</option>
                    <option value="Fournitures et Biens">Fournitures et Biens</option>
                    <option value="Travaux">Travaux</option>
                    <option value="Services (autres que les services de consultants)">Services (autres que les services de consultants)</option>
                </select>
            </td>
            
            <td class="text-center">
            <select class="custom-select rounded-0" id="Méthode_de_sélection_du_Marché[]" name ="Méthode_de_sélection_du_Marché[]" style="width:200px;height:40px">
                            <option selected>Choisir</option>
                            <option value="Appel d’Offres International (AOI)">Appel d’Offres International (AOI)</option>
                            <option value="Appel d’Offres International Restreint (AOIR)">Appel d’Offres International Restreint (AOIR)</option>
                            <option value="Appel d’Offres National (AON)">Appel d’Offres National (AON)"</option>
                            <option value="Entente direct /Gré à Gré)">Entente direct /Gré à Gré)">Entente direct /Gré à Gré)">Entente direct /Gré à Gré)</option>
                            <option value="Petits achats  (Shopping)">Petits achats  (Shopping)"></option>
                            <option value="Sélection Fondée sur la Qualité et le Coût (SFQC)">Sélection Fondée sur la Qualité et le Coût (SFQC)</option>
                            <option value="Sélection Fondée sur les Qualifications des Consultants (QC)">Sélection Fondée sur les Qualifications des Consultants (QC)</option>
                            <option value="Sélection Fondée sur la Qualité Technique (SFQ)">Sélection Fondée sur la Qualité Technique (SFQ)</option>
                            <option value="Sélection au Moindre Coût (SMC)">Sélection au Moindre Coût (SMC)</option>
                            <option value="Sélection dans le Cadre d’un Budget Déterminé (SCBD)">Sélection dans le Cadre d’un Budget Déterminé (SCBD)</option>
                            <option value="Sélection par l’Utilisation des Agences des Nations Unies / des organisations spécialisées ">Sélection par l’Utilisation des Agences des Nations Unies / des organisations spécialisées </option>
                            <option value="Sélection de Consultant Individuel (CI)">Sélection de Consultant Individuel (CI)</option>
                        </select>
          
            </td>
             <td class="text-center">
              <input type="text"  class="form-control  rounded-0"  id="Type_de_révision[]" name ="Type_de_révision[]"  style="width:200px;height:40px"  />
            </td>
             <td class="text-center">
              <input type="number"  class="Montant_estimatif_du_Marché form-control  rounded-0" id="Montant_estimatif_du_Marché[]" onkeyup="CalculateTotal(this)"  name ="Montant_estimatif_du_Marché[]"  style="width:200px;height:40px" />
            </td>
             <td class="text-center">
              <input type="number"  class="Montant_réel_du_marché form-control  rounded-0" id="Montant_réel_du_marché[]" onkeyup="CalculateTotal(this)"  name ="Montant_réel_du_marché[]" style="width:200px;height:40px" />
            </td>
             <td class="text-center">
              <input type="text"  class="Ecart_du_montant form-control  rounded-0" id="Ecart_du_montant[]"  name ="Ecart_du_montant[]" style="width:200px;height:40px"  readonly />
            </td>
             <td class="text-center">
              <input type="date"  class="Date_de_signature_du_contrat form-control  rounded-0" id="Date_de_signature_du_contrat[]"  onchange="CalculateDate(this)" name ="Date_de_signature_du_contrat[]"  style="width:200px;height:40px" />
            </td>
             <td class="text-center">
              <input type="date"  class="Date_livaison_Production_du_rapport form-control  rounded-0" id="Date_livaison_Production_du_rapport[]"  onchange="CalculateDate(this)"  name ="Date_livaison_Production_du_rapport[]"  style="width:200px;height:40px" />
            </td>
             <td class="text-center">
              <input type="text"  class="Ecart_de_durée form-control  rounded-0" id="Ecart_de_durée[]"  name ="Ecart_de_durée[]" style="width:200px;height:40px"  readonly  />
            </td>
             <td class="text-center">
              <input type="text"  class="form-control  rounded-0" id="Nom_de_entreprise_contractant[]"  name ="Nom_de_entreprise_contractant[]"  style="width:200px;height:40px" />
            </td>
             <td class="text-center">
              <input type="text"  class="form-control  rounded-0" id="Note_appréciation_du_marché[]"  name ="Note_appréciation_du_marché[]"  style="width:200px;height:40px" />
            </td>
             <td class="text-center">
              <input type="text"  class="form-control  rounded-0" id="Commentaire[]"  name ="Commentaire[]"  style="width:200px;height:40px" />
            </td>
            
           <td class="text-center">
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


    function CalculateTotal(ele) {
        var Montant_estimatif_du_Marché = $(ele).closest('tr').find('.Montant_estimatif_du_Marché').val();

        var Montant_réel_du_marché = $(ele).closest('tr').find('.Montant_réel_du_marché').val();

        Montant_estimatif_du_Marché = Montant_estimatif_du_Marché == '' ? 0 : Montant_estimatif_du_Marché;
        Montant_réel_du_marché = Montant_réel_du_marché == '' ? 0 : Montant_réel_du_marché;

        if (!isNaN(Montant_estimatif_du_Marché) && !isNaN(Montant_réel_du_marché)) {
            var total = parseInt(Montant_estimatif_du_Marché) - parseInt(Montant_réel_du_marché);
            $(ele).closest('tr').find('.Ecart_du_montant').val(total);
        }

    }

    function CalculateDate(ele) {
        var Date_de_signature_du_contrat = new Date($(ele).closest('tr').find('.Date_de_signature_du_contrat').val());
        var Date_livaison_Production_du_rapport = new Date($(ele).closest('tr').find('.Date_livaison_Production_du_rapport').val());


        Date_de_signature_du_contrat = Date_de_signature_du_contrat == '' ? 0 : Date_de_signature_du_contrat;
        Date_livaison_Production_du_rapport = Date_livaison_Production_du_rapport == '' ? 0 : Date_livaison_Production_du_rapport;

        if (!isNaN(Date_de_signature_du_contrat) && !isNaN(Date_livaison_Production_du_rapport)) {
            var days = Date_livaison_Production_du_rapport.getDate() - Date_de_signature_du_contrat.getDate();
            $(ele).closest('tr').find('.Ecart_de_durée').val(days);
        }
    }
</script>





@endsection