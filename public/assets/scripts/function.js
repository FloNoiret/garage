// Get Data from Car to Contact Form
document.addEventListener('DOMContentLoaded', function CarTitle() {

  // Count the number of h5 aka number of carpost title
  //var count = document.querySelectorAll('h5').length;
  //console.log(count)

  //var car = document.querySelectorAll('input[id="contact_subject"]');
  //get the html title data
  // let carTitle = document.getElementById("car-title");


  // let carContact = document.getElementById("contact_subject");

  //Add dynamic id to car titles
  //Get the Titles
  var carTitles = document.querySelectorAll('h5');

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

    carContact.value = carTitles[i].innerHTML;
  }


 

  // Count the number of subject input

  //defineCar = [];


  // let title = document.querySelectorAll('h5');
  // title.forEach(carTitle => defineCar.push(carTitle.innerText));
  //console.log(defineCar);

  //CarValueTable = [];

  //let carValue = document.querySelectorAll('input[id="contact_subject"]');
  // carValue.forEach(CarContact => CarValueTable.push(CarContact.value) )


  // associate form value with car
  // let zip = (CarValueTable, defineCar) => CarValueTable.map((x, i) => [x, defineCar[i]]);

  //  let finalTable = zip(CarValueTable, defineCar);

  //for (let i = 0; i < count; i++) {
  // carContact[i].value = finalTable[i];
  // console.log(carContact.value);
  // };


  // while (i < count) {
  //  while (j < count) {
  //   carContact.value[i] = defineCar[j];
  //    console.log(carContact.value);
  //  i++;
  //     j++;
  //   }
  //}
  //})

  // for (t of title) {
  //   defineCar.push(t.innerText);
  //   console.log(defineCar)
  // }

  // Most Promising - need to set defineCar i = carContactvalue = i
  //for (let i = 0; i < count; i++) {
  // let carValue = document.querySelectorAll('input[id="contact_subject"]');
  // carValue.forEach(carContact => carContact.value = defineCar[i]);
  //  console.log(carContact.value);
  //  }

  // 2nd Most Promising

  //for (let i = 0; i < count; i++) {
  //  carContact.value = defineCar[i];
  //  console.log(carContact.value);
  // };


  // let title = document.querySelectorAll('h5');

  // title.forEach(carTitle => console.log(carTitle.textContent));

  //   let contact = document.querySelectorAll('input[id="contact_subject"]');

  // for (let i = 0; i < count; i++) {
  // carContact.value = carTitle[i];
  //   console.log(carContact.value)
  //}
  //let contact = document.querySelectorAll('input[id="contact_subject"]');
  // contact.forEach(carContact =>
  //   carContact.value = carTitle);
  //  contact.forEach(carContact =>
})