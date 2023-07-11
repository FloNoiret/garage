// Get Data from Car to Contact Form
document.addEventListener('DOMContentLoaded', function CarTitle() {

    // Count the number of h5 aka number of carpost title
    var count = document.querySelectorAll('h5').length;
    console.log(count);

    var car = document.querySelectorAll('input[id="contact_subject"]').length;
    console.log(car);

    //get the html title data
    let carTitle = document.getElementById("car-title").textContent;
    console.log(carTitle);

    let carContact = document.getElementById("contact_subject");
    console.log(carContact);

    // Count the number of subject input

    defineCar = []
    let title = document.querySelectorAll('h5');
    
    console.log(title);

   
   title.forEach(carTitle => defineCar.push(carTitle.textContent));

 //  for (t of title) {
   // defineCar.push(t.textContent);
   // console.log(t)
  // }

    for (let i = 0; i < count; i++) {
        carContact.value = defineCar[i];
        console.log(carContact.value)
    }

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
