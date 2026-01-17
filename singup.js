function affiche() {
    var student = document.getElementById("st").checked;
    document.getElementById("student-signup-fields").style.display = student ? "block" : "none";
    document.getElementById("company-signup-fields").style.display = student ? "none" : "block";
}