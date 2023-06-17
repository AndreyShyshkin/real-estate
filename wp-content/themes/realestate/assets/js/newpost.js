$(document).ready(function() {
$("#new_post").submit(function(event) {

let price = $("#custom_field_price").val(); // Получаем значение из поля ввода
let field_price = parseInt(price); // Преобразуем введенное значение в целое число
let area = $("#custom_field_area").val(); // Получаем значение из поля ввода
let field_area = parseInt(area); // Преобразуем введенное значение в целое число
let bed_room = $("#custom_field_bed_room").val(); // Получаем значение из поля ввода
let field_bed_room = parseInt(bed_room); // Преобразуем введенное значение в целое число
let bath_room = $("#custom_field_bath_room").val(); // Получаем значение из поля ввода
let field_bath_room = parseInt(bath_room); // Преобразуем введенное значение в целое число

if (field_price >= 20000 && field_price <= 1000000 && field_area >= 40 && field_area <= 400 && field_bed_room >= 1 && field_bed_room <= 50 && field_bath_room >= 1 && field_bath_room <= 50) {
    return true; 
} else {
  alert("Проверьте поля");
  event.preventDefault(); 
    return false;
}

    });
});