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
                        profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a href="{{route('projet_profile')}}" class="list-group-item list-group-item-action " style="font-size: 14px;" style="color: white;"><ion-icon name="person-circle-outline">Profile </ion-icon> </a>

                    </div>
                </li>

            </ul>



        </nav>
        
        <div class="row p-2  " style="margin-top: 50px;">
            <div class="col-md-8">
                <h1 style="font-family: 'Roboto';" class="text-center">Documents Rapport
                    <hr width="100">
                </h1>
            </div>
            <div class="col-md-4 ">
                <form action="" method="post">
                    @csrf
                    <input type="button" value="Ajouter le rapport" class="btn-block btn rounded-0" data-toggle="modal" data-target="#exampleModal" style="font-family: 'Roboto';">
                </form>
            </div>
        </div>



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
                            <span class="form-group has-float-label">
                                <input type="text" name="my_file_name" id="my_file_name" class="form-control rounded-0 mb-2">

                                <label for="email" style="font-family: 'Roboto';color:#088FFA">Province</label>
                            </span>
                            <input type="hidden" name="unique_code" id="unique_code" value="{{$userInfo->unique_code}}">
                            <input type="file" name="upload_file" id="upload_file" class="form-control rounded-0" multiple>
                            <input type="submit" class="btn btn-dark" value="upload" id="upload_btn">
                        </form>
                    </div>

                </div>
            </div>
        </div>



        <!-- Page Content -->
        <div id="page-content-wrapper" style="background-color: white">


        

            <!--<img src="storage/images/pdf_image.png" width="100" class="img-thumbnail " style="margin-left:50px">-->

            @if(Request::is('add_rapport'))


            <form action="" method="post" id="delet_file_form">

                <div class="row container" id="show_all_projectFiles">

                    <div class="row">

                    </div>


                </div>
            </form>





            @else

            @endif


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



        $("#upload_form").submit(function(e) {
            e.preventDefault();
            var  id = $("#unique_code").val();
            $.ajax({
                url: '{{ route("add_rapport")}}',
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
                    if (res.status == 200) {

                        $("#exampleModal").modal('hide');
                        toastr.success('Fichier sauvergader avec success');

                        $("#upload_form")[0].reset();
                        fecthAllFiles_Rapport()


                        console.log(res);
                    }
                    if (res.status == 400) {
                        showError('my_file_name', res.messages.my_file_name);
                        showError('upload_file', res.messages.upload_file);
                    }if (res.status == 401) {
                        toastr.error('le fichier exist deja');
                    } 
                    

                }
            })
        });


        $(document).on('click', '.delet_file_btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');

            $.ajax({
                url: '{{ route("delete_file_rapport_record")}}',
                method: 'post',
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    toastr.success('Fichier suprimer avec success');
                    fecthAllFiles_Rapport();

                }
            })
        });
        fecthAllFiles_Rapport();

        function fecthAllFiles_Rapport() {
            $unique_code = $("#unique_code").val();
            $.ajax({
                url: '{{ route("fetchAllFiles_Rapport") }}',
                method: 'get',

                data: {
                    unique_code: $unique_code,
                    _token: '{{csrf_token()}}'
                },
                success: function(res) {
                    $("#show_all_projectFiles").html(res);




                }


            })
        }


    })
</script>


@endsection