$(document).ready(function(){
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    const controlQual = document.querySelector('meta[name="controlQual-route"]').getAttribute('content')
    const user = document.querySelector('meta[name="user-type"]').getAttribute('content')
    $('#infoDem').DataTable()
    $('#livred_dem').DataTable({
        "searching": true,
        "lengthMenu":[3, 10, 20, 50, 100],
        "pageLength":3,
    })
    const oldInfoDem = $('#infoDem').DataTable()
    oldInfoDem.destroy()
    const infoTable = $('#infoDem').DataTable({
        // "columnDefs": [
        //     {
        //         "targets": 4, // Indice de la 4ème colonne (commençant à zéro)
        //         "render": function(data, type, row) {
        //         return '<div contenteditable="true">' + data + '</div>';
        //         }
        //     }
        // ],
        "searching": true,
        "lengthMenu":[3, 10, 20, 50, 100],
        "pageLength":3,
    });

    const livringData = $('#valid_dem').DataTable({
        "columnDefs": [
            {
                "targets": 5, // Indice de la 4ème colonne (commençant à zéro)
                "render": function(data, type, row) {
                return '<div contenteditable="true">' + data + '</div>';
                }
            }
        ],
        "lengthMenu":[3, 10, 20, 50, 100],
        "pageLength":3,
    });

    $('#demandeW').DataTable()
    $('#demandeL').DataTable()
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
        const id_categorie = $("#id_categorie option:selected").val();
        const url = $(this).attr('target')

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
                    const id_article = $("#article option:selected").val()
                    var quantite = `<label for="quantite">Quantité</label>
                    <input type="number" name=`+id_article+` target=`+controlQual+`
                    class="form-control kwantite" id="quantite" placeholder="Effectif" required>`

                    $("#spaceQuant").html(quantite)
                }else{
                    $('#article').append('<option class="choiceArticle" value="">Aucun(s) article(s) correspondant(s)</option>');

                }

            }
        })
    })
    $('#article').on('change', function(ko){
        $("#quantite").val('');
        const id_article = $("#article option:selected").val()

        var quantite = `<label for="quantite">Quantité</label>
        <input type="number" name=`+id_article+` target=`+controlQual+`
        class="form-control kwantite" id="quantite" placeholder="Effectif" required>`

        $("#spaceQuant").html(quantite)
        $("#unite").val('');
        $('#defaultArt').remove()
    })
    // QUANTITE CONTROL...........
    $('body').on('input', '.kwantite' , function(ko){
        ko.preventDefault()
        const objectif = $(this)
        var url = $(this).attr('target')
        var article = objectif.attr('name')
        ControlQant(article, url, objectif)
        // $.ajax({
        //     type:'POST',
        //     url: url,
        //     data:{
        //         _token:csrfToken,
        //         article:article
        //     },
        //     success:function(response, statut){
        //         // console.log(response)
        //         if (response.success){
        //             // $("#categorieUpdate").modal('show')
        //             // $('#unite').val(response.article['0'].UNITE)
        //             quant = objectif.val();
        //             if (quant > response.article['0'].EFFECTIF){
        //                 objectif.removeClass('is-valid');
        //                 objectif.addClass('is-invalid');
        //                 objectif.addClass('champs-invalide');

        //             }else{
        //                 objectif.removeClass('champs-invalide');
        //                 objectif.removeClass('is-invalid');
        //                 objectif.addClass('is-valid');
        //             }

        //         }else{
        //             swal("Problème de connexion", "Veuillez réessayer plutard", {
        //                 icon : "error",
        //                 buttons: {
        //                     confirm: {
        //                         className : 'btn btn-danger'
        //                     }
        //                 },
        //             }).then((Delete) => {
        //                 if (Delete) {
        //                     window.location.reload()
        //                 }
        //             })
        //         }
        //     }

        // })
    })

    function ControlQant(cible, url, source){
        const input = source.val();
        $.ajax({
            type:'POST',
            url: url,
            data:{
                _token:csrfToken,
                article:cible
            },
            success:function(response, statut){
                // console.log(response)
                if (response.success){
                    // $("#categorieUpdate").modal('show')
                    // $('#unite').val(response.article['0'].UNITE)

                    const reference = response.article['0'].EFFECTIF
                    if (input > reference){
                        source.removeClass('is-valid');
                        source.addClass('is-invalid');
                        source.addClass('champs-invalide');

                    }else{
                        source.removeClass('champs-invalide');
                        source.removeClass('is-invalid');
                        source.addClass('is-valid');
                    }

                }else{
                    swal("Problème de connexion", "Veuillez réessayer plutard", {
                        icon : "error",
                        buttons: {
                            confirm: {
                                className : 'btn btn-danger'
                            }
                        },
                    }).then((Delete) => {
                        if (Delete) {
                            window.location.reload()
                        }
                    })
                }
            }

        })
    }

    $('body').on('input', '.kwantite', function(){
        var champs = $(this).val()
        var newValue = champs.replace(/\D/g, '')
        $(this).val(newValue)
    })

    $('body').on('focus', '#quantite' , function(ko){
        ko.preventDefault()
        var url = $(this).attr('target')
        var article = $("#article option:selected").val()

        if (article == 0){
            swal("Attention", "Veuillez choisir un article d'abord", {
                icon : "warning",
                buttons: {
                    confirm: {
                        className : 'btn btn-warning'
                    }
                },
            })
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
                        swal("Problème de connection", `Impossible de se connecter au serveur à l’adresse `+window.location+`.`, {
                            icon : "Echec",
                            buttons: {
                                confirm: {
                                    className : 'btn btn-danger'
                                }
                            },
                        })
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
        "searching": true,
        "lengthMenu":[3, 10, 20, 50, 100],
        "pageLength":3,
    });

    $(formulaire).on('submit', function(pre){
        pre.preventDefault()
        if ($('#quantite').hasClass('is-invalid')) {
            swal('Echèc', `La quantité requise est en excée`,{
                icon : "error",
                buttons: {
                    confirm: {
                        className : 'btn btn-danger'
                    }
                },
            })
        } else {
            var id = $('#article option:selected').val();
            var designation = $('#article option:selected').attr('title');
            var specification = $('#article option:selected').attr('data-target');
            // var quantite = $('#quantite').val();
            var unite = $('#unite').val();
            var quantite = `    <input type="number" name=`+id+` target=`+controlQual+` class="form-control editableQte kwantite kotrokotro" value="`+$('#quantite').val()+`">`
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
            swal("Information", ` Un article aujouté au bon de commande!
            Actuellement: `+nombreDeLignes+` article(s).`, {
                icon : "info",
                buttons: {
                    confirm: {
                        className : 'btn btn-info'
                    }
                },
            })
        }

    })


    // TRASH IN THE LIST
    $('#alt-pg-dt tbody').on('click', '.supprimer', function () {
        swal("Confirmation", ` Voulez-vous vraiment enlever cet article du bon de commande en cours?`, {
            icon : "warning",
            buttons: {
                cancel: {
                    visible: true,
                    text:'Annuler',
                    className: 'btn btn-success'
                },
                confirm: {
                    text : 'Oui',
                    className : 'btn btn-warning'
                }

            },
        }).then((Delete) => {
            if (Delete) {
                const row = tableau.row($(this).parents('tr'));
                row.remove().draw();
                var nombreDeLignes = $('#alt-pg-dt').DataTable().rows().count();
                $('#voirDem').html(`Voir demande<span class="badge bg-primary">`+nombreDeLignes+`</span>`)
                if (1 > nombreDeLignes){
                    $('#pannier').modal('toggle')
                    $('#voirDem').html(`Voir demande`)
                }
            }else {
                swal.close();
            }
        });
    });
        // écouter les modifications par rapport à la dataTable
        // $('#alt-pg-dt').DataTable().on('keyup', 'td', function(e) {
        //     var columnIndex = $('#alt-pg-dt').DataTable().cell(this).index().column;
        //     var newValue = $(this).text();
        //     $('#alt-pg-dt').DataTable().cell(this).data(newValue).draw()
        // });

    // POST....
    $("#toValide").on('submit', function(ko){
        ko.preventDefault()
        if ($('.kotrokotro').hasClass('is-invalid')) {
            swal('Echèc', `La quantité requise est en excée`,{
                icon : "error",
                buttons: {
                    confirm: {
                        className : 'btn btn-danger'
                    }
                },
            })
        }else{
            // alert('mialamigny')
            const donnees = $('#alt-pg-dt').DataTable().rows().data().toArray();

            var nombreDeLignes = $('#alt-pg-dt').DataTable().rows().count();
            if (1 > nombreDeLignes){
                swal('Echèc', `Votre liste est vide`,{
                    icon : "error",
                    buttons: {
                        confirm: {
                            className : 'btn btn-danger'
                        }
                    },
                })
                $('#pannier').modal('toggle')
                $('#voirDem').html(`Voir demande`)
            }else{
                donnees.forEach(function(row) {
                    const inputValue = $(row[3]).val()
                    const parsedValue = parseInt(inputValue);
                    row[3] = parsedValue;
                    row[5] = "";
                });
                const donneesJSON = JSON.stringify(donnees);
                var url = $(this).attr('target')
                console.log(donneesJSON)
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _token:csrfToken,
                        donnees: donneesJSON
                    },
                    success: function(response) {
                        if (response){
                            swal('Succès', `Demande envoyéé. Réference :`+ response.ref +` `,{
                                icon : "success",
                                buttons: {
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            }).then((Delete) => {
                                if (Delete) {
                                    window.location.reload()
                                }else {
                                    swal.close();
                                }
                            });
                        }else{
                            swal('Echèc', `Demande non envoyé. Vérifiez votre connexion et réessayez`,{
                                icon : "error",
                                buttons: {
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            }).then((Delete) => {
                                if (Delete) {
                                    window.location.reload()
                                }else {
                                    swal.close();
                                }
                            });
                        }
                    }
                });

            }
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
                    $('#ref_dem').attr('title', ref)
                    infoTable.clear().draw();
                    $.each(response.demandes, function(i,v){
                        if (response.user != 'User'){
                            const quantitess = `    <input type="number" name=`+v['article']['id']+` target=`+controlQual+`
                            class="form-control editableQte kwantite kotrokotro" value="">`
                            infoTable.row.add([
                                v['id'],
                                v['article']['DESIGNATION'] +` `+v['article']['SPECIFICATION'],
                                v['article']['EFFECTIF'],
                                v['QUANTITE'],
                                quantitess,
                                v['UNITE']
                            ]).draw();
                        }else{
                            infoTable.row.add([
                                v['id'],
                                v['article']['DESIGNATION'] +` `+v['article']['SPECIFICATION'],
                                v['article']['EFFECTIF'],
                                v['QUANTITE'],
                                v['UNITE']
                            ]).draw();
                        }
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

        var reference = $('#ref_dem').attr('title')
        const nombreDeLignes = infoTable.rows().count();
        const multidata = infoTable.rows().data().toArray();

        url = $(this).attr('action')
        if (1 > nombreDeLignes){
            alert("Votre tableau est vide")
        }else{

            const data = infoTable.rows().data().toArray();
            const dataJSON = JSON.stringify(data);
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token:csrfToken,
                    reference:reference,
                    donnees: dataJSON
                },
                success: function(response) {
                    if(response.success){
                        console.log(response)
                        alert(`success! Demande ref°`+ response.ref + ` traités` );
                        window.location.reload()
                    }else{
                        console.log('ERROR')
                    }
                }
            });
        }

        // alert(reference)
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

    // Écoute de l'événement keypress
    // infoTable.on('keyup', 'td', function(e) {
    //     var columnIndex = infoTable.cell(this).index().column;
    //     var newValue = $(this).text();

    //     infoTable.cell(this).data(newValue).draw()
    // });

    // livringData.on('keyup', 'td', function(e) {
    //     var columnIndex = livringData.cell(this).index().column;
    //     var newValue = $(this).text();

    //     livringData.cell(this).data(newValue).draw()
    // });

    // REFUSER DEMANDE..............

    $('body').on('click', "#refuseDem",function(){
        // alert('demande refusée')
        swal('Confirmation', `Voullez vous vraiment refuser la demande ?`,{
            icon : "warning",
            buttons: {
                confirm: {
                    text : 'Oui',
                    className : 'btn btn-danger'
                },
                cancel: {
                    visible: true,
                    text:'Annuler',
                    className: 'btn btn-info'
                }
            },
        }).then((Delete) => {
            if (Delete) {
                const data = infoTable.rows().data().toArray();
                const nombreDeLignes = infoTable.rows().count();
                if (1 > nombreDeLignes){
                    swal('Echèc', `Votre liste est vide`,{
                        icon : "error",
                        buttons: {
                            confirm: {
                                className : 'btn btn-danger'
                            }
                        },
                    })
                }else{
                    data.forEach(function(row) {
                        const inputValue = $(row[4]).val()
                        const parsedValue = parseInt(inputValue);
                        row[4] = parsedValue;
                    })
                    const reference = $('#ref_dem').attr('title')
                    const url = $(this).attr('target')
                    const dataJSON = JSON.stringify(data);
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: {
                            _token:csrfToken,
                            reference: reference,
                            donnees: dataJSON
                        },
                        success: function(response) {
                            if (response.success){
                                swal('Succès', `Demande refusé. Réference: `+ response.ref+`.`,{
                                    icon : "warning",
                                    buttons: {
                                        confirm: {
                                            className : 'btn btn-danger'
                                        }
                                    },
                                })
                                window.location.reload()
                            }else{
                                swal('Echèc', `Vérifier votre connexion et réessayer plutard`,{
                                    icon : "error",
                                    buttons: {
                                        confirm: {
                                            className : 'btn btn-danger'
                                        }
                                    },
                                }).then((Delete) => {
                                    if (Delete) {
                                        swal.close()
                                    }
                                })
                            }
                        }
                    });

                }
            }else {
                swal.close();
            }
        });

    })

    //LIVRAISON DEMANDE.............
    $('#demandeW tbody').on('click', '.detail', function (de) {
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
                    // $('#confirmFooter').html(`  <a href="{{ route('imprimerDemande') }}" id="impressionant" class="btn btn-success">
                    //                                 Imprimer
                    //                             </a>
                    //                             @if (Auth::user()->MATRICULE == $reference->agent->MATRICULE)
                    //                                 <button type="submit" class="btn btn-primary">Accepter</button>
                    //                             @endif
                    // `)
                    $('#ref_dem').attr('title', ref)
                    livringData.clear().draw();
                    $.each(response.demandes, function(i,v){
                        if (response.user == 'User'){
                            livringData.row.add([
                                v['id'],
                                v['article']['DESIGNATION'] +` `+v['article']['SPECIFICATION'],
                                v['article']['EFFECTIF'],
                                v['QUANTITE'],
                                v['QUANTITE_ACC'],
                                v['QUANTITE_ACC'],
                                v['UNITE']
                            ]).draw();
                        }else{
                            livringData.row.add([
                                v['id'],
                                v['article']['DESIGNATION'] +` `+v['article']['SPECIFICATION'],
                                v['article']['EFFECTIF'],
                                v['QUANTITE'],
                                v['QUANTITE_ACC'],
                                v['QUANTITE_ACC'],
                                v['UNITE']
                            ]).draw();
                        }
                    })

                }else{
                    alert(`Impossible de se connecter au serveur à l’adresse `+window.location+`.`)
                }
            }

        })
    })

    $("#formConfirmDem").on('submit', function(ko){
        ko.preventDefault()

        var reference = $('#ref_dem').attr('title')
        const nombreDeLignes = livringData.rows().count();
        const multidata = livringData.rows().data().toArray();

        url = $(this).attr('action')

        if (1 > nombreDeLignes){
            alert("Votre tableau est vide")
        }else{

            const donnees = livringData.rows().data().toArray();
            const donneesJSON = JSON.stringify(donnees);
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token:csrfToken,
                    reference:reference,
                    donnees: donneesJSON
                },
                success: function(response) {
                    if(response.success){
                        // console.log(response)
                        alert(`Demande ref ° `+ response.ref + ` livré` );
                        window.location.reload()
                    }else{
                        console.log('ERROR')
                    }
                }
            });
        }


    })

    //LIVRED DEMANDE....
    $('#demandeL tbody').on('click', '.mombaMomba', function (de) {
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
                    $('#ref_dem').attr('title', ref)
                    livringData.clear().draw();
                    $.each(response.demandes, function(i,v){
                        if (response.user == 'User'){
                            $('#livred_dem').DataTable().row.add([
                                v['id'],
                                v['article']['DESIGNATION'] +` `+v['article']['SPECIFICATION'],
                                v['article']['EFFECTIF'],
                                v['QUANTITE'],
                                v['QUANTITE_ACC'],
                                v['QUANTITE_LIV'],
                                v['UNITE']
                            ]).draw();
                        }else{
                            $('#livred_dem').DataTable().row.add([
                                v['id'],
                                v['article']['DESIGNATION'] +` `+v['article']['SPECIFICATION'],
                                v['article']['EFFECTIF'],
                                v['QUANTITE'],
                                v['QUANTITE_ACC'],
                                v['QUANTITE_LIV'],
                                v['UNITE']
                            ]).draw();
                        }
                    })

                }else{
                    alert(`Impossible de se connecter au serveur à l’adresse `+window.location+`.`)
                }
            }

        })
    })


    // IMPRESSION DEMANDE........
    $('body').on('click', "#impressBtn", function(ko){
        ko.preventDefault()
        var reference = $('#ref_dem').attr('title')
        const impression = infoTable.rows().data().toArray();

        var nombreDeLignes = infoTable.rows().count();
        if (1 > nombreDeLignes){
            swal('Echèc', `Votre liste est vide`,{
                icon : "error",
                buttons: {
                    confirm: {
                        className : 'btn btn-danger'
                    }
                },
            })
        }else{
            if (user !=  'User'){
                impression.forEach(function(row) {
                    const inputValue = $(row[4]).val()
                    const parsedValue = parseInt(inputValue);
                    row[4] = parsedValue;
                });
            }
            const impressionJSON = JSON.stringify(impression);
            var url = $(this).attr('href')

            var getrefrence = "reference="+encodeURIComponent(JSON.stringify(reference))
            var getdata = "donnees="+ encodeURIComponent(JSON.stringify(impressionJSON))
            window.location.href = url+"?"+getrefrence+"&&"+getdata
        }
    })

    $('body').on('click', "#impressionant", function(ko){
        ko.preventDefault()
        var reference = $('#ref_dem').attr('title')
        const impression = livringData.rows().data().toArray();

        var nombreDeLignes = livringData.rows().count();
        if (1 > nombreDeLignes){
            swal('Echèc', `La quantité requise est en excée`,{
                icon : "error",
                buttons: {
                    confirm: {
                        className : 'btn btn-danger'
                    }
                },
            })
        }else{
            const impressionJSON = JSON.stringify(impression);
            var url = $(this).attr('href')

            var getrefrence = "reference="+encodeURIComponent(JSON.stringify(reference))
            var getdata = "donnees="+ encodeURIComponent(JSON.stringify(impressionJSON))
            window.location.href = url+"?"+getrefrence+"&&"+getdata

        }
    })

})
