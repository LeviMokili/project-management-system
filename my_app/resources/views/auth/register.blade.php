@extends('layouts.app')


@section('title', 'Login')




@section('content')
<div class="container-fluid">
   <div class="row d-flex justify-content-center align-items-center my-5">
      <div class="col-lg-4">
         <div class="card shadow">
            <h1 class="text-center py-4">Creez les utilisateurs</h1>
            <div class="card-body">
               <div id="show_succes_message"></div>
               <form action="#" method="post" id="register_form">
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
                           <div class="input-group-text"><ion-icon name="person-outline"></ion-icon></div>
                        </div>
                        <input type="text" class="form-control" id="unique_code" placeholder="unique_code" name="unique_code">
                     </div>
                     <div class="invalid-feedback"></div>
                  </div>
                  <div class="mb-3">
                     <div class="input-group mb-2">
                        <div class="input-group-prepend">
                           <div class="input-group-text"><ion-icon name="person-outline"></ion-icon></div>
                        </div>
                        <input type="text" class="form-control" id="code_project" placeholder="code_project" name="code_project">
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
                 

                  <div class="mb-3 ">
                     <input type="submit" name="" value="Register" class="btn btn-dark btn-block rounded-0" id="register_btn">
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
      $("#register_form").submit(function(e) {
         e.preventDefault();
         //.val('please wait ...');
        

         $.ajax({
            url: '{{route("auth.register")}}',
            method: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(res) {
               console.log(res);
               $("#register_form")[0].reset();
            }
         })

      })
   })
</script>
@endsection