$(document).ready(function(){
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

    function verification(array, colonne, valeur){
        for (var i = 0; i < array.length; i++){
            if (array[i][colonne] === valeur){
                return true
            }
        }

        return false
    }

    $('#compte').on('change' , function(){
        $('.choisirCompte').each(function(){
            $(this).remove()
        })
        var compte = $("#compte option:selected").val();
        url = $(this).attr('target')

        $.ajax({
            url:url,
            type:'POST',
            data:{
                _token:csrfToken,
                compte:compte
            },
            dataType:'json',
            success:function(result,status){
                $('.choiceCategorie').each(function(){
                    $(this).remove()
                })
                if(result.categories[0]){
                    var res = result.categories;
                    $.each(res, function(i,v){
                        $('#id_categorie').append(`<option class="choiceCategorie" value="`+v["id"]+`">`
                                                +v["id"]+` | `+v["LABEL_CATEGORIE"]+`</option>`);
                    });
                }else{
                    $('#id_categorie').append('<option class="choiceCategorie" value="">Aucun(s) article(s) correspondant(s)</option>');

                }

            }
        })

    })

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
    // QUANTITE CHAMPS

    $('#quantite').on('input', function(){
        var champs = $(this).val()
        var newValue = champs.replace(/\D/g, '')
        $(this).val(newValue)
    })

    $('#prix_unitaire').on('input', function(){
        var champs = $(this).val()
        var newValue = champs.replace(/\D/g, '')
        $(this).val(newValue)
        var article = $("#article option:selected").val()
        if (article == 0){
            alert("Veuillez choisir un article d'abord.")
            $(this).val('')
        }else{
            // alert($('#quantite').val())
            if (    ($('#quantite').val() != 0) || ($('#quantite').val() != '')  ){
                $montant = newValue * $('#quantite').val()
                $('#montant').val($montant)
            }else{
                alert("Saisir l'effectif d'abord")
                $(this).val('')
            }
        }
    })

    $('#montant').on('input', function(){
        var champs = $(this).val()
        var newValue = champs.replace(/\D/g, '')
        $(this).val(newValue)
        var article = $("#article option:selected").val()
        if (article == 0){
            alert("Veuillez choisir un article d'abord.")
            $(this).val('')
        }
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
                        console.log("ERROR")
                    }
                }

            })
        }
    })

    // VALIDATION ADDITION....
    var form = $(".putArtForm")
    const formulaire = $('#addArticle');
    const tableau = $('#alt-pg-dt').DataTable()
    tableau.column(7).visible(false)

    $(formulaire).on('submit', function(pre){
        pre.preventDefault()
        var id_origine = $('#id_origine option:selected').val().trim();
        var id = $('#article option:selected').val();
        var designation = $('#article option:selected').attr('title');
        var specification = $('#article option:selected').attr('data-target');
        var quantite = $('#quantite').val();
        var unite = $('#unite').val();
        var prix = $('#prix_unitaire').val();
        var montant = $('#montant').val();
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
            prix,
            montant,
            id_origine,
            action
        ]).draw();

        var nombreDeLignes = $('#alt-pg-dt').DataTable().rows().count();
        $('#voirDem').html(`<i class="ik ik-clipboard"></i> Voir liste <span class="badge bg-primary">`+nombreDeLignes+`</span>`)
        $("#addArticle")[0].reset();


    })

    // TRASH IN THE LIST
    $('#alt-pg-dt tbody').on('click', '.supprimer', function () {
        const row = tableau.row($(this).parents('tr'));
        row.remove().draw();
        var nombreDeLignes = $('#alt-pg-dt').DataTable().rows().count();
        $('#voirDem').html(`<i class="ik ik-clipboard"></i> Voir liste <span class="badge bg-primary">`+nombreDeLignes+`</span>`)
        if (1 > nombreDeLignes){
            $('#pannier').modal('toggle')
            $('#voirDem').html(`<i class="ik ik-clipboard"></i> Voir liste`)
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
            $('#voirDem').html(`<i class="ik ik-clipboard"></i> Voir liste`)
        }else{

            const donneesJSON = JSON.stringify(donnees);
            const nfact = $('#facture').val()
            url = $(this).attr('target')
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token:csrfToken,
                    donnees: donneesJSON,
                    nfact:nfact
                },
                success: function(response) {
                    alert(response.ref);
                    window.location = 'http://127.0.0.1:8000/article'
                },
                error: function(error) {
                    alert(`Impossible de se connecter au serveur à l’adresse `+window.location+`.`)
                }
            });

        }
    })




    // MODIFIER

    // var upCat = $('.updateArticle')
    // upCat.each(function(){
    //     $(this).on('click', function(def){
    //         def.preventDefault()
    //         $('#id').hide()
    //         $tr = $(this).closest('tr');
    //         var data =  $tr.children("td").map(function(){
    //             return $(this).text()
    //         }).get();
    //         var id = data[0]
    //         $('#id').val(id)
    //         url = $(this).attr('href')
    //         $.ajax({
    //             type:'POST',
    //             url: url,
    //             data:{
    //                 _token:csrfToken,
    //                 id:id
    //             },
    //             success:function(response, statut){
    //                 // console.log(response)
    //                 if (response.success){
    //                     $("#categorieUpdate").modal('show')
    //                     $('#label_categorie').val(response.categorie['0'].LABEL_CATEGORIE)

    //                     $.each(response.comptes, function(i,v){
    //                         if (v["COMPTE"] == response.categorie['0'].COMPTE){
    //                             $('#compte').append(`<option value="`+v["COMPTE"]+`" selected>`+v["COMPTE"]+` | `+v["LABEL_COMPTE"]+`</option>`)
    //                         }else{
    //                             $('#compte').append(`<option value="`+v["COMPTE"]+`">`+v["COMPTE"]+` | `+v["LABEL_COMPTE"]+`</option>`)
    //                         }
    //                     })

    //                 }else{
    //                     console.log("ERROR")
    //                 }
    //             }

    //         })
    //     })
    // })


})
