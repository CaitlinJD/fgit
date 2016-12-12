jQuery(document).ready(function($){
   // Ajax call
   var url = "https://graph.facebook.com/v2.8/44589077752?fields=id%2Cname%2Cposts%7Bpicture%2Cstory%2Ccreated_time%2Cid%7D%2Cphotos&access_token=EAAZAtGjzyjcABAIcHoR2QPLkLGHY8rJtGdrSN6412dJb3iNOTxZAV9ksIzTJyD1Dbi4XW78MKcKpCzNboAq4LEFxJ5XEkNqGhf5QcdrmORviQoBETERhO0JhZCqHvSoEKCFerpmUO6MMIro2OGZCDH8GCzZBbvuuuq56ZChP0V5QZDZD";
   $.ajax({
       url: url,
       method: 'GET',
   }).done(function(result) {
       $(".loader").show();
       for ( var counter=0;counter<result.posts.data.length -1; counter++){
          console.log (result.posts.data[counter]);
          var currentObject= result.posts.data[counter];
          console.log (currentObject.picture) ;
          console.log (currentObject.story) ;

       }


   }).fail(function(err) {
       throw err;
   });
})
