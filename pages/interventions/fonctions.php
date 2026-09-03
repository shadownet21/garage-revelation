<script>
//MISE A JOUR DES NOUVELLES DONNEES
    $('#bouton_modifier_voiture').click(function(){

      var id = $('#id_voiture').val();
      var marque = $('#marque').val();
      var modele = $('#modele').val();
      var numero_chassis = $('#numero_chassis').val();
      var date_arr = $('#date_arrivee').val();

      
      $.ajax({
       url:"ajax/traitement_modification.php",
       method:"POST",
      data:{id:id,marque:marque,modele:modele,numero_chassis:numero_chassis,date_arr:date_arr},
       success:function(data){
       // console.log(data);
       const val = data.replace(/[\n\r]+/g, '');
       if(val==1){
        setTimeout(function(){  window.location.reload(); }, 2000);
        Toast.fire({
        icon: 'success',
        title: 'Modification effectuée avec succès.'});
       }
       }
      }); 
   

});


// CHARGEMENT DU FORMULAIRE DE MODIFICATION AVEC LES ANCIENNES DONNEES 
function affiche_del(id){
    
    var id_voiture = id;
            $.ajax({
              url:"ajax/suppression.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              //console.log(data);
              $('#suppression_body').html(data);
            }
            });
            //SUPPRESSION DE L'INFORMATION
            $('#bouton_supprimer_voiture').click(function(){
            //console.log(id_voiture);

            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
              });
              
                    $.ajax({
                      url:"ajax/traitement_suppression.php",
                      method:"POST",
                      data:{id_voiture:id_voiture},
                      success:function(data){
                      console.log(data);
                      $('#suppression_body').html(data);
                      setTimeout(function(){  window.location.reload(); }, 2000);
                      }
                      });
                      Toast.fire({
                      icon: 'success',
                      title: 'Suppression effectuée avec succès.'
                      }) 
            });
}

//
$('#boutton_enregistrer_piece').click(function(){

  
var nom_piece_moteur = $('#nom_piece_moteur').val();



     $.ajax({
      url:"ajax/enregistrer_piece.php",
      method:"POST",
      data:{nom_piece_moteur:nom_piece_moteur},
      success:function(data)
  {
    console.log(data);
       const val = data.replace(/[\n\r]+/g, '');
       if(val==0)
       { Toast.fire({
          icon: 'error',
        title: 'Tous les champs sont obligatoires.'})
       };

        if(val==2)
        { 
            Toast.fire({
            icon: 'error',
          title: 'Cette pièce existe déjà.'});
          console.log('erreur doublon');
      } 

        if(val==1)
        { 

      
        //setTimeout(function(){  window.location.reload(); }, 2000);
      }

        
  } 
     
      })
      }); 

    

//ENREGISTREMENT DANS LA BDD
$('#boutton_enregistrer_piece_moteur').click(function(){

  
  var id_voiture = $('#id_voiture').val();
  var id_piece =  $('#id_piece').val();
  var nbre_retrouve =  $('#nbre_piece').val();

  console.log(id_voiture+'=='+nom_piece_moteur+'=='+nbre_retrouve);
 
        $.ajax({
        url:"ajax/enregistrer_piece_voiture.php",
        method:"POST",
        data:{id_voiture:id_voiture,id_piece:id_piece,nbre_retrouve:nbre_retrouve},
        success:function(data){
      /*     const val = data.replace(/[\n\r]+/g, '');
          if(val==1){ Toast.fire({
          icon: 'success',
          title: 'Enregistrement effectué avec succès.'});
          setTimeout(function(){  window.location.reload(); }, 2000);}
          if(val==0){ Toast.fire({
            icon: 'error',
          title: 'Tous les champs sont obligatoires.'});
        } */
        }
        });

      
});
//MODAL QUI AFFICHE LES PIECES RETIREES DU MOTEUR
function affiche_pieces_moteur(id){
  var id_pm = id;
  
  $.ajax({
            url:"ajax/affiche.php",
            method:"POST",
            data:{id_pm:id_pm},
            success:function(data){
            console.log(data);
            $('#formulaire_liste_pieces_moteur').html(data);
           
            }
            });

}
</script>