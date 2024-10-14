@extends('layouts.app')


@section('title', 'Catégorie de fonds')




@section('content')



<div class="d-flex bg-dark" id="wrapper">
    <!-- Sidebar -->

    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text  text-uppercase border-bottom"><a href="{{route('admin_dash')}}"> BML software</a></div>
        <div class="list-group list-group-flush my-3">
        <a href="{{ route('show_files')}}" class="list-group-item list-group-item-action shadow " type="button" style="font-size: 14px;"><i class="fas fa-power-off me-2"></i> Fichiers</a>
            <a href="{{route('admin_dash_categorie_depense')}}" class="list-group-item list-group-item-action shadow " style="font-size: 14px;"><i class="fas fa-power-off me-2"></i>Catégorie de fonds</a>
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
                        Autre information sur le projet
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
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
                                            <a class="nav-link active" href="#home" data-toggle="tab">Ajouter les details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#updates" data-toggle="tab"> Imprimer</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#view" data-toggle="tab"> Visualiser et modifier le contenu</a>
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

                                            <form action="" method="post" id="admin_dash_categorie_depense">
                                                @csrf



                                                <div class="container-fluid pt-4">
                                                    <div class="table-responsive">


                                                        <table border=0 cellspacing=0 cellpadding=0 width=736 style='width:552.0pt;border-collapse:collapse'>
                                                            <tr style='height:21.65pt'>
                                                                <td width=56 nowrap rowspan=2 style='width:42.0pt;border:solid windowtext 1.0pt;
  border-bottom:solid black 1.0pt;background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;
  height:21.65pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='color:black'>N°</span></b></p>
                                                                </td>
                                                                <td width=260 nowrap rowspan=2 style='width:195.0pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='color:black'>Intitulé de la
                                                                                catégorie</span></b></p>
                                                                </td>
                                                                <td width=105 nowrap rowspan=2 style='width:79.0pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='color:black'>Montant</span></b></p>
                                                                </td>
                                                                <td width=80 nowrap rowspan=2 style='width:60.0pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='color:black'>%</span></b></p>
                                                                </td>
                                                                <td width=235 colspan=3 style='width:176.0pt;border:none;border-bottom:solid windowtext 1.0pt;
  background:#FCE4D6;padding:0in 5.4pt 0in 5.4pt;height:21.65pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='color:black'>Source de
                                                                                financement</span></b></p>
                                                                </td>
                                                            </tr>
                                                            <tr style='height:14.5pt'>
                                                                <td width=75 style='width:56.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='color:black'>Source 1</span></b></p>
                                                                </td>
                                                                <td width=80 style='width:60.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='color:black'>Source 2</span></b></p>
                                                                </td>
                                                                <td width=80 style='width:60.0pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#FCE4D6;
  padding:0in 5.4pt 0in 5.4pt;height:14.5pt'>
                                                                    <p class=MsoNormal align=center style='margin-bottom:0in;text-align:center;
  line-height:normal'><b><span lang=EN-GB style='color:black'>Source 3</span></b></p>
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

                            <div class="tab-pane" id="updates" style="background-color: white;">

                                <form action="" method="post" id="get_categories">





                                    <div class="">
                                        <div id="show_categorie_depense"></div>

                                    </div>

                                </form>

                            </div>
                            <div class="tab-pane" id="view" style="background-color: white;">

                                <form action="" method="post" id="get_categories">





                                    <div class="">
                                        <div id="show_categorie_depense_one"></div>

                                    </div>

                                </form>

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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="#" method="post" id="update_record_form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">


                        <input type="hidden" name="get_recode_id" id="get_recode_id">
                        <input type="hidden" name="update_budjet_edit" id="update_budjet_edit" value="{{$userInfo->Coute_projet}}">



                        <div class="form-outline mb-2">
                            <input type="text" class="form-control form-control-sm" id="Intitule_edit" name="Intitule_edit" />

                        </div>

                        <div class="form-outline mb-2">
                            <input type="text" class="form-control form-control-sm" id="montant_edit" name="montant_edit" />

                        </div>

                        <div class="form-outline mb-2">
                            <input type="text" class="form-control form-control-sm" id="source_1_edit" name="source_1_edit" />

                        </div>
                        <div class="form-outline mb-2">
                            <input type="text" class="form-control form-control-sm" id="source_2_edit" name="source_2_edit" />

                        </div>
                        <div class="form-outline mb-2 rounded-0">
                            <input type="text" class="form-control form-control-sm" id="source_3_edit" name="source_3_edit" />

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




