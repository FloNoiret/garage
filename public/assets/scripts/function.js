// Get Data from Car to Contact Form
document.addEventListener('DOMContentLoaded', function CarTitle() {
  //Add dynamic id to car titles
  //Get the Titles
  var carTitles = document.querySelectorAll('h2');

  // Looping over Title
  for (var i = 0; i < carTitles.length; i++) {

    // Get the ith Title
    var carTitle = carTitles[i];

    // Set the id dynamically
    carTitle.setAttribute("id", "car-title" + i);
  }

  // Add dynamic id to subject input
  var carContacts = document.querySelectorAll('input[id="contact_subject"]');
  // Looping over Title
  for (var i = 0; i < carTitles.length; i++) {

    // Get the ith Title
    var carContact = carContacts[i];

    // Set the id dynamically
    carContact.setAttribute("id", "car-subject" + i);
    carContact.setAttribute("type", "hidden");
    carContact.value = carTitles[i].innerHTML;
  }
  let filterbtn = document.getElementById("filterbtn")

  document.addEventListener('click', function CarTitleNew() {
    //Add dynamic id to car titles
    //Get the Titles
    var carTitlesNew = document.querySelectorAll('h2');
  
    // Looping over Title
    for (var j = 0; j < carTitlesNew.length; j++) {
  
      // Get the ith Title
      var carTitleNew = carTitlesNew[j];
  
      // Set the id dynamically
      carTitleNew.setAttribute("id", "car-title" + j);
    }
  
    // Add dynamic id to subject input
    var carContactsNew = document.querySelectorAll('input[name="contact[subject]"]');
    // Looping over Title
    for (var j = 0; j < carTitlesNew.length; j++) {
  
      // Get the ith Title
      var carContactNew = carContactsNew[j];
  
      // Set the id dynamically
      carContactNew.setAttribute("id", "car-subject" + j);
      carContactNew.setAttribute("type", "hidden");
      carContactNew.value = carTitlesNew[j].innerHTML;
    }
  })
  
})




