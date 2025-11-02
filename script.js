let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
   menuIcon.classList.toggle('bx-x');
   navbar.classList.toggle('active');
}


// scroll design
let sections = document.querySelectorAll('section');
let navlinks = document.querySelectorAll('div nav a');



window.onscroll = () => {
   // sticky header


   let header = document.querySelector('div');
   header.classList.toggle('sticky', window.scrollY > 100);
   
   //remove toggle icon and navbar when click navbar links (scroll)
   menuIcon.classList.remove('bx-x');
   navbar.classList.remove('active');
} 

let popup = document.getElementById("popup");

        function openPopup() {
            popup.classList.add("open-popup")
        }

        function closePopup() {
                popup.classList.remove("open-popup")
            }