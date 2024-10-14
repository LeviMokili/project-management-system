@extends('layouts.app')


@section('title', 'Login')




@section('content')

<div class="container-fluid px-4" style="margin-top: -30px;">

    <div class="row d-flex justify-content-center">

        <div class="col-lg-10">
            <div class="card shadow rounded-0">

                <div class="card-body">
                    <div id="show_login_alert"></div>
                    <form action="#" method="post" id="project_reg_form" autocomplete="off">
                        @csrf
                        <input type="hidden" name="unique_code" id="unique_code" value="{{$userInfo->unique_code}}">
                        <input type="hidden" name="code_project" id="code_project" value="{{$userInfo->code_project}}">
                        <input type="hidden" name="email" id="email" value="{{$userInfo->email}}">

                        <div class="row">
                            <div class="col">
                                <span class="form-group has-float-label">
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control form-control-sm rounded-0" id="Pays" autocomplete="off" name="Pays">
                                    </div>
                                    <div class="invalid-feedback"></div>

                                    <label for="email" style="font-family: 'Roboto';color:#088FFA">Pays</label>
                                </span>

                            </div>
                            <div class="col">
                                <span class="form-group has-float-label">
                                    <div class="input-group mb-2">

                                        <input type="text" class="form-control form-control-sm rounded-0" id="Province" autocomplete="off" name="Province">
                                    </div>
                                    <div class="invalid-feedback"></div>
                                    <label for="email" style="font-family: 'Roboto';color:#088FFA">Province</label>
                                </span>

                            </div>

                        </div>

                        <span class="form-group has-float-label">
                            <div class="input-group mb-2">

                                <input type="text" class="form-control form-control-sm rounded-0" id="Intitule_du_project" autocomplete="off" name="Intitule_du_project">
                                <div class="invalid-feedback"></div>
                            </div>
                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Intitulé du Projet</label>
                        </span>



                        <span class="form-group has-float-label">
                            <div class="input-group mb-2 ">
                                <div class="input-group">


                                    <select class="custom-select  form-control-sm rounded-0" id="Secteur_activite" name="Secteur_activite">

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
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Secteur d'activités du Projet</label>
                        </span>


                        <span class="form-group has-float-label">
                            <div class="input-group mb-2">

                                <select class="custom-select form-control-sm rounded-0" id="inputGroupSelect01" name="Type_de_projet">

                                    <option value="Projet de Développement Economique">Projet de Développement Economique</option>
                                    <option value="Projet d'urgence/Humanitaire">Projet d'urgence/Humanitaire</option>

                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Type du Projet</label>
                        </span>



                        <span class="form-group has-float-label">
                            <div class="input-group mb-2">

                                <input type="text" class="form-control form-control-sm rounded-0"  autocomplete="off" name="Zone_intervention" id="Zone_intervention">
                                <div class="invalid-feedback"></div>
                            </div>
                            <label for="email" style="font-family: 'Roboto';color:#088FFA">Zone d'intervention du Projet</label>
                        </span>

                        <div class="row">
                            <div class="col">
                                <span class="form-group has-float-label">
                                    <div class="input-group mb-2">

                                        <input type="date" class="form-control" id="Date_approbation" autocomplete="off" name="Date_approbation">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <label for="email" style="font-family: 'Roboto';color:#088FFA">Date d'approbation </label>
                                </span>

                            </div>
                            <div class="col">
                                <span class="form-group has-float-label">
                                    <div class="input-group mb-2">

                                        <input type="date" class="form-control  form-control-sm rounded-0" id="Date_accord_finance" autocomplete="off" name="Date_accord_finance">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <label for="email" style="font-family: 'Roboto';color:#088FFA">Date de l'accord de financement</label>
                                </span>

                            </div>
                            <div class="col">
                                <span class="form-group has-float-label">
                                    <div class="input-group mb-2">

                                        <input type="date" class="form-control  form-control-sm rounded-0" id="Date_entree" autocomplete="off" name="Date_entree">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <label for="email" style="font-family: 'Roboto';color:#088FFA">Date d’entrée en vigueur du Projet</label>
                                </span>


                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <span class="form-group has-float-label">
                                    <div class="input-group mb-2">

                                        <input type="text" class="form-control  form-control-sm rounded-0" autocomplete="off" id="Duree_projet" name="Duree_projet">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <label for="email" style="font-family: 'Roboto';color:#088FFA">Durée du Projet</label>
                                </span>

                            </div>
                           
                        </div>

                        <div class="row">
                            <div class="col">
                                <span class="form-group has-float-label">
                                    <div class="input-group mb-2">

                                        <input type="text" class="form-control  form-control-sm rounded-0"  autocomplete="off" id="Coute_projet" name="Coute_projet">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <label for="email" style="font-family: 'Roboto';color:#088FFA">Coût total du Projet</label>
                                </span>

                            </div>
                            <div class="col">
                                <span class="form-group has-float-label">
                                    <div class="input-group mb-2">

                                        <input type="text" class="form-control  form-control-sm rounded-0" autocomplete="off" id="source_financement" name="source_financement">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <label for="email" style="font-family: 'Roboto';color:#088FFA">Sources de financement</label>
                                </span>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <span class="form-group has-float-label">
                                    <div class="input-group mb-2">

                                        <input type="text" class="form-control  form-control-sm rounded-0" autocomplete="off" id="Numero_du_project" name="Numero_du_project">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <label for="email" style="font-family: 'Roboto';color:#088FFA">Numéro de Projet</label>
                                </span>

                            </div>
                            <div class="col">
                                <span class="form-group has-float-label">
                                    <div class="input-group mb-2">

                                        <input type="text" class="form-control  form-control-sm rounded-0"  autocomplete="off" id="Coordonnateur_projet" name="Coordonnateur_projet">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <label for="email" style="font-family: 'Roboto';color:#088FFA">Nom de Coordonnateur du Projet</label>
                                </span>

                            </div>
                        </div>
                        <img src="{{url('images/Spinner-2.gif')}}" alt="" srcset="" width="35" id="spinner" style="display: none;">
                        <div class="mb-3 ">
                            <input type="submit" name="" value="Engistrer" class="btn btn-dark btn-block rounded-0" id="project_reg_btn">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</div>



@endsection


@section('script')
<script>
    $("#project_reg_form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("create_project_function")}}',
            method: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            error: function(res) {
                console.log(res);
            },

            success: function(res) {
                if (res.status == 400) {
                    showError('Pays', res.messages.Pays);
                    showError('Province', res.messages.Province);
                    showError('Intitule_du_project', res.messages.Intitule_du_project);
                    showError('Secteur_activite', res.messages.Secteur_activite);
                    showError('Type_de_projet', res.messages.Type_de_projet);
                    showError('Zone_intervention', res.messages.Zone_intervention);
                    showError('Date_approbation', res.messages.Date_approbation);
                    showError('Date_accord_finance', res.messages.Date_accord_finance);
                    showError('Date_entree', res.messages.Date_entree);
                    showError('Duree_projet', res.messages.Duree_projet);
                    showError('Periode_excution', res.messages.Periode_excution);
                    showError('Coute_projet', res.messages.Coute_projet);
                    showError('source_financement', res.messages.source_financement);
                    showError('Numero_du_project', res.messages.Numero_du_project);
                    showError('Coordonnateur_projet', res.messages.Coordonnateur_projet);

                } else if (res.status == 200) {
                    alert('okay sir');
                    window.location = '{{route("admin_dash")}}';
                }
            }

        })
    });
</script>

@endsection