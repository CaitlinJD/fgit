jQuery(document).ready(function($){
  alert("sdfgasdf");
   // Ajax call
   var url = "https://graph.facebook.com/v2.8/44589077752?fields=id%2Cname%2Cposts%7Bpicture%2Cstory%2Ccreated_time%2Cid%7D%2Cphotos&access_token=EAACEdEose0cBAPEnCWyZCI3p2lGMuG6MlCQTZC7WKsXyEPsZCCx31z63bdeZCDpZAQ0vLcxc9w5vOpWf45zCJVbcR5n0WLdSFZB2ePUmmOAoBKeTD5DrEIC8UDjlQAqM3o6doWyiinoGwNAksGt8iiokKRD3XnouM74Cpt5x7o3AZDZD";
   $.ajax({
       url: url,
       method: 'GET',
   }).done(function(result) {
       $(".loader").show();
       console.log("result");

   }).fail(function(err) {
       throw err;
   });
})
