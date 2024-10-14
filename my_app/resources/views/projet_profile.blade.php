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



    <!-- Page Content -->
    <div id="page-content-wrapper" style="background-color: white">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>

            </div>
            <ul class="navbar-nav mr-auto">
                <h5 class="text-center">RENSEUGNEMENT</h5>


            </ul>

        </nav>
        <div class="container-fluid" id="get_print">

            <div class="card shadow rounded-0 d-flex">


                <div class="row m-2 align-items-center">
                    <p class="get_messages"></p>



                    <div class="col-md-12">

                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0 " type="text" id="Pays_Two" name="Pays_Two" value="" style="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Pays</label>
                                    </span>


                                </div>
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="text" name="Province_Two" id="Province_Two" style="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Province</label>
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="text" id="Intitule_du_project_Two" name="Intitule_du_project_Two" style="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Intitulé du Projet</label>
                                    </span>

                                </div>
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="text" id="Secteur_activite_Two" name="Secteur_activite_Two" sstyle="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Secteur d'activités du Projet</label>
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="text" placeholder="Type_de_projet" id="Type_de_projet_Two" name="Type_de_projet_Two" style="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Type du Projet</label>
                                    </span>

                                </div>
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="text" id="Zone_intervention_Two" name="Zone_intervention_Two" style="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Zone d'intervention du Projet</label>
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-6">

                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="date" id="Date_approbation_Two" name="Date_approbation_Two" style="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Date d'approbation du projet</label>
                                    </span>

                                </div>
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="date" id="Date_accord_finance_Two" name="Date_accord_finance_Two" style="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Date de l'accord de financement du Projet</label>
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="date" id="Date_entree_Two" name="Date_entree_Two" style="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Date d’entrée en vigueur du Projet</label>
                                    </span>

                                </div>
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="text" id="Duree_projet_Two" name="Duree_projet_Two" style="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Durée du Projet</label>
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="text" placeholder="Coute_projet" id="Coute_projet_Two" style="background:#F5F5F5;font-family:'Roboto'" name="Coute_projet_Two" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Coût total du Projet</label>
                                    </span>

                                </div>
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="text" placeholder="source_financement" id="source_financement_Two" name="source_financement_Two" style="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Sources de financement du Projet</label>
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="text" placeholder="Numero_du_project" id="Numero_du_project_Two" name="Numero_du_project_Two" style="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Numéro de Projet</label>
                                    </span>

                                </div>
                                <div class="col-md-6">
                                    <span class="form-group has-float-label">
                                        <input class="form-control form-control-sm rounded-0 border-0" type="text" placeholder="Coordonnateur_projet" id="Coordonnateur_projet_Two" name="Coordonnateur_projet_Two" style="background:#F5F5F5;font-family:'Roboto'" readonly>

                                        <label for="email" style="font-family: 'Roboto';color:#088FFA">Nom de Coordonnateur du Projet</label>
                                    </span>

                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                               

                            </div>
                        </div>
                        <input type="button" value="modifier" class="btn btn-secondary  rounded-0 border-0" data-toggle="modal" data-target="#exampleModal">
                        <!-- Modal -->














                    </div>

                    <!-- End Tabs on plain Card -->
                </div>


            </div>
        </div>
    </div>





