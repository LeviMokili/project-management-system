@extends('layouts.app')


@section('title', 'Login')




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




    <!-- Page Content -->
    <div id="page-content-wrapper" style="background-color: white;">
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

        <div class="row p-2  " style="margin-top: 20px;">
            <div class="col-md-8">

            </div>
            <div class="col-md-4 ">
                <form action="" method="post">
                    @csrf
                    <input type="button" value="Ajouter les fichers" class="btn-block btn rounded-0" data-toggle="modal" data-target="#exampleModal_One" style="font-family: 'Roboto';">
                </form>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal_One" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form action="" method="post" id="upload_form_ONE" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-2">

                                <select class="custom-select form-control-sm rounded-0" id="inputGroupSelect01" name="file_type" id="file_type">

                                    <option value="Photo">Photo</option>
                                    <option value="Video">Video</option>

                                </select>
                            </div>
                            <span class="form-group has-float-label">
                                <input type="text" name="my_file_name" id="my_file_name" class="form-control form-control-sm rounded-0  mb-2">

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Le nom de ficher</label>
                            </span>
                            <span class="form-group has-float-label">
                                <input type="file" name="upload_file" id="upload_file" class="form-control form-control-sm rounded-0 ">

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">choisir le fichier ficher</label>
                            </span>
                            <input type="hidden" name="unique_code" id="unique_code" value="{{$userInfo->unique_code}}">
                            <input type="submit" class="btn btn-dark" value="upload" id="upload_btn">
                        </form>
                    </div>

                </div>
            </div>
        </div>



        <!-- Page Content -->
        <div id="page-content-wrapper" style="background-color: white">





            <div class="container">
                <div class="row">
                    <div class="col-xs-12 ">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> <ion-icon name="videocam-outline"></ion-icon> Videos</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <ion-icon name="images-outline"></ion-icon> Photos</a>

                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form action="" method="post" id="delet_file_video_form">
                                    <div class="container-fluid">
                                        <div class="row " id="show_all_projectFiles_Video">

                                            <div class="row ">

                                            </div>


                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form action="" method="post" id="delet_file_form">

                                    <div class="row container-fluid" id="show_all_projectFiles_Photo">

                                        <div class="row">

                                        </div>


                                    </div>
                                </form>
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
    // ADD PROJECT FILE
    $(function() {



        $("#upload_form_ONE").submit(function(e) {
            e.preventDefault();
            var id = $("#unique_code").val();
            $.ajax({
                url: '{{ route("add_video_photo_method")}}',
                method: 'post',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                error: function(res) {
                    console.log(res);
                },
                success: function(res) {


                    if (res.status == 400) {
                        toastr.error("le fichier n'est une photo");
                        fecthAllFiles_Photo();
                    }
                    if (res.status == 401) {
                        toastr.danger("le fichier exist deja!!");
                        fecthAllFiles_Photo();
                    }
                    if (res.status == 200) {
                        toastr.success('le fichier sauvegarder');
                        $("#exampleModal_One").modal('hide');
                        fecthAllFiles_Photo();
                    }
                    if (res.status == 402) {
                        toastr.error("le fichier n'est une video");
                        fecthAllFiles_Video()
                    }
                    if (res.status == 403) {
                        toastr.danger("le fichier exist deja!!");
                        fecthAllFiles_Video()
                    }
                    if (res.status == 203) {
                        toastr.success('le fichier sauvegarder');
                        $("#exampleModal_One").modal('hide');
                        fecthAllFiles_Video()
                    }





                }
            })
        });


        $(document).on('click', '.delet_file_photo_btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');

            $.ajax({
                url: '{{ route("delete_file_photo_record")}}',
                method: 'post',
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    toastr.success('Fichier suprimer avec success');
                    fecthAllFiles_Photo();

                }
            })
        });
        $(document).on('click', '.delet_file_video_btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');

            $.ajax({
                url: '{{ route("delete_file_video_record")}}',
                method: 'post',
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    toastr.success('Fichier suprimer avec success');
                    fecthAllFiles_Video();

                }
            })
        });
        fecthAllFiles_Photo();

        function fecthAllFiles_Photo() {
            $unique_code = $("#unique_code").val();
            $.ajax({
                url: '{{ route("fetchAllFiles_Photo") }}',
                method: 'get',

                data: {
                    unique_code: $unique_code,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    $("#show_all_projectFiles_Photo").html(res);




                }


            })
        }
        fecthAllFiles_Video();

        function fecthAllFiles_Video() {
            $unique_code = $("#unique_code").val();
            $.ajax({
                url: '{{ route("fetchAllFiles_Video") }}',
                method: 'get',

                data: {
                    unique_code: $unique_code,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    $("#show_all_projectFiles_Video").html(res);




                }


            })
        }


    })
</script>


@endsection