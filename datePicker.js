const pickInput = document.getElementById("datepicker");
const submitBtn = document.getElementById("setTodo");
let inputtype = document.getElementById("input");
const toDoList = document.querySelector(".js-toDoList");



let toDos = [[],[],[],[],[],[],[],[],[],[],[],[]];
const TODOS_LS = "toDos";
let inputCheck = false;


function paintToDo(text){

}


function handleClick(event){
    const date = pickInput.value;
    let divDate = date.split("/");

    const month = parseInt(divDate[0]);
    const day = parseInt(divDate[1]);
    const Body = document.getElementById("Body");

    const inputType = document.createElement("input");
    if(inputCheck === false){
    inputType.setAttribute("type", "text");
    inputType.setAttribute("value", "Write a to do");
    Body.appendChild(inputType);
    inputtype = Body.childNodes;

    inputCheck=true;
    
    }
   
}

function handleSubmit(event){
    event.preventDefault();
    console.log("fuckyou");
    const currentValue = inputtype.value;
    paintToDo(currentValue);
}

function loadToDos(){
    const loadedToDos = localStorage.getItem(TODOS_LS);
    if(loadedToDos !== null){
       const parsedToDos = JSON.parse(loadedToDos);

       parsedToDos.forEach(
           function (toDo) {
           paintToDo(toDo.text);
       } 
    );
    }    
}


function init(){
    loadToDos();
    submitBtn.addEventListener("click",handleClick);
    //toDoForm.addEventListener("submit",handleSubmit);
}

init();
if(inputCheck === true){
    inputtype.addEventListener("submit",handleSubmit);
    }