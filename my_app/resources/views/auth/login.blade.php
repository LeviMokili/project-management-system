@extends('layouts.app')


@section('title', 'Login')




@section('content')

<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center my-5">
        <div class="col-lg-4">
            <div class="card shadow">
                <h1 class="text-center py-4">Se connecter</h1>
                <div class="card-body">
                    <div id="show_login_alert"></div>
                    <form action="#" method="post" id="login_form">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><ion-icon name="person-outline"></ion-icon></div>
                                </div>
                                <input type="text" class="form-control" id="email" placeholder="email" name="email">
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><ion-icon name="lock-closed-outline"></ion-icon></div>
                                </div>
                                <input type="password" class="form-control" id="password" placeholder="password" name="password">
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                         <img src="{{url('images/Spinner-2.gif')}}" alt="" srcset="" width="35" id="spinner" style="display: none;">
                        <div class="mb-3 ">
                            <input type="submit" name="" value="Se connecter" class="btn btn-dark btn-block rounded-0" id="login_btn">
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
    $(function() {
        $("#login_form").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{route("auth.login")}}',
                method: 'post',
                dataType: 'json',
                data: $(this).serialize(),
                error:function(res){
                   console.log(res);
                },
                success: function(res) {

                    if (res.status == 400) {
                        showError('email', res.messages.email);
                        showError('password', res.messages.password);
                    } else if (res.status == 401) {

                        $("#show_login_alert").html(showMessage('danger', res.messages));

                    }else if(res.status == 402){
                        window.location = '{{ route("admin_dash")}}';
                    }
                     else {
                        if (res.status == 200 && res.messages == 'success') {
                           alert("logged in");
                           $("#login_form")[0].reset();
                           window.location = '{{ route("create_project")}}'
                          
                        }
                    }
                }
            })

        })
    })
</script>
@endsection