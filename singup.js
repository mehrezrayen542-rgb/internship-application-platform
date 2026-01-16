function affiche(){
etudiant=document.getElementById("st").checked;
if(!etudiant)
{
    document.getElementById("student-fields").style.display="none";
    document.getElementById("company-fields").style.display="block";
}
else{
    document.getElementById("company-fields").style.display="none";
    document.getElementById("student-fields").style.display="block";
}}