/**
 * Created by ahmadilaiwi on 4/14/15.
 */
var Addbutton;
var StudentCount;
var students=new Array();
var selectList;
var studentsAdded;
var RemoveButton;
var selectedList;
function HandleAddStudentsButton(){
    selectedList.innerHTML='';
    var children=selectList.children;

    for(var i=0 ;i<children.length;i++){
        if(children[i].selected){
            students.push(children[i].innerHTML);
            StudentCount++;
        }
    }
    for (var i=0 ; i<students.length;i++){
        selectedList.innerHTML=selectedList.innerHTML+'<option>'+students[i]+'</option>';
    }
}
function HandleRemoveStudentsAdded(){
    var children=selectedList.children;
    for(var i=0 ;i<children.length;i++){
        if(children[i].selected){
            delete students[students.indexOf(children[i].innerHTML)];
            StudentCount--;
        }
    }
    selectedList.innerHTML='';
    console.log(students.length);
    for (var i=0 ; i<students.length;i++) {
        if (students[i] != undefined) {
            selectedList.innerHTML = selectedList.innerHTML + '<option>' + students[i] + '</option>';
        }
    }

}

window.onload=function(){
    StudentCount=0;
    Addbutton=document.getElementById('Addbutton');
    selectList=document.getElementById('selStudents');
    studentsAdded=document.getElementById('addedStudents');
    Addbutton.addEventListener('click',HandleAddStudentsButton,false);
    RemoveButton=document.getElementById('Removebutton');
    RemoveButton.addEventListener('click',HandleRemoveStudentsAdded,false);
    selectedList=document.getElementById('selectedStudents');

}