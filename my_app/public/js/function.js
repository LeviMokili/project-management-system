function showError(field, message){
    if(!message){
        $("#"+field)
        .addClass('is-valid')
        .removeClass('is-invalid')
        .siblings(".invalid-feedback")
        .text('')
    }else{
        $("#"+field)
        .addClass('is-invalid')
        .removeClass('is-valid')
        .siblings(".invalid-feedback")
        .text(message)
    }
 
}


function removeValidationClasses(form){
  $(form).each(function(){
     $(form).find(':input').removeClass('is-valid is-invalid ');
  })
}


function  showMessage(type, message){

    return `

    <div class="alert alert-${type}" role="alert" data-auto-dismiss="3000" id="success_message" style="display: none;">
            <strong>${message}</strong>
    </div>
    
    
    `;
}