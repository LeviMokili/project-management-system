@extends('layouts.app')



@section('content')




<div class="d-flex bg-dark" id="wrapper">
    <!-- Sidebar -->


    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text  text-uppercase "><a href="{{route('admin_dash')}}"> BML software</a></div>
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
    <div id="page-content-wrapper" style="background-color: white;">
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
                        Profile du projet
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a href="{{route('projet_profile')}}" class="list-group-item list-group-item-action " style="font-size: 14px;" style="color: white;"><ion-icon name="person-circle-outline">Profile </ion-icon> </a>

                    </div>
                </li>

            </ul>



        </nav>

        <!-- Tabs on Plain Card -->
        <div class="card card-nav-tabs card-plain">
            <div class="card-header card-header-danger">
                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#Ptba" data-toggle="tab">Ptba</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#updates" data-toggle="tab"> Passation </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="tab-content text-center">
                    <input type="text" class="form-control form-control-sm rounded-0" name="my_year_picker" id="my_year_picker" placeholder="choisir l'année" readonly />

                    <div class="tab-pane active" id="Ptba">
                        <div class="row">
                            <div id="show_ptba_result">

                            </div>
                        </div>
                        <div class="row">
                            <div id="show_ptba_result_2">

                            </div>
                        </div>
                        <div class="row">
                            <div id="show_ptba_result_3">
   
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane mb-4" id="updates" style="background-color: white;">
                        <div class="details">

                       
                        <div class="row mb-4">
                            <div id="show_ptba_result_4">

                            </div>
                        </div>
                        <div class="row mb-4">
                            <div id="show_ptba_result_5">
   
                            </div>
                        </div>

                        </div>

                    </div>
                   


                </div>


            </div>
        </div>
    </div>






</div>



</div>
@endsection


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('script')

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx2 = document.getElementById('myChart2');

    new Chart(ctx2, {
        type: 'polarArea',
        data: {
            labels: ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>




<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
</script>
<script>
    $(function() {
        $("#my_year_picker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true,
            forceParse: false

        });



        fetchAll_PTBA();

        function fetchAll_PTBA() {

            $("#my_year_picker").on('change', function() {
                var unique_code = $("#unique_code").val();
                var year = $("#my_year_picker").val();


                $.ajax({
                    url: '{{ route("fetchAll_PTBA_ADMIN_ONE")}}',
                    method: 'get',
                    data: {
                        unique_code: unique_code,
                        year: year
                    },
                    error: function(res) {
                        console.log(res);
                    },
                    success: function(res) {
                        $("#show_ptba_result").html(res);
                        $("#ptba_result_situation_global").DataTable({
                            searching: false,
                            paging: false,
                            info: false,
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
                    url: '{{ route("fetchAll_PTBA_COMPOSANTE")}}',
                    method: 'get',
                    data: {
                        unique_code: unique_code,
                        year: year
                    },
                    error: function(res) {
                        console.log(res);
                    },
                    success: function(res) {
                        $("#show_ptba_result_2").html(res);
                        console.log(res);

                    }
                })
                $.ajax({
                    url: '{{ route("fetchAll_PTBA_SOUS_COMPOSANTE")}}',
                    method: 'get',
                    data: {
                        unique_code: unique_code,
                        year: year
                    },
                    error:function(res){
                        console.log(res);
                    },
                    success: function(res) {
                        $("#show_ptba_result_3").html(res);
                        $("#table_passasion_3").DataTable({
                            searching: false,
                            paging: false,
                            info: false,
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
                    url: '{{ route("fetchAll_PASSATION_ONE_ADMIN")}}',
                    method: 'get',
                    data: {
                        unique_code: unique_code,
                        year: year
                    },
                    error:function(res){
                        console.log(res);
                    },
                    success: function(res) {
                      console.log(res);
                      $("#show_ptba_result_4").html(res);
                      $("#table_passasion_4").DataTable({
                            searching: false,
                            paging: false,
                            info: false,
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
                    url: '{{ route("fetchAll_PASSATION_TWO_ADMIN")}}',
                    method: 'get',
                    data: {
                        unique_code: unique_code,
                        year: year
                    },
                    error:function(res){
                        console.log(res);
                    },
                    success: function(res) {
                      console.log(res);
                      $("#show_ptba_result_5").html(res);
                      $("#table_passasion_5").DataTable({
                            searching: false,
                            paging: false,
                            info: false,
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
                });

            })

        }
    })
</script>


@endsection