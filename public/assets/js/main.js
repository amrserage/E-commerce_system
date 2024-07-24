function lostpass() {
    var login = document.getElementById('login');
    var sign = document.getElementById('sign');
    var rest = document.getElementById('rest');
    var forget = document.getElementById('forget');

    login.classList.add('rest');
    login.style.display='none';
    rest.style.display='';
    rest.style.opacity='1';
}

function signUp(){
    var login = document.getElementById('login');
    var sign = document.getElementById('sign');
    var rest = document.getElementById('rest');
    var forget = document.getElementById('forget');

    login.classList.add('sign');
    login.style.display='none';
    sign.style.display='';
}
function signUp2(){
    var login = document.getElementById('login');
    var sign = document.getElementById('sign');
    var rest = document.getElementById('rest');
    var forget = document.getElementById('forget');

    rest.classList.add('sign');
    rest.style.display='none';
    sign.style.display='';
}
function signUp3(){
    var login = document.getElementById('login');
    var sign = document.getElementById('sign');
    var rest = document.getElementById('rest');
    var forget = document.getElementById('forget');

    forget.classList.add('sign');
    forget.style.display='none';
    sign.style.display='';
}
function rest() {
    var login = document.getElementById('login');
    var sign = document.getElementById('sign');
    var rest = document.getElementById('rest');
    var forget = document.getElementById('forget');

    rest.classList.add('forget');
    rest.style.display='none';
    forget.style.display='';
    forget.style.opacity='1';
}

//------------------------------- gategories page --------------------------

function oppo() {
    document.getElementById("gategories1").classList.add("class1");
    document.getElementById("gategories2").classList.remove("class");
    document.getElementById("gategories2").classList.add("class2");
    document.getElementById("gategories3").classList.add("class");

}
function apple() {
    document.getElementById("gategories1").classList.add("class1");
    document.getElementById("gategories2").classList.add("class");
    document.getElementById("gategories3").classList.remove("class");
    document.getElementById("gategories3").classList.add("class2");
}





//------------------------------- proudect page --------------------------

var img = document.getElementById("img");
var size = document.getElementById('productImg');
function myfun(phone) {
    img.src = phone;
    img.style.transition = '0.3s'
}

var Imgblue = document.getElementById("Imgblue");
var size = document.getElementById('productImg');
function colorBlue(phone) {
    Imgblue.src = phone;
    img.style.transition = '0.3s'
}

var imgWhite = document.getElementById("img-white");
var size = document.getElementById('productImg');
function colorWhite(phone) {
    imgWhite.src = phone;
    img.style.transition = '0.3s'
}


function PhoneBlack() {
    document.getElementById('black').classList.add("class2");
    document.getElementById('black').classList.remove("class");
    document.getElementById('blue').classList.add('class');
    document.getElementById('white').classList.add('class ');
}

function PhoneBlue() {
    document.getElementById('black').classList.add("class");
    document.getElementById('blue').classList.remove('class');
    document.getElementById('white').classList.add('class');
}

function PhoneWhite() {
    document.getElementById('black').classList.add("class");
    document.getElementById('blue').classList.add('class');
    document.getElementById('white').classList.remove('class');
}



