function affiche(){
etudiant=document.getElementById("st").checked;
if(!etudiant)
{
    document.getElementById("student-signup-fields").style.display="none";
    document.getElementById("company-signup-fields").style.display="block";
}
else{
    document.getElementById("company-signup-fields").style.display="none";
    document.getElementById("student-signup-fields").style.display="block";
}}