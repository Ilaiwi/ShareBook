/**
 * Created by ahmadilaiwi on 4/10/15.
 */

var subjectAdd=new Array();
var addSubjectButton;
var countNumberOfSubjects
function handleAddSubjectButton(event){
    if(countNumberOfSubjects<4) {
        subjectAdd[countNumberOfSubjects].style.display = 'block';
        countNumberOfSubjects++;
    }
    else{
        alert("You can only add 4 subjects");
    }

}
window.onload=function(){
    subjectAdd.push(document.getElementById('subject1'),document.getElementById('subject2'),document.getElementById('subject3'),document.getElementById('subject4'))
    for(var i=0 ; i<subjectAdd.length;i++){
        subjectAdd[i].style.display='none';
    }
    addSubjectButton=document.getElementById('addSubjectButton');
    addSubjectButton.addEventListener('click',handleAddSubjectButton,false);
    countNumberOfSubjects=0;

}