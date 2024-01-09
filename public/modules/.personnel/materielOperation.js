$(document).ready(function(){
    var pagePrec = document.referrer
    $("#btnCancel").attr('href', pagePrec)
    if(pagePrec == 'http://127.0.0.1:8000/enteredMateriel')
    {
        $("#references").addClass('disabled')
    }
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

    function verification(array, colonne, valeur){
        for (var i = 0; i < array.length; i++){
            if (array[i][colonne] === valeur){
                return true
            }
        }

        return false
    }

    $('#materielEntered').DataTable()

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
            // alert($('#quantite').val())
        if (    ($('#quantite').val() != 0) || ($('#quantite').val() != '')  ){
            $montant = newValue * $('#quantite').val()
            $('#montant').val($montant)
        }else{
            alert("Saisir le quantité d'abord")
            $(this).val('')
        }
    })

    // VALIDATION ADDITION....
    var form = $(".motivationMat")
    const formulaire = $('#addMateriel');
    const oldtableau = $('#insererMat').DataTable()
    oldtableau.destroy()
    const tableau = $('#insererMat').DataTable({
        "columnDefs": [
            {
                "targets": [2,3,4,5], // Indice de la 4ème colonne (commençant à zéro)
                "render": function(data, type, row) {
                return '<div contenteditable="true">' + data + '</div>';
                }
            }
        ]
    });
    tableau.column(7).visible(false)
    tableau.column(8).visible(false)
    $(form).on('submit', function(pre){
        pre.preventDefault()
        var id_origine = $('#id_origine option:selected').val().trim();
        var nomenclature = $('#id_nomenclature option:selected').attr('title').trim();
        var id_categorie = $('#id_categorie option:selected').val().trim();
        var id_nomenclature = $('#id_nomenclature option:selected').val().trim();
        var designation = $('#designation').val().trim();
        var specification = $('#specification').val().trim();
        var quantite = $('#quantite').val().trim();
        var prix = $('#prix_unitaire').val().trim();
        var montant = $('#montant').val().trim();
        var action = `<td>
                            <div class="table-actions">
                                <a href="#" class="supprimer" title="Supprimer"><i class="ik ik-trash-2"></i></a>
                            </div>
                        </td>`
        tableau.row.add([
            id_origine,
            nomenclature,
            designation,
            specification,
            quantite,
            prix,
            montant,
            id_categorie,
            id_nomenclature,
            action
        ]).draw();

        var nombreDeLignes = $('#insererMat').DataTable().rows().count();
        $('#voirMat').html(`<i class="ik ik-clipboard"></i> Voir liste <span class="badge bg-primary">`+nombreDeLignes+`</span>`)
        $(".motivationMat")[0].reset();
    })
    // ECOUTER LE CHANGEMENT DU QTE
    $('#insererMat tbody').on('input', 'td:nth-child(5)', function(){
        var nouvQ = $(this).text();
        var prixUnitaire = $(this).closest('tr').find('td:nth-child(6)').text()
        var nouvMonant = nouvQ * prixUnitaire;

        $(this).closest('tr').find('td:nth-child(7)').text(nouvMonant)
    })

    // ECOUTER LE CHANGEMENT DU PRIX UNITAIRE
    $('#insererMat tbody').on('input', 'td:nth-child(6)', function(){
        var nouvP = $(this).text();
        var quantite = $(this).closest('tr').find('td:nth-child(5)').text()
        var nouvMonant = nouvP * quantite;

        $(this).closest('tr').find('td:nth-child(7)').text(nouvMonant)
    })

    // TRASH IN THE LIST
    $('#insererMat tbody').on('click', '.supprimer', function () {
        const row = tableau.row($(this).parents('tr'));
        row.remove().draw();
        var nombreDeLignes = $('#inserermat').DataTable().rows().count();
        $('#voirMat').html(`<i class="ik ik-clipboard"></i> Voir matériels <span class="badge bg-primary">`+nombreDeLignes+`</span>`)
        if (1 > nombreDeLignes){
            $('#materiels').modal('toggle')
            $('#voirMat').html(`<i class="ik ik-clipboard"></i> Voir matériels`)
        }
    });

    // // POST....
    $("#toValideMateriel").on('submit', function(ko){
        ko.preventDefault()
        const donnees = $('#insererMat').DataTable().rows().data().toArray();

        var nombreDeLignes = $('#insererMat').DataTable().rows().count();
        if (1 > nombreDeLignes){
            alert("Votre liste est vide")
            $('#materiels').modal('toggle')
            $('#voirMat').html(`<i class="ik ik-clipboard"></i> Voir materiels`)
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
                    alert(response.id_origine);
                    window.location = 'http://127.0.0.1:8000/materiel'
                },
                error: function(error) {
                    alert(`Impossible de se connecter au serveur à l’adresse `+window.location+`.`)
                }
            });

        }
    })

    // DETENIR UN MATERIEL
    $('#division').on('change' , function(){
        $('.chooseDet').each(function(){
            $(this).remove()
        })
        var division = $("#division option:selected").val();
        url = $(this).attr('target')
        var num = $('#reference').val()

        $.ajax({
            url:url,
            type:'POST',
            data:{
                _token:csrfToken,
                division:division,
                num:num
            },
            dataType:'json',
            success:function(result,status){
                $('.chooseDet').each(function(){
                    $(this).remove()
                })
                if(result.agents[0]){
                    var res = result.agents;
                    $.each(res, function(i,v){
                        $('#matricule').append(`<option class="chooseDet" value="`+v["MATRICULE"]+`">`
                                                +v["MATRICULE"]+` | `+v["NOM"]+` `+v["PRENOM"]+`</option>`);
                    });
                }else{
                    $('#matricule').append('<option class="chooseDet" value="">Aucun(s) article(s) correspondant(s)</option>');

                }

            }
        })

    })

    // CONDAMNATION DETAILS.
    $('.detailsButtom').each(function(){
        $(this).on('click', function(def){
            def.preventDefault()
            $tr = $(this).closest('tr');
            var data =  $tr.children("td").map(function(){
                return $(this).text()
            }).get()
            identifiant = data[0]
            url = $(this).attr("href")
            $.ajax({
                url: url,
                type:'POST',
                data: {
                    _token:csrfToken,
                    id: identifiant
                },
                dataType:'json',
                success:function(reponse,status){
                    if(reponse.error){
                        console.log(reponse.error);
                    }
                    if(reponse.success){
                        sortieInfo = `<h6>Sortie <br></h6>
                        <span>Référence de sortie : `+ reponse.materiel.sortie.REF_SORTIE +` <br></span>
                        <span>Statut: Condamnation de `+ reponse.materiel.sortie.STATUT +`. <br></span>
                        <span>Objet: `+ reponse.materiel.sortie.OBJET +` <br></span>
                        <span>Date de sortie: `+ reponse.materiel.sortie.DATE +`<br><br></span>
                        `
                        origineInfo = `<h6>Origine <br></h6>
                        <span>Orde d'entrée: `+ reponse.materiel.origine.REF_ORIGINE +` <br></span>
                        <span>Date: Enregistré le `+ reponse.materiel.origine.reference.DATE_ORIGINE +`. <br> </span>
                        <span>SOA: `+ reponse.materiel.origine.reference.CODE_SERVICE +` | `+ reponse.materiel.origine.reference.service.LABEL_SERVICE +` <br><br></span>
                        `
                        materielInfo = `<h6>Matériel <br></h6>
                        <span>Réference: `+ reponse.materiel.REF_MAT +` <br></span>
                        <span>Nomenclature: `+ reponse.materiel.nomenclature.NOMENCLATURE +`<br> </span>
                        <span>Compte: `+ reponse.materiel.categorie.COMPTE +` | `+ reponse.materiel.categorie.compte.LABEL_COMPTE +` <br></span>
                        <span>Désignation: `+ reponse.materiel.categorie.LABEL_CATEGORIE +` | `+ reponse.materiel.DESIGN_MAT +`. `+ reponse.materiel.SPEC_MAT +`<br></span>
                        `
                        $('#sortieInfo').html(sortieInfo)
                        $('#origineInfo').html(origineInfo)
                        $('#materielInfo').html(materielInfo)
                        $('#condamnationInfo').modal('show');
                    }
                }
            })
        })
    })
})
