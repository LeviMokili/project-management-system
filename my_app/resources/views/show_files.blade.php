@extends('layouts.app')






@section('content')




<div class="d-flex bg-dark" id="wrapper">
    <!-- Sidebar -->


    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text  text-uppercase border-bottom"><a href="{{route('admin_dash')}}"> BML software</a></div>
        <div class="list-group list-group-flush my-3">
            <a href="" class="list-group-item list-group-item-action shadow " type="button" style="font-size: 14px;" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-power-off me-2"></i> Ajouter Doc</a>

            <a href="{{route('admin_dash_categorie_depense')}}" class="list-group-item list-group-item-action shadow " style="font-size: 14px;"><i class="fas fa-power-off me-2"></i>Catégorie de dépenses</a>
            <a href="{{route('admin_dashPTBA')}}" class="list-group-item list-group-item-action" style="font-size: 14px;"><i class="fas fa-paperclip me-2"></i> PTBA</a>
            <a href="{{route('admin_dashPassation_Marchés')}}" class="list-group-item list-group-item-action" style="font-size: 14px;"><i class="fas fa-paperclip me-2"></i> Passation des Marchés</a>
            <a href="{{route('admin_dashCadre_Résultats_Logique')}}" class="list-group-item list-group-item-action" style="font-size: 14px;"><i class="fas fa-paperclip me-2"></i>Cadre des Résultats-Logique</a>
            <a href="{{route('add_photoVideo')}}" class="list-group-item list-group-item-action" style="font-size: 14px;"><i class="fas fa-paperclip me-2"></i> Photo & Vidéo</a>

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
                        <input type="file" name="upload_file" id="upload_file" class="form-control rounded-0">
                        <input type="submit" class="btn btn-dark" value="upload" id="upload_btn">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper" style="background-color: white">



        <!--<img src="storage/images/pdf_image.png" width="100" class="img-thumbnail " style="margin-left:50px">-->

        @if(Request::is('show_files'))


        <form action="" method="post" id="delet_file_form">
            <div class="row mt-4 container" id="show_all_projectFiles">




            </div>
        </form>





        @else

        @endif


    </div>
</div>
@endsection


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('script')



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
            $.ajax({
                url: '{{ route("upload_file")}}',
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
                    if (res.status == 401) {
                        toastr.error('le fichier exist deja');
                      
                    }if (res.status == 200) {
                     
                        $("#exampleModal").modal('hide');
                        toastr.success('Fichier a été sauvergader avec succes');
                        fecthAllFiles();
                    } 

                }
            })
        });


        $(document).on('click', '.delet_file_btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let upload_file = $("#upload_file").val();
            $.ajax({
                url: '{{ route("delete_file_record")}}',
                method: 'post',
                data: {
                    id: id,
                    upload_file:upload_file,
                    _token: '{{csrf_token()}}'
                },
                error:function(res){
                  console.log(res);
                },
                success: function(res) {
                    var result = confirm('Voulez vous vraiment suprimer le fichier?');
                    if (!result) {
                        return false;
                    }else{

                    toastr.success('Fichier suprimer avec success');
                    fecthAllFiles();
                    }
                   

                }
            })
        });
        fecthAllFiles();

        function fecthAllFiles() {
            $unique_code = $("#unique_code").val();
            $.ajax({
                url: '{{ route("fetchAllFiles") }}',
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