<script type="text/javascript">
    $(function() {




        $(document).on('click', '.delet_btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');


            $.ajax({
                url: '{{ route("delete_record")}}',
                method: 'post',
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    toastr.success('suprimer avec succes!');
                    fetchAll_Categorie_Depense();

                }
            });


        });










        //================= FECTH ALL PREVIEWS RECORD FROM THE DATABASE BEFORE UPDATING ============  //

        $(document).on('click', '.edit_btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '{{ route("edit")}}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    $("#Intitule_edit").val(res.Intitule);
                    $("#montant_edit").val(res.montant);
                    $("#source_1_edit").val(res.source_1);
                    $("#source_2_edit").val(res.source_2);
                    $("#source_3_edit").val(res.source_3);
                    $("#get_recode_id").val(res.id);
                    $("#update_budjet_edit").val();



                }
            })
        })




        // ============ UPDATE RECORD ================== //

        $("#update_record_form").submit(function(e) {
            e.preventDefault();

           
            $.ajax({
                url: '{{ route("update_project_records")}}',
                method: 'post',
                data: $(this).serialize(),
                success: function(res) {

                    if (res.status == 200) {
                        $("#editModal").modal('hide');
                        toastr.success('modifier avec succes!');
                        $("#update_record_form")[0].reset();
                        fetchAll_Categorie_Depense();
                        
                    }
                }
            })

        });




        $("#admin_dash_categorie_depense").submit(function(e) {
            e.preventDefault();


            $.ajax({

                url: '{{ route("add_categorie_depense") }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                error: function(res) {
                    console.log(res);
                },
                success: function(res) {
                    toastr.success('sauvergader avec succes!');
                    $("#admin_dash_categorie_depense")[0].reset();
                    fetchAll_Categorie_Depense();
                   

                }
            })
        });



        fetchAll_Categorie_Depense();

        function fetchAll_Categorie_Depense() {


            var unique_code = $("#unique_code").val();
            $.ajax({
                url: '{{ route("fetchAll_Categorie_Depense")}}',
                method: 'get',
                data: {
                    unique_code: unique_code
                },
                success: function(res) {
                    $("#show_categorie_depense").html(res);


                    $("#my_table").DataTable({
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


            $.ajax({
                url: '{{ route("fetchAll_Categorie_Depense_TWO")}}',
                method: 'get',
                data: {
                    unique_code: unique_code
                },
                success: function(res) {
                    $("#show_categorie_depense_one").html(res);

                  



                }
            })
        }

       





    })





    $(document).ready(function() {



        var rowIdx = 0;

        // jQuery button click event to add a row.
        $('#addBtn').on('click', function() {


            // Adding a row inside the tbody.
            $('#tbody').append(`<tr id="R${++rowIdx}">
          <td class="row-index text-center">
                <p>${rowIdx}</p>
                
                <input type="hidden"  class="budjet form-control" onkeyup="CalculateTotal(this)" id="update_budjet" name="update_budjet"  value="{{$userInfo->Coute_projet}}" readonly />
                <input type="hidden"  class="budjet form-control"  id="unique_code[]"  name = "unique_code[]" value="{{$userInfo->unique_code}}"  />
              
                </td>
               
            <td class="text-center">
              <input type="text"  class="form-control rounded-0  input-key" id="Intitule[]" name="Intitule[]"  />
            </td>
            <td class="text-center">
              <input type="text"  class="montant form-control  rounded-0  input-key" onkeyup="CalculateTotal(this)"  name="montant[]" id="montant[]"   />
            </td>
            <td class="text-center">
              <input type="text"  class="percentage form-control  rounded-0  input-key "  id="percentage[]"  name="percentage[]"   readonly/>
            </td>
            
            <td class="text-center">
            <input type="text"  class="form-control  rounded-0  input-key" id="source_1[]" name ="source_1[]" />
            </td>
             <td class="text-center">
              <input type="text"  class="form-control  rounded-0"  id="source_2[]" name ="source_2[]"   />
            </td>
             <td class="text-center">
              <input type="text"  class="form-control  rounded-0" id="source_3[]"  name ="source_3[]"  />
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
        var rate = $(ele).closest('tr').find('.budjet').val();
        var quantity = $(ele).closest('tr').find('.montant').val();
        rate = rate == '' ? 0 : rate;
        quantity = quantity == '' ? 0 : quantity;
        if (!isNaN(rate) && !isNaN(quantity)) {
            var total = (parseInt(quantity) / parseInt(rate)) * 100;
            $(ele).closest('tr').find('.percentage').val(total.toFixed(1));
        }
        CalculateGrandTotal();
    }

    function CalculateGrandTotal() {
        var grandTotal = 0;
        $.each($('#orderdetailsItems').find('.percentage'), function() {
            if ($(this).val() != '' && !isNaN($(this).val())) {
                grandTotal += parseFloat($(this).val());
            }
        });
        $('#lblGrandTotal').html(grandTotal.toFixed());
    }
</script>





@endsection