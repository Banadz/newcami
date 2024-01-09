$(document).ready(function(){
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    $('#infoDem').DataTable()
    const oldInfoDem = $('#infoDem').DataTable()
    oldInfoDem.destroy()
    const infoTable = $('#infoDem').DataTable({
        "columnDefs": [
            {
                "targets": 4, // Indice de la 4ème colonne (commençant à zéro)
                "render": function(data, type, row) {
                return '<div contenteditable="true">' + data + '</div>';
                }
            }
        ]
    });

    $('#demandeW').DataTable()
    // INSERTION..

    // $('#id_categorie').on('change' , function(){
    //     var id_categorie = $("#id_categorie option:selected").val();
    //     url = $(this).attr('target')

    //     $.ajax({
    //         url:url,
    //         type:'POST',
    //         data:{
    //             _token:csrfToken,
    //             id_categorie:id_categorie
    //         },
    //         dataType:'json',
    //         success:function(result,status){
    //             $('.choiceArticle').each(function(){
    //                 $(this).remove()
    //             })
    //             if(result.articles[0]){
    //                 var res = result.articles;
    //                 $.each(res, function(i,v){
    //                     $('#article').append(`<option class="choiceArticle" value="`+v["id"]+`" title="`
    //                                             +v["DESIGNATION"]+`" data-target ="`+v["SPECIFICATION"]+`">`
    //                                             +v["id"]+` | `+v["DESIGNATION"]+` `+v["SPECIFICATION"]+`</option>`);
    //                 });
    //             }else{
    //                 $('#article').append('<option class="choiceArticle" value="">Aucun(s) article(s) correspondant(s)</option>');

    //             }

    //         }
    //     })
    // })

    // $('#article').on('change', function(ko){
    //     $("#quantite").val(0);
    // })

    // // QUANTITE CONTROL...........
    // $('#quantite').on('input' , function(ko){
    //     ko.preventDefault()
    //     var url = $(this).attr('target')
    //     article = $("#article option:selected").val()
    //     // alert($(this).val())
    //     $.ajax({
    //         type:'POST',
    //         url: url,
    //         data:{
    //             _token:csrfToken,
    //             article:article
    //         },
    //         success:function(response, statut){
    //             // console.log(response)
    //             if (response.success){
    //                 // $("#categorieUpdate").modal('show')
    //                 // $('#unite').val(response.article['0'].UNITE)
    //                 quant = $("#quantite").val();
    //                 if (quant > response.article['0'].EFFECTIF){
    //                     $('#quantite').removeClass('is-valid');
    //                     $('#quantite').addClass('is-invalid');
    //                     $('#quantite').addClass('champs-invalide');
    //                 }else{
    //                     $('#quantite').removeClass('champs-invalide');
    //                     $('#quantite').removeClass('is-invalid');
    //                     $('#quantite').addClass('is-valid');
    //                 }

    //             }else{
    //                  alert(`Impossible de se connecter au serveur à l’adresse `+window.location+`.`)

    //             }
    //         }

    //     })
    // })

    // $('#quantite').on('input', function(){
    //     var champs = $(this).val()
    //     var newValue = champs.replace(/\D/g, '')
    //     $(this).val(newValue)
    // })

    // $('#quantite').on('focus' , function(ko){
    //     ko.preventDefault()
    //     var url = $(this).attr('target')
    //     article = $("#article option:selected").val()

    //     $.ajax({
    //         type:'POST',
    //         url: url,
    //         data:{
    //             _token:csrfToken,
    //             article:article
    //         },
    //         success:function(response, statut){
    //             // console.log(response)
    //             if (response.success){
    //                 $('#unite').val(response.article['0'].UNITE)
    //             }else{
    //                  alert(`Impossible de se connecter au serveur à l’adresse `+window.location+`.`)

    //             }
    //         }

    //     })
    // })
    $('#id_categorie').on('change' , function(){
        $('#defaultCat').remove()
        var id_categorie = $("#id_categorie option:selected").val();
        url = $(this).attr('target')

        $.ajax({
            url:url,
            type:'POST',
            data:{
                _token:csrfToken,
                id_categorie:id_categorie
            },
            dataType:'json',
            success:function(result,status){
                $('.choiceArticle').each(function(){
                    $(this).remove()
                })
                if(result.articles[0]){
                    var res = result.articles;
                    $.each(res, function(i,v){
                        $('#article').append(`<option class="choiceArticle" value="`+v["id"]+`" title="`
                                                +v["DESIGNATION"]+`" data-target ="`+v["SPECIFICATION"]+`">`
                                                +v["id"]+` | `+v["DESIGNATION"]+` `+v["SPECIFICATION"]+`</option>`);
                    });
                }else{
                    $('#article').append('<option class="choiceArticle" value="">Aucun(s) article(s) correspondant(s)</option>');

                }

            }
        })
    })
    $('#article').on('change', function(ko){
        $("#quantite").val('');
        $("#unite").val('');
        $('#defaultArt').remove()
    })
    // QUANTITE CONTROL...........
    $('#quantite').on('input' , function(ko){
        ko.preventDefault()
        var url = $(this).attr('target')
        var article = $("#article option:selected").val()
        // alert(article)
        // alert($(this).val())
        $.ajax({
            type:'POST',
            url: url,
            data:{
                _token:csrfToken,
                article:article
            },
            success:function(response, statut){
                // console.log(response)
                if (response.success){
                    // $("#categorieUpdate").modal('show')
                    // $('#unite').val(response.article['0'].UNITE)
                    quant = $("#quantite").val();
                    if (quant > response.article['0'].EFFECTIF){
                        $('#quantite').removeClass('is-valid');
                        $('#quantite').addClass('is-invalid');
                        $('#quantite').addClass('champs-invalide');
                    }else{
                        $('#quantite').removeClass('champs-invalide');
                        $('#quantite').removeClass('is-invalid');
                        $('#quantite').addClass('is-valid');
                    }

                }else{
                    alert(`Impossible de se connecter au serveur à l’adresse `+window.location+`.`)
                }
            }

        })
    })

    $('#quantite').on('input', function(){
        var champs = $(this).val()
        var newValue = champs.replace(/\D/g, '')
        $(this).val(newValue)
    })

    $('#quantite').on('focus' , function(ko){
        ko.preventDefault()
        var url = $(this).attr('target')
        var article = $("#article option:selected").val()
        // alert(article)
        if (article == 0){
            alert("Veuillez choisir un article d'abord.")
        }
        else{

            $.ajax({
                type:'POST',
                url: url,
                data:{
                    _token:csrfToken,
                    article:article
                },
                success:function(response, statut){
                    // console.log(response)
                    if (response.success){
                        $('#unite').val(response.article['0'].UNITE)
                    }else{
     alert(`Impossible de se connecter au serveur à l’adresse `+window.location+`.`)
                    }
                }

            })
        }
    })

    // VALIDATION ADDITION....
    var form = $(".putArtForm")
    const formulaire = $('#addArticle');
    const oldtableau = $('#alt-pg-dt').DataTable()
    oldtableau.destroy()
    const tableau = $('#alt-pg-dt').DataTable({
        "columnDefs": [
            {
                "targets": 3, // Indice de la 4ème colonne (commençant à zéro)
                "render": function(data, type, row) {
                return '<div contenteditable="true">' + data + '</div>';
                }
            }
        ]
    });
    $(formulaire).on('submit', function(pre){
        pre.preventDefault()
        // if ($('#quantite').hasClass('is-invalid')) {
        //     alert("quantité invalide");
        // } else {
            var id = $('#article option:selected').val();
            var designation = $('#article option:selected').attr('title');
            var specification = $('#article option:selected').attr('data-target');
            var quantite = $('#quantite').val();
            var unite = $('#unite').val();
            var action = `<td>
                                <div class="table-actions">
                                    <a href="#" class="supprimer" title="Supprimer"><i class="ik ik-trash-2"></i></a>
                                </div>
                            </td>`

            tableau.row.add([
                id,
                designation,
                specification,
                quantite,
                unite,
                action
            ]).draw();

            var nombreDeLignes = $('#alt-pg-dt').DataTable().rows().count();
            $('#voirDem').html(`Voir demande<span class="badge bg-primary">`+nombreDeLignes+`</span>`)
            $("#addArticle")[0].reset();
        // }

    })

    // TRASH IN THE LIST
    $('#alt-pg-dt tbody').on('click', '.supprimer', function () {
        const row = tableau.row($(this).parents('tr'));
        row.remove().draw();
        var nombreDeLignes = $('#alt-pg-dt').DataTable().rows().count();
        $('#voirDem').html(`Voir demande<span class="badge bg-primary">`+nombreDeLignes+`</span>`)
        if (1 > nombreDeLignes){
            $('#pannier').modal('toggle')
            $('#voirDem').html(`Voir demande`)
        }
    });

    // POST....
    $("#toValide").on('submit', function(ko){
        ko.preventDefault()
        const donnees = $('#alt-pg-dt').DataTable().rows().data().toArray();

        var nombreDeLignes = $('#alt-pg-dt').DataTable().rows().count();
        if (1 > nombreDeLignes){
            alert("Votre liste est vide")
            $('#pannier').modal('toggle')
            $('#voirDem').html(`Voir demande`)
        }else{

            const donneesJSON = JSON.stringify(donnees);
            var url = $(this).attr('target')
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token:csrfToken,
                    donnees: donneesJSON
                },
                success: function(response) {
                    alert(response.ref);
                    window.location.reload()
                }
            });

        }
    })


    // VALIDATION.........


    $('#demandeW tbody').on('click', '.info', function (de) {
        de.preventDefault()
        $tr = $(this).closest('tr');
        var data =  $tr.children("td").map(function(){
            return $(this).text()
        }).get();
        var ref = data[0]
        var url = $(this).attr('href')
        $.ajax({
            type:'POST',
            url: url,
            data:{
                _token:csrfToken,
                ref:ref
            },
            success:function(response, statut){
                // console.log(response)
                if (response.success){
                    $('#ref_dem').html(`Réference: `+ref)
                    infoTable.clear().draw();
                    $.each(response.demandes, function(i,v){
                        infoTable.row.add([
                            v['id'],
                            v['article']['DESIGNATION'] +` `+v['article']['SPECIFICATION'],
                            v['article']['EFFECTIF'],
                            v['QUANTITE'],
                            0,
                            v['UNITE']
                        ]).draw();
                    })

                }else{
                    alert(`Impossible de se connecter au serveur à l’adresse `+window.location+`.`)
                }
            }

        })
    })

    // ENVOYER VALIDATION....

    $("#formValidDem").on('submit', function(ko){
        ko.preventDefault()
        var reference = $('#ref_dem').attr('data-target')
        alert(reference)
        // const donnees = $('#infoDem').DataTable().rows().data().toArray();
        // const donneesJSON = JSON.stringify(donnees);
        // url = $(this).attr('target')
        // $.ajax({
        //     url: url,
        //     method: 'POST',
        //     data: {
        //         _token:csrfToken,
        //         reference:reference,
        //         donnees: donneesJSON
        //     },
        //     success: function(response) {
        //         alert(response.ref);
        //         window.location.reload()
        //     }
        // });


    })

    // REFUSER DEMANDE..............

    $('body').on('click', "#refuseDem",function(){
        // alert('demande refusée')
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token:csrfToken,
                reference:reference,
                donnees: donneesJSON
            },
            success: function(response) {
                alert('demande refusé: Tantareka!');
                window.location.reload()
            }
        });
    })

})
