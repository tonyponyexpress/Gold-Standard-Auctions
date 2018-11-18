$(document).ready(function(){
     // SellTab: Only accepts gif, png, jpg, jpeg files
     $('#submitItem').click(function(){
          let imageItem = $('#imageItem').val();
          let descriptionItem = $('#descriptionItem').val();
          let item = $('#item').val();

          if(item == '')
          {
               alert("Please input valid name ");
               return false;
          }
          else if(descriptionItem == '')
          {
               alert("Please input valid description ");
               return false;
          }
          else if(imageItem == '')
          {
               alert("Please Select Image");
               return false;
          }
          else
          {
               let extension = $('#imageItem').val().split('.').pop().toLowerCase();
               if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
               {
                    alert('Invalid Image File');
                    $('#imageItem').val('');
                    return false;
               }
          }
     });


     // Settings: submit change password
     $('#submitChangePassword').click(function(){
          let oldOriginal = $('#oldOriginal').val();
          let old = $('#old').val();
          let new1 = $('#new1').val();
          let new2 = $('#new2').val();


          if( (old == '') || (new1 == '') || (new2 == '')  )
          {
               alert("Please input valid password ");
               return false;
          }
          else if(new1 != new2)
          {
               alert("New passwords doesn't mach");
               return false;
          }
     });

     // Settings: submit change email
     $('#submitChangeEmail').click(function(){
          let oldEmail1 = $('#oldEmail1').val();
          let oldEmail2 = $('#oldEmail2').val();
          let newEmail1 = $('#newEmail1').val();
          let newEmail2 = $('#newEmail2').val();

          if( (oldEmail2 == '') || (newEmail1 == '') || (newEmail2 == '')  )
          {
               alert("Please input valid email ");
               return false;
          }
          else if(oldEmail1 != oldEmail2)
          {
               alert("Old email doesn't mach");
               return false;
          }
          else if(newEmail1 != newEmail2)
          {
               alert("New email doesn't mach");
               return false;
          }
     });
});


function showHowItWorks() {
    document.getElementById('howItWorks').style.display = "block";
    document.getElementById('sell').style.display = "none";
    document.getElementById('myAccount').style.display = "none";
    document.getElementById('howItWorksButton').style.backgroundColor="#474a4b";
    document.getElementById('sellButton').style.backgroundColor="#797d7f";
    document.getElementById('myAccountButton').style.backgroundColor="#797d7f";
}
function showSell() {
    document.getElementById('howItWorks').style.display = "none";
    document.getElementById('sell').style.display = "block";
    document.getElementById('myAccount').style.display = "none";
    document.getElementById('howItWorksButton').style.backgroundColor="#797d7f";
    document.getElementById('sellButton').style.backgroundColor="#474a4b";
    document.getElementById('myAccountButton').style.backgroundColor="#797d7f";
}
function showMyAccount() {
    document.getElementById('howItWorks').style.display = "none";
    document.getElementById('sell').style.display = "none";
    document.getElementById('myAccount').style.display = "block";
    document.getElementById('howItWorksButton').style.backgroundColor="#797d7f";
    document.getElementById('sellButton').style.backgroundColor="#797d7f";
    document.getElementById('myAccountButton').style.backgroundColor="#474a4b";
}
