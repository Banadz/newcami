$(document).ready(function(){
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    const home = document.querySelector('meta[name="home"]').getAttribute('content')
    $('#login_Form').on('submit' , function(ko){
        ko.preventDefault()
        const url = $(this).attr('action')

        const MATRICULE = $('#MATRICULE').val()
        const password = $('#password').val()

        $.ajax({
            url:url,
            type:'POST',
            data:{
                _token:csrfToken,
                MATRICULE,
                password
            },
            dataType:'json',
            success:function(result,status){
                if(result.success){
                    window.location.href = home
                }else{
                    swal('Echèc', result.alert, {
                        icon : "error",
                        buttons: {
                            confirm: {
                                className : 'btn btn-danger'
                            }
                        },
                    })
                }
            }
        })
    })

})

$(document).ready(function(){
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    const home = document.querySelector('meta[name="home"]').getAttribute('content')
    $('#login_Form').on('submit' , function(ko){
        ko.preventDefault()
        const url = $(this).attr('action')

        const MATRICULE = $('#MATRICULE').val()
        const password = $('#password').val()

        $.ajax({
            url:url,
            type:'POST',
            data:{
                _token:csrfToken,
                MATRICULE,
                password
            },
            dataType:'json',
            success:function(result,status){
                if(result.success){
                    window.location.href = home
                }else{
                    swal('Echèc', result.alert, {
                        icon : "error",
                        buttons: {
                            confirm: {
                                className : 'btn btn-danger'
                            }
                        },
                    })
                }
            }
        })
    })

})
