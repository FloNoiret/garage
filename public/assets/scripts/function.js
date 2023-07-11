// Get Data from Car to Contact Form
document.addEventListener('DOMContentLoaded', function () {

    // Count the number of h5 aka number of carpost title
    var count = document.querySelectorAll('h5').length;
    console.log(count);

    //get the html title data
    let carTitle = document.getElementById("car-title").textContent;
    console.log(carTitle);

    let title = document.querySelectorAll('h5');
    title.forEach(carTitle => console.log(carTitle.textContent));
})