</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">


                    <div class="col-md-12">
                        <form action="" method="post" id="update_form_profile">
                            @csrf
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="unique_code" id="unique_code" value="{{$userInfo->unique_code}}">
                                        <input type="hidden" name="id" id="id" value="{{$userInfo->id}}">
                                        <span class="form-group has-float-label">
                                            <input class="form-control form-control-sm rounded-0 inputs" class="inputs" type="text" name="Pays_edit" id="Pays_edit" value="">

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Pays</label>
                                        </span>

                                    </div>
                                    <div class="col-md-6">
                                        <span class="form-group has-float-label">
                                            <input class="form-control form-control-sm rounded-0 inputs"  class="inputs" type="text" id="Province_edit" name="Province_edit" value="">

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Province</label>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="form-group has-float-label">
                                            <input class="form-control form-control-sm rounded-0" type="text" class="inputs" id="Intitule_du_project_edit" name="Intitule_du_project_edit" value="">

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Intitulé du Projet</label>
                                        </span>

                                    </div>
                                    <div class="col-md-6">
                                        <span class="form-group has-float-label">
                                            <select class="custom-select  form-control-sm rounded-0" id="Secteur_activite_edit" name="Secteur_activite_edit" value="">

                                                <option value="Agriculture/Elevage/Pisciculture">Agriculture/Elevage/Pisciculture</option>
                                                <option value="Forêt et Eau">Forêt et Eau</option>
                                                <option value="Environnement, Climat et Bidiversité">Environnement, Climat et Bidiversité</option>
                                                <option value="Sports, Cultures et Arts">Sports, Cultures et Arts</option>
                                                <option value="Education, Formation professionnelle">Education, Formation professionnelle</option>
                                                <option value="Santé, Hygiène et Assainissement">Santé, Hygiène et Assainissement</option>
                                                <option value="Sécurité, Armée, Police et Affaires intérieures">Sécurité, Armée, Police et Affaires intérieures</option>
                                                <option value="Finances et Institutions fiancières">Finances et Institutions fiancières</option>
                                                <option value="Infrastructures, Aménagement du territoire, Transport, Communication…">Infrastructures, Aménagement du territoire, Transport, Communication…</option>
                                                <option value="Energie/Electricité et Hydrocarbures">Energie/Electricité et Hydrocarbures</option>
                                                <option value="Economie, PME, Entreprenariat et Industries">Economie, PME, Entreprenariat et Industries</option>
                                                <option value="Administration Publique, Territorial et Justice">Administration Publique, Territorial et Justice</option>
                                                <option value="Affaires sociales">Affaires sociales</option>
                                                <option value="Genre et Famille">Genre et Famille</option>
                                                <option value="Peuples Autochtones">Peuples Autochtones</option>
                                                <option value="Mines et Gélologie">Mines et Gélologie</option>
                                                <option value="Catastrophes et Résolution des conflits">Catastrophes et Résolution des conflits</option>
                                                <option value="Recherches scientifiques et Technologiques /R-D">Recherches scientifiques et Technologiques /R-D</option>
                                            </select>

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Secteur d'activités du Projet</label>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="form-group has-float-label">
                                            <select class="custom-select" placeholder="Type_de_projet" id="Type_de_projet_edit" name="Type_de_projet_edit" value="">
                                                <option selected>Type des projet</option>
                                                <option value="Projet de Développement Economique">Projet de Développement Economique</option>
                                                <option value="Projet d'urgence/Humanitaire">Projet d'urgence/Humanitaire</option>

                                            </select>

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Type du Projet</label>
                                        </span>

                                    </div>
                                    <div class="col-md-6">
                                        <span class="form-group has-float-label">
                                            <input class="form-control form-control-sm rounded-0 inputs" class="inputs" type="text" placeholder="Zone_intervention" id="Zone_intervention_edit" name="Zone_intervention_edit" value="">

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Zone d'intervention du Projet</label>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="form-group has-float-label">
                                            <input class="form-control form-control-sm rounded-0 inputs" type="date" class="inputs" placeholder="Date_approbation" value="" id="Date_approbation_edit" name="Date_approbation_edit">

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Date d'approbation </label>
                                        </span>

                                    </div>
                                    <div class="col-md-6">
                                        <span class="form-group has-float-label">
                                            <input class="form-control form-control-sm rounded-0 inputs" type="date"  placeholder="Date_accord_finance" value="" id="Date_accord_finance_edit" name="Date_accord_finance_edit">

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Date de l'accord de financement</label>
                                        </span>


                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="form-group has-float-label">
                                            <input class="form-control form-control-sm rounded-0 " type="date" placeholder="Date_entree" value="" id="Date_entree_edit" name="Date_entree_edit">

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Date d’entrée en vigueur du Projet</label>
                                        </span>

                                    </div>
                                    <div class="col-md-6">
                                        <span class="form-group has-float-label">
                                            <input class="form-control form-control-sm rounded-0 inputs" type="number" placeholder="Duree_projet" id="Duree_projet_edit" name="Duree_projet_edit" value="" min="1">

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Durée du Projet</label>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                   
                                    <div class="col-md-12">
                                        <span class="form-group has-float-label">
                                            <input class="form-control form-control-sm rounded-0 inputs" type="number" placeholder="Coute_projet" id="Coute_projet_edit" name="Coute_projet_edit" value="" min="100">

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Coût total du Projet</label>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="form-group has-float-label">
                                            <input class="form-control form-control-sm rounded-0 inputs" type="text" placeholder="source_financement" id="source_financement_edit" name="source_financement_edit" value="">

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Sources de financement du Projet</label>
                                        </span>

                                    </div>
                                    <div class="col-md-6">
                                        <span class="form-group has-float-label">
                                            <input class="form-control form-control-sm rounded-0 inputs" type="text" placeholder="Numero_du_project" id="Numero_du_project_edit" name="Numero_du_project_edit" value="">

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Numéro de Projet</label>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="form-group has-float-label">
                                            <input class="form-control form-control-sm rounded-0" type="text" placeholder="Coordonnateur_projet" id="Coordonnateur_projet_edit" name="Coordonnateur_projet_edit" value="">

                                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Nom de Coordonnateur du Projet</label>
                                        </span>

                                    </div>

                                </div>
                            </div>
                            <img src="{{url('/images/loader.gif')}}" alt="" id="loader" style="display: none;" width="30">
                            <input type="submit" name="" value="SAVEGARDEZ" class="btn btn-dark btn-block rounded-0" id="update_profile_btn">


                        </form>
                    </div>
                </div>
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
$(".inputs").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.inputs').focus();
    }
});
    $("#update_form_profile").submit(function(e) {
        e.preventDefault();



        $.ajax({
            url: '{{ route("update_profile_method")}}',
            method: 'post',
            data: $(this).serialize(),

            
            success: function(res) {

                if (res.status == 200) {
                    $(".modal").modal('hide');
                    toastr.success('le fichier sauvegarder');
                    fetch_Profile_Two();



                }




            }

        })


    })

    fetch_Profile();

    function fetch_Profile() {

        var id = $("#unique_code").val();

        $.ajax({
            url: '{{ route("fetchAll_Profile_METHOD")}}',
            method: 'get',
            data: {
                id: id,
            },
            success: function(res) {



                $("#Pays_edit").val(res[0].Pays);
                $("#Province_edit").val(res[0].Province);
                $("#Intitule_du_project_edit").val(res[0].Intitule_du_project);
                $("#Secteur_activite_edit").val(res[0].Secteur_activite);
                $("#Type_de_projet_edit").val(res[0].Type_de_projet);
                $("#Zone_intervention_edit").val(res[0].Zone_intervention);
                $("#Date_approbation_edit").val(res[0].Date_approbation);
                $("#Date_accord_finance_edit").val(res[0].Date_accord_finance);
                $("#Date_entree_edit").val(res[0].Date_entree);
                $("#Duree_projet_edit").val(res[0].Duree_projet);
                $("#Periode_excution_edit").val(res[0].Periode_excution);
                $("#Coute_projet_edit").val(res[0].Coute_projet);
                $("#source_financement_edit").val(res[0].source_financement);
                $("#Numero_du_project_edit").val(res[0].Numero_du_project);
                $("#Coordonnateur_projet_edit").val(res[0].Coordonnateur_projet);



            }
        })


    }
    fetch_Profile_Two();

    function fetch_Profile_Two() {

        var id = $("#unique_code").val();

        $.ajax({
            url: '{{ route("fetchAll_Profile_METHOD")}}',
            method: 'get',
            data: {
                id: id,
            },
            success: function(res) {

                $("#Pays_Two").val(res[0].Pays);
                $("#Province_Two").val(res[0].Province);
                $("#Intitule_du_project_Two").val(res[0].Intitule_du_project);
                $("#Secteur_activite_Two").val(res[0].Secteur_activite);
                $("#Type_de_projet_Two").val(res[0].Type_de_projet);
                $("#Zone_intervention_Two").val(res[0].Zone_intervention);
                $("#Date_approbation_Two").val(res[0].Date_approbation);
                $("#Date_accord_finance_Two").val(res[0].Date_accord_finance);
                $("#Date_entree_Two").val(res[0].Date_entree);
                $("#Duree_projet_Two").val(res[0].Duree_projet);
                $("#Periode_excution_Two").val(res[0].Periode_excution);
                $("#Coute_projet_Two").val(res[0].Coute_projet);
                $("#source_financement_Two").val(res[0].source_financement);
                $("#Numero_du_project_Two").val(res[0].Numero_du_project);
                $("#Coordonnateur_projet_Two").val(res[0].Coordonnateur_projet);











            }
        })


    }
</script>







@endsection