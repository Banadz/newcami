$(document).ready(function(){
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

    // SUPRIMER

    var supSer = $('.deleteCompte')
    supSer.each(function(){
        $(this).on('click', function(def){
            def.preventDefault()
            $tr = $(this).closest('tr');
            var data =  $tr.children("td").map(function(){
                return $(this).text()
            }).get();
            var compte = data[0].trim()
            url = $(this).attr('href')
            $.ajax({
                type:'POST',
                url: url,
                data:{
                    _token:csrfToken,
                    compte:compte
                },
                success:function(response, statut){
                    console.log(response)
                    if (response.success){
                        window.location.reload();
                    }
                }

            })
        })
    })

    // MODIFIER

    var upDiv = $('.updateCompte')
    upDiv.each(function(){
        $(this).on('click', function(def){

            def.preventDefault()
            $tr = $(this).closest('tr');
            var data =  $tr.children("td").map(function(){
                return $(this).text()
            }).get();
            var compte = data[0]
            var label_compte = data[1]
            $('#compte').val(compte)
            $('#label_compte').val(label_compte)


        })
    })

    var fromUp = $('#fromUpdateCompte')
    fromUp.on('submit', function(def){
        def.preventDefault()
        var compte = $(this).serialize()
        url = $(this).attr('action')
        $.ajax({
            type:'POST',
            url: url,
            data:compte,
            success:function(response, statut){
                if (response.success){
                    window.location.reload();
                }else{
                    console.log(response)
                }
            }

        })
    })


})
