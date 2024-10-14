@extends('layouts.app')


@section('title', 'Resultat Cadre')




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
                                <form action="" method="post" id="admin_resultat_logique_form">
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
                                            <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=1353 style='width:1015.0pt;margin-left:.25pt;border-collapse:collapse'>
                                                <tr style='height:26.4pt'>
                                                    <td width=57 nowrap valign=bottom style='width:43.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:26.4pt'></td>
                                                    <td width=604 colspan=2 style='width:453.0pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:26.4pt'>

                                                    </td>
                                                    <td width=131 style='width:98.0pt;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'></td>
                                                    <td width=131 style='width:98.0pt;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'></td>
                                                    <td width=87 style='width:65.0pt;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'></td>
                                                    <td width=72 style='width:.75in;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'></td>
                                                    <td width=68 style='width:51.0pt;padding:0in 5.4pt 0in 5.4pt;height:26.4pt'></td>
                                                    <td width=204 nowrap valign=bottom style='width:153.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:26.4pt'></td>
                                                </tr>
                                                <tr style='height:.2in'>
                                                    <td width=57 rowspan=2 style='width:43.0pt;border:solid windowtext 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Code de Réf.</span></b></p>
                                                    </td>
                                                    <td width=473 rowspan=2 style='width:355.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Indicateur</span></b></p>
                                                    </td>
                                                    <td width=131 rowspan=2 style='width:98.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Composante</span></b></p>
                                                    </td>
                                                    <td width=131 rowspan=2 style='width:98.0pt;border:solid windowtext 1.0pt;
  border-left:none;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Sous-Composante</span></b></p>
                                                    </td>
                                                    <td width=131 rowspan=2 style='width:98.0pt;border:solid windowtext 1.0pt;
  border-left:none;background:#FFF2CC;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Valeur de Référence</span></b></p>
                                                    </td>
                                                    <td width=87 rowspan=2 style='width:65.0pt;border:solid windowtext 1.0pt;
  border-left:none;background:#FFF2CC;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Valeur Cible</span></b></p>
                                                    </td>
                                                    <td width=140 colspan=2 style='width:105.0pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  background:#FFF2CC;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Performance</span></b></p>
                                                    </td>
                                                    <td width=204 rowspan=2 style='width:153.0pt;border:solid windowtext 1.0pt;
  border-left:none;background:#F8CBAD;padding:0in 5.4pt 0in 5.4pt;height:.2in'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Commentaire</span></b></p>
                                                    </td>
                                                </tr>

                                                <tr style='height:14.5pt'>
                                                    <td width=72 style='width:.75in;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>Réalisé</span></b></p>
                                                    </td>

                                                    <td width=68 style='width:51.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FFF2CC;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                        <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='font-size:10.0pt;font-family:
  "Arial",sans-serif;color:black'>%</span></b></p>
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
                                        <div id="show_cadreResult_two"></div>

                                    </div>
                                </form>


                            </div>



                        </div>



                    </div>

                </div>
                <div class="tab-pane" id="updates" style="background-color: white;">
                    <div class="details">

                        <form action="" method="post">

                            <input type="hidden" name="unique_code" id="unique_code" value="{{$userInfo->unique_code}}">
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
                                        <div id="show_cadreResult"></div>

                                    </div>



                                </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>
        @endif


    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="edit_cadreModal" tabindex="-1" role="dialog" aria-labelledby="edit_cadreModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="#" method="post" id="update_record_cadre_form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_cadreModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">


                    <input type="hidden" class="form-control form-control-sm " id="unique_code_edit" name="unique_code_edit" value="{{$userInfo->unique_code}}" />
                    <input type="hidden" class="form-control form-control-sm " id="id_edit" name="id_edit" />


                    <div class="form-outline mb-2">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control form-control-sm rounded-0" id="Code_de_réf_edit" name="Code_de_réf_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Code de Réf.</label>
                        </span>

                    </div>

                    <div class="form-outline mb-2">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control form-control-sm" id="Indicateur_edit" name="Indicateur_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Indicateur</label>
                        </span>

                    </div>

                    <div class="form-outline mb-2">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control form-control-sm" id="Composante_edit" name="Composante_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Composante</label>
                        </span>

                    </div>
                    <div class="form-outline mb-2">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control form-control-sm" id="Sous_composante_edit" name="Sous_composante_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Sous-Composante</label>
                        </span>

                    </div>
                    <div class="form-outline mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control form-control-sm" id="Valeur_de_Référence_edit" name="Valeur_de_Référence_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Valeur de Référence</label>
                        </span>

                    </div>
                    <div class="form-outline mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control form-control-sm" id="Valeur_cible_edit" name="Valeur_cible_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Valeur Cible</label>
                        </span>

                    </div>
                    <div class="form-outline mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control form-control-sm" id="Réalisé_edit" name="Réalisé_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Réalisé/Performance</label>
                        </span>

                    </div>



                    <div class="form-outline mb-2 rounded-0">
                        <span class="form-group has-float-label">
                            <input type="text" class="form-control form-control-sm" id="Comentaire_edit" name="Comentaire_edit" />

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Commentaire</label>
                        </span>

                    </div>


                    <input type="submit" name="" value="update" class="btn btn-dark btn-block rounded-0" id="update_ptba_btn">



                </div>


            </div>
        </form>
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

        $("#admin_resultat_logique_form").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("add_resultats_logique") }}',
                method: 'post',
                dataType: 'json',
                data: $(this).serialize(),

                success: function(res) {
                    if (res.status == 200) {
                        toastr.success('sauvergader avec succes!');

                        $("#admin_resultat_logique_form")[0].reset();
                        fetchAll_CadreResult();
                    }




                }

            })

        });




        //================= FECTH ALL PREVIEWS RECORD PTBA FROM THE DATABASE BEFORE UPDATING ============  //

        $(document).on('click', '.edit_cadre_btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');


            $.ajax({
                url: '{{ route("edit_cadre_logique")}}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {


                    $("#Code_de_réf_edit").val(res.Code_de_réf);
                    $("#Indicateur_edit").val(res.Indicateur);
                    $("#Composante_edit").val(res.Composante);
                    $("#Sous_composante_edit").val(res.Sous_Composante);

                    $("#Valeur_de_Référence_edit").val(res.Valeur_de_Référence);
                    $("#Valeur_cible_edit").val(res.Valeur_cible);
                    $("#Réalisé_edit").val(res.Réalisé);
                    $("#Percentage_edit").val(res.Percentage);
                    $("#Comentaire_edit").val(res.Comentaire);
                    $("#unique_code").val(res.unique_code);
                    $("#id_edit").val(res.id);



                }
            })
        })




        // ============ UPDATE RECORD ================== //

        $("#update_record_cadre_form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route("update_project_cadre_records")}}',
                method: 'post',
                data: $(this).serialize(),
                error: function(res) {
                    console.log(res);
                },
                success: function(res) {
                    if (res.status == 200) {
                        toastr.success('sauvergader avec succes!');

                        $("#edit_cadreModal").modal('hide');
                        fetchAll_CadreResult();
                    }



                }
            })

        });


        $(document).on('click', '.delet_cadre_btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '{{ route("delete_cadre_record")}}',
                method: 'post',
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    toastr.success('supprimer avec succes!');
                    fetchAll_CadreResult();

                }
            })




        })

        fetchAll_CadreResult();

        function fetchAll_CadreResult() {
            $("#my_year_picker_two").on('change', function() {
                var year = $("#my_year_picker_two").val();
                var unique_code = $("#unique_code").val();

                $.ajax({
                    url: '{{ route("fetchAll_CadreResult_method")}}',
                    method: 'get',
                    data: {
                        unique_code: unique_code,
                        year: year
                    },


                    success: function(res) {
                        $("#show_cadreResult").html(res);
                        $("#DD").DataTable({
                            responsive: "true",


                        });

                    }
                })
            })
            $("#my_year_picker_three").on('change', function() {
                var year = $("#my_year_picker_three").val();
                var unique_code = $("#unique_code").val();

                $.ajax({
                    url: '{{ route("fetchAll_CadreResult_method_Two")}}',
                    method: 'get',
                    data: {
                        unique_code: unique_code,
                        year: year
                    },


                    success: function(res) {
                        $("#show_cadreResult_two").html(res);
                        $("#cardre_table_two").DataTable({
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


    })





    $(document).ready(function() {



        var rowIdx = 0;

        // jQuery button click event to add a row.
        $('#addBtn').on('click', function() {


            // Adding a row inside the tbody.
            $('#tbody').append(`<tr id="R${++rowIdx}">
       
    
            <input type="hidden"  class="budjet form-control"  id="unique_code[]"  name = "unique_code[]" value="{{$userInfo->unique_code}}"  />
            <td class="text-center">
              <input type="text"  class="form-control rounded-0" id="Code_de_réf[]" name="Code_de_réf[]" style="width:200px;height:25px"  />
            </td>
            <td class="text-center">
              <input type="text"  class="form-control  rounded-0" name="Indicateur[]" id="Indicateur[]"  style="width:200px;height:25px"   />
            </td>
            <td class="text-center">
              <input type="text"  class="form-control  rounded-0"  id="Composante[]"  name="Composante[]"    style="width:200px;height:25px"/>
            </td>
            
            <td class="text-center">
            <input type="text"  class="form-control  rounded-0" id="Sous_Composante[]" name ="Sous_Composante[]"  style="width:200px;height:25px"/>
            </td>
             <td class="text-center">
              <input type="text"  class="form-control  rounded-0"  id="Valeur_de_Référence[]" name ="Valeur_de_Référence[]"  style="width:200px;height:25px"  />
            </td>
             <td class="text-center">
              <input type="text"  class="Valeur_cible form-control  rounded-0" id="Valeur_cible[]"  name ="Valeur_cible[]" onkeyup="Calculate(this)" style="width:200px;height:25px"/>
            </td>
             <td class="text-center">
              <input type="text"  class="Réalisé form-control  rounded-0" id="Réalisé[]"  name ="Réalisé[]" style="width:200px;height:25px"  onkeyup="Calculate(this)" />
            </td>
             <td class="text-center">
              <input type="text"  class="Percentage form-control  rounded-0" id="Percentage[]"  name ="Percentage[]" style="width:200px;height:25px"  readonly  />
            </td>
           
             <td class="text-center">
              <input type="text"  class="form-control  rounded-0" id="Comentaire[]"  name ="Comentaire[]"  style="width:200px;height:25px" />
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

    function Calculate(ele) {
        var Valeur_cible = $(ele).closest('tr').find('.Valeur_cible').val();

        var Réalisé = $(ele).closest('tr').find('.Réalisé').val();

        Valeur_cible = Valeur_cible == '' ? 0 : Valeur_cible;
        Réalisé = Réalisé == '' ? 0 : Réalisé;
        if (!isNaN(Valeur_cible) && !isNaN(Réalisé)) {
            var total = (parseInt(Réalisé) / parseInt(Valeur_cible)) * 100;
            $(ele).closest('tr').find('.Percentage').val(total.toFixed(0.5));
        }

    }
</script>



@endsection